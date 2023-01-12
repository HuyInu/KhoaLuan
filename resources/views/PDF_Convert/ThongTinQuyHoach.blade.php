<!DOCTYPE html>
<html  xml:lang="vi" lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Xem thông tin quy hoạch</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        .p,
        p {
            color: #202429;
            font-family: ArialRegular;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
            margin: 0pt;
        }

        h1 {
            color: #202429;
            font-family: ArialBold;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 18pt;
        }

        h2 {
            color: #202429;
            font-family: ArialBold;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 15pt;
        }

        h3 {
            color: #202429;
            font-family: ArialBold;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        .s1 {
            color: #202429;
            font-family: ArialBold;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        .s2 {
            color: #202429;
            font-family: ArialRegular;
            font-style: normal;
            font-weight: bald;
            text-decoration: none;
            font-size: 10pt;
        }

        h4 {
            color: #202429;
            font-family: ArialRegular;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9.5pt;
        }

        .s3 {
            color: #F00;
            font-family: ArialRegular;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        li {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
            counter-reset: c1 1;
        }

        #l1>li>*:first-child:before {
            counter-increment: c1;
            content: counter(c1, upper-roman)". ";
            color: #202429;
            font-family: ArialRegular;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 15pt;
        }

        #l1>li:first-child>*:first-child:before {
            counter-increment: c1 0;
        }

        #l2 {
            padding-left: 0pt;
        }

        #l2>li>*:first-child:before {
            content: "- ";
            color: #202429;
            font-family: ArialRegular;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        #l3 {
            padding-left: 0pt;
        }

        

        #SuDungDat_Group {
            padding-left: 0pt;
        }

        #SuDungDat_Group>li>*:first-child:before {
            content: "- ";
            color: #202429;
            font-family: ArialRegular;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }

        .wrap{
            width: 90%;
            
            margin-left: 5%;
            margin-right: 5%;
        }  
        .header{
            height: 81px;
        }
        .current-date{
            float:right;
        }
        .ten-coquan{
            float:left;
            width: 338px;
        }
        .page_break 
        { page-break-before: always; }
        .bold{
            font-family: ArialBold;
        }
    </style>

    <!-- CSS Files -->
    
</head>

