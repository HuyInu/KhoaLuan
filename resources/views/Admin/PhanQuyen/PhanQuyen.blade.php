@extends('Admin.main')

@section('head')
    @include('Admin.PhanQuyen.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Phân quyền</a>
</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Phân quyền</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Người dùng</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <select class="selectpicker" id="select-NguoiDung" data-live-search="true">
                                        <option value='' disabled selected>Chọn người dùng</option>
                                        @foreach($NguoiDung_list as $item)
                                        <option value="{{$item->id }}">{{$item->Ho.' '.$item->Ten}}
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            
                        </div>    
                    </div>                     
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Quyền</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="tim_Quyen" placeholder="Tìm quyền">
                            </div>
                            <div class="form-group">
                            <div id="tree_Quyen" class="form-group">
                                    <ul id="treeData" style="display: none;">
                                        
                                            @foreach($Quyen_list as $item)
                                            <li id="{{$item->MaQuyen}}">{{$item->TenQuyen}}
                                            @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-success" id="save_Quyen_NguoiDung">Lưu</button>
                            </div> 
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('Admin.PhanQuyen.foot') 
@endsection