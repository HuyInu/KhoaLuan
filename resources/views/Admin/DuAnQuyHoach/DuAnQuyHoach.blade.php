@extends('Admin.main')

@section('head')
    @include('Admin.DuAnQuyHoach.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Danh mục dự án quy hoạch</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Dự án quy hoạch</h4>
                <button class="btn btn-primary btn-round ml-auto" id="insert">
                    <i class="fa fa-plus"></i>
                    Thêm
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
                <!-- edit -->
                @include('Admin.DuAnQuyHoach.EditModal')
                <!-- insert -->
                @include('Admin.DuAnQuyHoach.InsertModal')
                
            <!-- End Modal -->

            <div class="table-responsive">
                <table id="DuAnQuyHoachTable" class="display table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr >
                            <th>STT</th>
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <th>Loại quy hoạch</th>
                            <th>Tình trạng phê duyệt</th>
                            <th>Ngày ký quyết định</th>
                            <th>SoQuyetDinhPheDuyet</th>
                            <th hidden>QuyMoDanSo</th>
                            <th hidden>TyLeBanVe</th>
                            <th hidden>DienTich</th>
                            <th hidden>ThoiGianXinPheDuyet</th>
                            <th hidden>ThoiGianQuyHoach</th>
                            <th hidden>ThoiGianLayYKien</th>
                            <th hidden>ThoiGianCongBo</th>
                            <th hidden>DonViQuanLy</th>
                            <th hidden>DonViCapNhat</th>
                            <th hidden>MaLoaiDuAn</th>
                            <th hidden>MaTienDoDuAn</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <th>Loại quy hoạch</th>
                            <th>Tình trạng phê duyệt</th>
                            <th>Ngày ký quyết định</th>
                            <th>SoQuyetDinhPheDuyet</th>
                            <th hidden>QuyMoDanSo</th>
                            <th hidden>TyLeBanVe</th>
                            <th hidden>DienTich</th>
                            <th hidden>ThoiGianXinPheDuyet</th>
                            <th hidden>ThoiGianQuyHoach</th>
                            <th hidden>ThoiGianLayYKien</th>
                            <th hidden>ThoiGianCongBo</th>
                            <th hidden>DonViQuanLy</th>
                            <th hidden>DonViCapNhat</th>
                            <th hidden>MaLoaiDuAn</th>
                            <th hidden>MaTienDoDuAn</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($dataDuAnQuyHoach as $item)
                        <tr>
                            <td></td>
                            <td class="MaDuAn">{{ isset($item->MaDuAn) ? $item->MaDuAn : ''}}</td>
                            <td class="TenDuAn">{{$item->TenDuAn ? $item->TenDuAn : ''}}</td>
                            <td id-data="{{ isset($item->LoaiQuyHoach->MaLoaiQuyHoach) ? $item->LoaiQuyHoach->MaLoaiQuyHoach : ''}}" class="TenLoaiQuyHoach">{{ isset($item->LoaiQuyHoach->TenLoaiQuyHoach) ? $item->LoaiQuyHoach->TenLoaiQuyHoach : ''}}</td>
                            <td id-data="{{$item->TinhTrangPheDuyet}}" class="TinhTrangPheDuyet">{{$item->TinhTrangPheDuyet == 1 ? 'Đã phê duyệt' : 'Chưa phê duyệt'}}</td>
                            <td class="NgayKyQuyetDinh">{{ isset($item->NgayKyQuyetDinh) ? $item->NgayKyQuyetDinh : ''}}</td>
                            <td class="SoQuyetDinhPheDuyet">{{ isset($item->SoQuyetDinhPheDuyet) ? $item->SoQuyetDinhPheDuyet : ''}}</td>
                            <td class="QuyMoDanSo" hidden>{{ isset($item->QuyMoDanSo)? $item->QuyMoDanSo : ''}}</td>
                            <td class="TyLeBanVe" hidden>{{ isset($item->TyLeBanVe) ? $item->TyLeBanVe : ''}}</td>
                            <td class="DienTich" hidden>{{ isset($item->DienTich) ? $item->DienTich : ''}}</td>
                            <td class="ThoiGianXinPheDuyet" hidden>{{ isset($item->ThoiGianXinPheDuyet) ? $item->ThoiGianXinPheDuyet : ''}}</td>
                            <td class="ThoiGianQuyHoach" hidden>{{ isset($item->ThoiGianQuyHoach) ? $item->ThoiGianQuyHoach : ''}}</td>
                            <td class="ThoiGianLayYKien" hidden>{{ isset($item->ThoiGianLayYKien) ? $item->ThoiGianLayYKien : ''}}</td>
                            <td class="ThoiGianCongBo" hidden>{{ isset($item->ThoiGianCongBo) ? $item->ThoiGianCongBo : ''}}</td>
                            <td class="DonViQuanLy" hidden>{{ isset($item->DonViQuanLy) ? $item->DonViQuanLy : ''}}</td>
                            <td class="DonViCapNhat" hidden>{{ isset($item->DonViCapNhat) ? $item->MaDonViCapNhatDuAn : ''}}</td>
                            <td id-data="{{ isset($item->MaLoaiDuAn) ? $item->MaLoaiDuAn : ''}}" class="MaLoaiDuAn" hidden>{{ isset($item->MaLoaiDuAn) ? $item->MaLoaiDuAn : ''}}</td>
                            <td id-data="{{ isset($item->MaTienDoDuAn) ? $item->MaTienDoDuAn : ''}}" class="MaTienDoDuAn" hidden>{{ isset($item->MaTienDoDuAn) ? $item->MaTienDoDuAn : ''}}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" id="edit" class="btn btn-link btn-primary btn-lg" data-original-title="Sửa">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" id="delete" class="btn btn-link btn-danger" data-original-title="Xóa">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('Admin.DuAnQuyHoach.foot') 
@endsection