<?php

namespace App\Http\Service\PDF\ThongTinQuyHoach;
use File;
class PDF_ThongTinQuyHoachService{
    
    public function Polygon_String_To_Array($geom, $xMin, $yMin)
    {
        $Polygon_type = $this->check_Polygon_or_Multipolygon($geom);
        if($Polygon_type == 1)
        {
            $result = $this->Multipolygon_To_Array($geom, $xMin, $yMin);
        }
        else
        {
            $result = $this->Polygon_To_Array($geom, $xMin, $yMin);
        }

        return $result;
    }

    public function check_Polygon_or_Multipolygon($geom)
    {
        $Polygon_type = substr($geom, 0, 5);
        if($Polygon_type == "MULTI")
        {
            return 1;
        }
        else
        {
            return 2;
        }

        return 0;
    }

    public function Polygon_To_Array($geom, $xMin, $yMin)
    {
        $a = substr($geom, 10, strlen($geom)-12);
        $a = explode(", ",$a);
  
        foreach ($a as $index => $value) {
            $a[$index] = explode(" ",$value);
            if($xMin == 0 || $xMin > $a[$index][0])
            {
                $xMin = $a[$index][0];
                
            }
            if($yMin == 0 || $yMin > $a[$index][1])
            {
                $yMin = $a[$index][1];
            }
        }
        return [$a, $xMin, $yMin];
    }

    public function Multipolygon_To_Array($geom, $xMin, $yMin)
    {
        $a = substr($geom, 16, strlen($geom)-19);
        $a = explode(")), ((",$a);
        foreach ($a as $index1 => $value1) {
            $a[$index1] = explode(", ",$value1);
            foreach ($a[$index1] as $index2 => $value2) {
                $a[$index1][$index2] = explode(" ",$value2);

                if($xMin == 0 || $xMin > $a[$index1][$index2][0])
                {
                    $xMin = $a[$index1][$index2][0];
                    
                }
                if($yMin == 0 || $yMin > $a[$index1][$index2][1])
                {
                    $yMin = $a[$index1][$index2][1];
                }
            }
        }

        return [$a, $xMin, $yMin];
    }

    public function Giam_scale_Polygon($geom, $xMin, $yMin)
    {
        
        foreach ($geom as $index => $value) {
           
            if(is_array($value[0]))
            {
                foreach ($value as $index1 => $value1) {
                    
                    $geom[$index][$index1][0] -=  $xMin;
                    $geom[$index][$index1][1] -=  $yMin;
                }
            }
            else
            {
                $geom[$index][0] -=  $xMin;
                $geom[$index][1] -=  $yMin;
            }
            
       }

       return $geom;
    }

    public function create_svg_Rectangle($index, $color)
    {
        $svg = '<svg width="40" height="20">
                    <rect width="40" height="20" style="fill: '.$color.';stroke-width:3;stroke:rgb(0,0,0)" />
                </svg>';
        
        return $svg;
    }

    public function create_svg_Polygon($index, $color, $geom, $scale)
    {
        $ring = null;
        $svg = null;
        $polygon = null;
        $Multi_polygon = null;
        foreach ($geom as $index => $value) {
            if(is_array($value[0]))
            {
                $ring = null;
                foreach ($value as $index1 => $value1){
                    $ring .= "$value1[0],$value1[1] ";
                }

                $Multi_polygon .= '<polygon points="'.$ring.'" style="fill:'.$color.';stroke:black;stroke-width:0.5px" />';
                
            }
            else
            {
                $ring .= "$value[0],$value[1] ";
                
            }  
        }          
        $polygon .= '<polygon points="'.$ring.'" style="fill:'.$color.';stroke:black;stroke-width:0.5px" />';  

        if($Multi_polygon != null)
        {   
            $svg = '<svg  viewBox="-5 -5 '.$scale.' '.$scale.'">'.$Multi_polygon.'</svg>';
        }
        else
        {
            $svg = '<svg  viewBox="-5 -5 '.$scale.' '.$scale.'">'.$polygon.'</svg>';
        }
        return $svg;
    }

    public function Tim_xMax_yMax($geom)
    {
        $xMax=0;
        $yMax=0;
        foreach ($geom as $index => $value) {
            if(is_array($value[0]))
            {
                foreach ($value as $index1 => $value1){
                    if($xMax == 0 || $xMax < $value1[0])
                    {
                        $xMax = $value1[0];
                        
                    }
                    if($yMax == 0 || $yMax < $value1[1])
                    {
                        $yMax = $value1[1];
                    }
                }
                
            }
            else
            {
                if($xMax == 0 || $xMax < $value[0])
                {
                    $xMax = $value[0];
                    
                }
                if($yMax == 0 || $yMax < $value[1])
                {
                    $yMax = $value[1];
                } 
            }  
        } 

        return [$xMax,$yMax];
    }

    public function color_array()
    {
        return ['#ff6459','#ff8b59','#ffaf59','#ffca59',
        '#ffe959','#f4ff59','#d3ff59','#afff59',
        '#7aff59','#49d128','#2af599','#2af5c6',
        '#2adaf5','#2a96f5','#132dd6','#7922e3',
        '#b922e3','#e322dd','#e322a9','#e32269'];
    }
}