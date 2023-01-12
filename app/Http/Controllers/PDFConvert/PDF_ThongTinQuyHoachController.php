<?php

namespace App\Http\Controllers\PDFConvert;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Dompdf\Dompdf;
use Carbon\Carbon;
use File;
use \stdClass;

use App\Http\Service\ThuaDat\ThuaDatService;
use App\Http\Service\PDF\ThongTinQuyHoach\PDF_ThongTinQuyHoachService;


class PDF_ThongTinQuyHoachController extends Controller
{
    protected $ThuaDatService;
    protected $PDF_ThongTinQuyHoachService;

    public function __construct(ThuaDatService $ThuaDatService,
                                PDF_ThongTinQuyHoachService $PDF_ThongTinQuyHoachService)
    {
        $this->ThuaDatService = $ThuaDatService;
        $this->PDF_ThongTinQuyHoachService = $PDF_ThongTinQuyHoachService;
    }

    public function convert_HTML_to_PDF(Request $req)
    {
        try{
            $OBJECTID = $req->OBJECTID;
            $MaDuAn = $req->MaDuAn;
            $ThuaDat_Info = $this->ThuaDatService->getThuaDat_By_ID($OBJECTID);
            $SuDungDat_Info = $this->ThuaDatService->getSuDungDat_By_ThuaDat_ID($OBJECTID, $MaDuAn);
            $current_date = Carbon::now()->format('d-m-Y');
            

            $color = $this->PDF_ThongTinQuyHoachService->color_array();
            $xMin = 0;
            $yMin = 0;
            $xMax = 0;
            $yMax = 0;
            $MaDuAnTemp = null;
            $Rectangle_SVG_Array =[];
            $PoLygon_SVG_Array = [];
            $scale_theo_DA =[];

            //polygon to array 
            foreach ($SuDungDat_Info as $index => $value) {
                $PoLyGon_To_Array = $this->PDF_ThongTinQuyHoachService->Polygon_String_To_Array($value->SUDUNGDATSHAPE, $xMin, $yMin);
                $SuDungDat_Info[$index]->SUDUNGDATSHAPE = $PoLyGon_To_Array[0];
                $xMin = $PoLyGon_To_Array[1];
                $yMin = $PoLyGon_To_Array[2];
            }

            //giam x y  polygon
            foreach ($SuDungDat_Info as $index => $value) {
                $SuDungDat_Info[$index]->SUDUNGDATSHAPE = $this->PDF_ThongTinQuyHoachService->Giam_scale_Polygon($value->SUDUNGDATSHAPE, $xMin, $yMin);
            }
            
            //tao scale cho polygon
            foreach ($SuDungDat_Info as $index => $value) {
                if($index == count($SuDungDat_Info)-1 || $value->MaDuAnQuyHoach != $MaDuAnTemp)
                {
                    $MaDuAnTemp = $value->MaDuAnQuyHoach;
                }
                $xyMax = $this->PDF_ThongTinQuyHoachService->Tim_xMax_yMax($value->SUDUNGDATSHAPE);
                

                if($xMax < $xyMax[0])
                {
                    $xMax = $xyMax[0];
                }
                if($yMax < $xyMax[1])
                {
                    $yMax = $xyMax[1];
                }

                if($index == count($SuDungDat_Info)-1 || $value->MaDuAnQuyHoach != $SuDungDat_Info[$index+1]->MaDuAnQuyHoach)
                {
                    $scale;
                    if($xMax >=450 ||$yMax >=450)
                    {
                        $scale = 550;
                    }
                    else if($xMax >=200 ||$yMax >=200)
                    {
                        $scale = 500;
                    }
                    else if($xMax >=50 ||$yMax >=50)
                    {
                        $scale = 180;
                    }
                    else if($xMax < 50 ||$yMax < 50)
                    {
                        $scale = 90;
                    }
                    
                    $scale_theo_DA[$value->MaDuAnQuyHoach] = $scale;
                    $xMax = 0;
                    $yMax = 0;
                }
            }
           // dd($scale_theo_DA);
            //tao svg
            foreach ($SuDungDat_Info as $index => $value) {
                $Rectangle_SVG = $this->PDF_ThongTinQuyHoachService->create_svg_Rectangle($index, $color[$index]);
                array_push($Rectangle_SVG_Array,$Rectangle_SVG );
                 $PoLyGon_SVG = $this->PDF_ThongTinQuyHoachService->create_svg_Polygon($index, $color[$index], $value->SUDUNGDATSHAPE, $scale_theo_DA[$value->MaDuAnQuyHoach]);
                 array_push($PoLygon_SVG_Array,$PoLyGon_SVG );
            }

            $dompdf = new Dompdf();
            $dompdf->set_option('isRemoteEnabled', TRUE);
            $dompdf->loadHtml(view('PDF_Convert.ThongTinQuyHoach',[
                'current_date' => $current_date,
                'ThuaDat_Info' => $ThuaDat_Info,
                'SuDungDat_Info' =>$SuDungDat_Info ,
                'Rectangle_SVG_Array' => $Rectangle_SVG_Array,
                'PoLygon_SVG_Array' => $PoLygon_SVG_Array
            ]));

            $dompdf->setPaper('A4', 'portrait');

            $dompdf->render();

            //$output = $dompdf->output();
            
            // $fileName = 'thongtinquyhoach.pdf' ;
            // File::put(public_path()."/PDF/$fileName", $output);
          
            // $pdf = public_path()."/PDF/$fileName";
            //return response()->download($output);
             $dompdf->stream('qbc.pdf');

            // return response()->json([
            //     'error' => false,
            //     'message' => 'Xuất pdf thành công.'
            // ]);

        //        return view('PDF_Convert.ThongTinQuyHoach',[
        //     'current_date' => $current_date,
        //     'ThuaDat_Info' => $ThuaDat_Info,
        //     'SuDungDat_Info' =>$SuDungDat_Info,
        //     'Rectangle_SVG_Array' => $Rectangle_SVG_Array,
        //     'PoLygon_SVG_Array' => $PoLygon_SVG_Array
        // ]);

        }
        catch(\Exception $err)
        {
            return response()->json([
                'error' => true,
                'message' => 'Xuất pdf thất bại.'
            ]);
        }
    }
}
