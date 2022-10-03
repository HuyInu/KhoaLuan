<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('Ban_Do_Tra_Cuu_Quy_Hoach.head')
    </head>
    <body>
        <div id="viewDiv"></div>
        <div id="selectDuAnQH">
            <select class="selectpicker" id="select-DAQH" data-live-search="true">
                <option value=''>Chọn quy hoạch</option>
                <option value='0'>Tất cả</option>
                @foreach($DAQH_List as $item)
                <option value='{{$item->MaDuAn}}'>{{$item->TenDuAn}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-2" id="menu">
                <div class="row">
                    <div id="content">
                        <div id='layer_list_container' class="container hide" >
                            <div class="card-body">
                                <h4>Lớp bản đồ</h4>
                                <div id="layerList"></div>
                            </div>
                        </div>
                        <div id="base_Map_Container" class="container hide" >
                            <div class="card-body">
                                <h4> Bản đồ nền</h4>
                                <div id="base-map"></div>
                            </div>
                        </div>
                        <div id="legend_Container" class="container hide" >
                            <div class="card-body">
                                <div id="legend"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="menu-list">
                        <div class="menu-item">
                            <a href="{{route('home')}}">
                            <button type="button" class="btn btn-icon btn-round btn-primary item-button" id="home">
                                <i class="fas fa-home"></i>
                            </button>
                            </a>
                        </div>
                        <div class="menu-item">
                            <button type="button" class="btn btn-icon btn-round btn-primary item-button" id="basemap">
                                <i class="fas fa-map"></i>
                            </button>
                        </div>
                    
                        <div class="menu-item">
                            <button type="button" class="btn btn-icon btn-round btn-primary item-button" id="layerlist">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    
                        <div class="menu-item">
                            <button type="button" class="btn btn-icon btn-round btn-primary item-button" id="infor">
                                <i class="fas fa-info"></i>
                            </button>
                        </div>
                    
                        <div class="menu-item">
                            <button type="button" class="btn btn-icon btn-round btn-primary item-button" id="search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
        </div>

        
	</body>
    <footer>
        @include('Ban_Do_Tra_Cuu_Quy_Hoach.foot')
    </footer>
</html>
