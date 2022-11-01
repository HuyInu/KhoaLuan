<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('main.head')
        <link rel="stylesheet" href="https://js.arcgis.com/4.24/esri/themes/light/main.css"/>
        @yield('head')
    </head>
    <body>
        <div id="viewDiv"></div>
        <div id="selectDuAnQH">
            <select class="selectpicker" id="select-DAQH" data-live-search="true">
                <option value='0' disabled selected>Chọn quy hoạch</option>
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
                        <h4>Lớp bản đồ</h4>
                        <div id="layerList"></div>
                    </div>
                    <div id="base_Map_Container" class="container hide" >
                        <h4> Bản đồ nền</h4>
                        <div id="base-map"></div>
                    </div>
                    <div id="legend_Container" class="container hide" >            
                        <div id="legend"></div>
                    </div>
                    <div id="search_Container" class="container hide">
                        <div class="card-title">@yield('search-card-title')</div>
                        <form id="timKiem_form">
                            <div class="form-group">
                                <label for="Huyen">Quận huyện*</label>
                                <select class="form-control" id="Huyen" name="Huyen">
                                    <option disabled selected hidden>Chọn quận huyện</option>
                                    @foreach($Huyen_Data as $item)
                                    <option value="{{$item->MaHuyen}}">{{$item->TenHuyen}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Xa">Phường xã*</label>
                                <select class="form-control" id="Xa" name="Xa">
                                    <option disabled selected hidden>Chọn phường xã</option>
                                    
                                </select>
                            </div>
                            @yield('soThua-soTo-input')
                            <div class="form-group pull-right">
                                <button type="button" id="TimKiem" class="btn btn-info"> <i class="fas fa-search"></i> Tìm</button>
                            </div>
                        </form>
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

        <div id="bottom-right-control">
            <div id="map_control" >
                <div id="slider" class="map_control_item" style="height:133px; background: #f5deb300;"></div>
                <div id="zoom" class="map_control_item"></div>
                <div id="locate" class="map_control_item"></div>
            </div>
            <div id="showToaDo" style="padding: 0px 15px 0px;box-shadow: none;" ></div>
        </div>
        
        @yield('content')
        
	</body>
    <footer>
        @include('main.foot')
        <script src="https://js.arcgis.com/4.24/"></script>
        @yield('foot')
        
    </footer>

</html>
