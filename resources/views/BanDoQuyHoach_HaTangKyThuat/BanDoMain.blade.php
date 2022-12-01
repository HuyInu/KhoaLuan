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
                    @yield('search')
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
                    @yield('search_menu')
                </div>
            </div>
        </div>

        <div id="bottom-right-control" style="">
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
        <script src="/js/main/UIBlock.js"></script>
        @yield('foot')
        
    </footer>

</html>