<body>
    <div class="wrap ">
        <div class="header">
                <div class="ten-coquan">
                    <p style="padding-top: 4pt;padding-left: 61pt;text-indent: -47pt;line-height: 167%;text-align: left;">ỦY BAN NHÂN DÂN THÀNH PHỐ MỸ THO PHÒNG QUẢN LÝ ĐÔ THỊ</p>
                </div>
                <div class="current-date">
                    <p style="padding-top: 4pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">{{$current_date}}</p>
                </div>
        </div>
        <p style="text-indent: 0pt;text-align: left;">
            <br />
        </p>
        <h1 style="padding-top: 13pt;text-indent: 0pt;text-align: center;">THÔNG TIN QUY HOẠCH</h1>
        <ol id="l1">
            <li data-list-text="I.">
                <h2 style="padding-top: 15pt;padding-left: 32pt;text-indent: -16pt;text-align: left;">Thông tin thửa đất</h2>
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <ul id="l2">
                    <li data-list-text="-">
                        <p style="padding-left: 39pt;text-indent: -8pt;text-align: left;">Thửa đất số: {{$ThuaDat_Info[0]->SoThuTuThua}}</p>
                    </li>
                    <li data-list-text="-">
                        <p style="padding-top: 9pt;padding-left: 39pt;text-indent: -8pt;text-align: left;">Tờ bản đồ số: {{$ThuaDat_Info[0]->SoHieuToBanDo}}</p>
                    </li>
                    <li data-list-text="-">
                        <p style="padding-top: 9pt;padding-left: 39pt;text-indent: -8pt;text-align: left;">Địa chỉ: {{$ThuaDat_Info[0]->DMXa->TenXa.' - '.$ThuaDat_Info[0]->DMXa->DMHuyen->TenHuyen}}</p>
                    </li>
                    <li data-list-text="-">
                        <p style="padding-top: 9pt;padding-left: 39pt;text-indent: -8pt;text-align: left;">Diện tích: {{ str_replace('.', ',',$ThuaDat_Info[0]->DienTich)}} m<sup>2</sup></p>
                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    </li>
                </ul>
            </li>
            <li data-list-text="II.">
                <h2 style="padding-left: 38pt;text-indent: -22pt;text-align: left;">Thông tin quy hoạch</h2>
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <ul id="l3">
                    <li>
                        @php
                            $stt = 0;
                            $MaDuAnTamp = null;
                        @endphp
                        @foreach($SuDungDat_Info as $index=>$item)
                            @if($item->MaDuAnQuyHoach != $MaDuAnTamp && $index > 0)
                                </table>
                            @endif
                            @if($item->MaDuAnQuyHoach != $MaDuAnTamp)
                            <p style="padding-left: 39pt;text-indent: -8pt;text-align: left;">- {{$item->TenLoaiQuyHoach}} với tổng
                                diện tích {{ str_replace('.', ',',$item->TongDienTich) ?? '...'}} <span class="bold">m<sup>2</sup> </span>cụ thể</p>
                            <p style="padding-top: 9pt;padding-left: 46pt;text-indent: 0pt;line-height: 167%;text-align: left;">
                                + Quyết định số {{($item->SoQuyetDinhPheDuyet != null || $item->SoQuyetDinhPheDuyet != '') ? $item->SoQuyetDinhPheDuyet : '...'}} ngày {{$item->NgayKyQuyetDinh ?? '...'}} về phê duyệt quy hoạch đồ án <span class="bold">&nbsp;{{$item->TenDuAn ?? '...'}}</span></p>
                            <h3 style="padding-left: 46pt;text-indent: 0pt;text-align: left;">
                                <span class="p">tỷ lệ {{$item->TyLeBanVe ?? '...'}} với diện tích {{str_replace('.', ',',$item->DienTich) ?? '...'}} </span><span class="bold">m<sup>2</sup></span> <span class="p">cụ thể:</span>
                            </h3>
                            <p style="text-indent: 0pt;text-align: left;"><br /></p>
                            <p style="padding-left: 15pt;text-indent: 0pt;line-height: 1pt;text-align: left;" />
                            <p style="text-indent: 0pt;text-align: left;"><br /></p>
                            <table style="border-collapse:collapse;margin-left:16.266pt" cellspacing="0">
                                
                                <tr style="height:26pt">
                                    <td
                                        style="width:40pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#DEE1E6">
                                        <p class="s1"
                                            style="padding-top: 3pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">STT
                                        </p>
                                    </td>
                                    <td
                                        style="width:146pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#DEE1E6">
                                        <p class="s1"
                                            style="padding-top: 3pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">Chức
                                            năng</p>
                                    </td>
                                    <td
                                        style="width:90pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#DEE1E6">
                                        <p class="s1"
                                            style="padding-top: 3pt;padding-left: 19pt;text-indent: 0pt;text-align: left;">Diện tích<br>(m<sup>2</sup>)
                                        </p>
                                    </td>
                                    <td
                                        style="width:76pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#DEE1E6">
                                        <p class="s1"
                                            style="padding-top: 3pt;padding-left: 21pt;text-indent: 0pt;text-align: left;">Mật độ XD
                                        </p>
                                    </td>
                                    <td
                                        style="width:82pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#DEE1E6">
                                        <p class="s1"
                                            style="padding-top: 3pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">Tầng cao XD
                                        </p>
                                    </td>
                                    <td
                                        style="width:80pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#DEE1E6">
                                        <p class="s1"
                                            style="padding-top: 3pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">Hệ số SDĐ
                                        </p>
                                    </td>
                                </tr>
                                    @php
                                        $stt=0;
                                        $MaDuAnTamp = $item->MaDuAnQuyHoach;
                                    @endphp
                                @endif
                                @php
                                    $stt++;
                                @endphp
                                <tr style="height:54pt">
                                    <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-top-color:#DEE1E6">
                                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                        <p class="s2" style="padding-left: 9pt;text-indent: 0pt;text-align: left;">{{$stt}}</p>
                                    </td>
                                    <td
                                        style="width:146pt;border-top-style:solid;border-top-width:2pt;border-top-color:#DEE1E6">
                                        <p class="s2"
                                            style="padding-top: 6pt;padding-left: 17pt;padding-right: 19pt;text-indent: 0pt;line-height: 23pt;text-align: left;">
                                            {{$item->TenLoaiDatTheoDA}}</p>
                                    </td>
                                    <td style="width:90pt;border-top-style:solid;border-top-width:2pt;border-top-color:#DEE1E6">
                                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                        <p class="s2" style="padding-left: 19pt;text-indent: 0pt;text-align: left;">{{str_replace('.', ',',$item->DienTich)}}</p>
                                    </td>
                                    <td style="width:76pt;border-top-style:solid;border-top-width:2pt;border-top-color:#DEE1E6">
                                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                        <p class="s2" style="padding-left: 19pt;text-indent: 0pt;text-align: left;">{{($item->MatDoXayDung != null && $item->MatDoXayDung != 0) ? $item->MatDoXayDung : 'Chưa có dữ liệu'}}</p>
                                    </td>
                                    <td style="width:82pt;border-top-style:solid;border-top-width:2pt;border-top-color:#DEE1E6">
                                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                        <p class="s2" style="padding-left: 19pt;text-indent: 0pt;text-align: left;">{{($item->TangCaoXayDung != null && $item->TangCaoXayDung != 0) ? $item->TangCaoXayDung : 'Chưa có dữ liệu'}}</p>
                                    </td>
                                    <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-top-color:#DEE1E6">
                                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                        <p class="s2" style="padding-left: 16pt;text-indent: 0pt;text-align: left;">{{($item->HeSoSuDungDat != null && $item->HeSoSuDungDat != 0) ? $item->HeSoSuDungDat : 'Chưa có dữ liệu'}}</p>
                                    </td>
                                </tr>
                                @if($index == count($SuDungDat_Info)-1)
                                    </table>
                                @endif
                            @endforeach
                        
                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    </li>
                    
                </ul>
            </li>
            <li data-list-text="III.">
                <h2 style="padding-top: 4pt;padding-left: 43pt;text-indent: -27pt;text-align: left;">Sơ đồ quy hoạch thửa
                    đất</h2>
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <div id="SuDungDat_Group">
                    @php
                        $MaDuAnTamp = null;
                        $start =0;
                        $end = 0;
                    @endphp
                    @foreach($SuDungDat_Info as $index => $item)
                        @if($item->MaDuAnQuyHoach != $MaDuAnTamp)
                        <div class="page_break">
                            <h3 style="padding-left: 27pt;text-indent: 0pt;line-height: 167%;text-align: left;">Dự án: 
                                <span class="p">{{$item->TenDuAn}}</span>
                            </h3>
                            <p style="text-indent: 0pt;text-align: left;" />
                        </div>
                        <div class="abc">
                            <div class="KyHieu">
                        @php
                            $start =$index;
                            $MaDuAnTamp = $item->MaDuAnQuyHoach;
                            $GioiHan_kyHieu = 0;
                        @endphp
                        @endif
                        

                            @php
                                $svg = $Rectangle_SVG_Array[$index];
                                $svg64 = base64_encode($svg);
                                $GioiHan_kyHieu++;
                            @endphp
                                <div class="KyHieu_item" style="float:left;">
                                    <img style="float:left;margin-top: 7px" src = "data:image/svg+xml;base64,{{$svg64}}" >
                                    
                                    <p style="padding-top: 1pt;padding-left: 33pt;text-indent: 0pt;text-align: left; width:175px;  word-wrap: break-word;  ">
                                        {{$item->TenLoaiDatTheoDA}}
                                    </p>
                                </div>
                                @if($GioiHan_kyHieu == 3)
                                    <div style="clear:left"></div>
                                    @php
                                        $GioiHan_kyHieu = 0;
                                    @endphp
                                @endif
                            
                            @if($index == (count($SuDungDat_Info)-1) || $MaDuAnTamp != $SuDungDat_Info[$index+1]->MaDuAnQuyHoach)
                                <div style="clear:left"></div>
                                </div>
                                @php
                                    $end = $index;
                                    
                                @endphp
                                <div class="PoLyGon" style="height: 600px; margin-top:120px">
                                @for($i=$start; $i<=$end; $i++)
                                    @php
                                        $svgPolygon = $PoLygon_SVG_Array[$i];
                                        $svgPolygon64 = base64_encode($svgPolygon);
                                    @endphp
                                    <img  style="width:100%;transform: scaleY(-1); position: absolute; z-index: ${i};" src = "data:image/svg+xml;base64,{{$svgPolygon64}}" > 
                              
                                @endfor
                                </div>
                            </div>
                            @endif
                        
                    @endforeach
                    
                </div>
            </li>
        </ol>

        <div class="page_break">
            <p class="s3" style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;line-height: 167%;text-align: left;">Lưu ý:
                Kết quả tra cứu chỉ có giá trị tham khảo thông tin về chức năng sử dụng đất. Trong trường hợp cần cung cấp thông
                tin quy hoạch chi tiết hơn, đề nghị ông/bà liên hệ cơ quan có thẩm quyền.
            </p>
        </div>
        
    </div>
</body>

</html>