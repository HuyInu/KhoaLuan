require([
        "esri/Map",
        "esri/views/MapView",
        "esri/layers/MapImageLayer",
        "esri/layers/FeatureLayer",
        "esri/widgets/LayerList",
        "esri/widgets/Legend",
        "esri/widgets/BasemapGallery",
        "esri/widgets/BasemapGallery/support/LocalBasemapsSource",
        "esri/Basemap",
        "esri/layers/GroupLayer",
        "esri/widgets/Slider",
        "esri/widgets/Zoom",
        "esri/widgets/Locate",
        "esri/rest/support/Query",
        "esri/geometry/Polygon",
        "esri/Graphic",
        "esri/widgets/ScaleBar",
        "esri/geometry/support/webMercatorUtils"
        ], (
            Map, 
            MapView,
            MapImageLayer,
            FeatureLayer,
            LayerList,
            Legend,
            BasemapGallery,
            LocalBasemapsSource,
            Basemap,
            GroupLayer,
            Slider,
            Zoom,
            Locate,
            Query,
            Polygon,
            Graphic,
            ScaleBar,
            webMercatorUtils
        )=> (async ()=> {
  
  const url= "https://localhost:6443";
  
          
  const SuDungDat_Map = new MapImageLayer({
    url: url+"/arcgis/rest/services/BanDoNen/Su_Dung_Dat/MapServer",
    title:"Quy hoạch xây dựng",
    opacity:0.7,
    minScale: 40000,
    sublayers: [
      {
        id: 0,
        title:" ",
        listMode: "hide",
      }],
  });
  const SuDungDat_Map_sublayer = SuDungDat_Map.findSublayerById(0);

  const HienTrang_Map = new MapImageLayer({
    url: url+"/arcgis/rest/services/BanDoNen/HienTrangSuDungDat/MapServer",
    title:"Hiện trạng xây dựng",
    opacity:0.7,
    minScale: 40000,
    visible:false,
    sublayers: [
      {
        id: 0,
        title:" ",
        listMode: "hide",
      }],
  });

  const SuDungDat_Group = new GroupLayer({
    title: "Sử dụng đất",
    layers: [SuDungDat_Map,HienTrang_Map],
  });

  

  const labelClass = {
    symbol: {
      type: "text",
      color: "#000000",
      font: {
        family: "Arial",
        size: 12,
        weight: "normal"
      }
    },
    labelPlacement: "always-horizontal",
    labelExpression: '[SoThuTuThua] CONCAT "(" CONCAT [SoHieuToBanDo] CONCAT ")"'
  };

  const Thua_Dat_Map = new MapImageLayer({
    url: url+"/arcgis/rest/services/ThuaDat/Thua_Dat/MapServer",
    title:"Thửa dắt",
    opacity:0.7,
    minScale: 2000,
    listMode:"hide",
    
    sublayers: [
      {
        id: 0,
        title:" ",
        labelingInfo:labelClass,
        popupTemplate: {
          title: " ",
          outFields: ["*"]
        }
      }],
  });

  const ThuaDat_sublayer = Thua_Dat_Map.findSublayerById(0);
  
  const Huyen_Xa = new MapImageLayer({
    url: url+"/arcgis/rest/services/BanDoNen/Huyen_Xa/MapServer",
    title:"Lớp nền",
    sublayers: [
      {
        id: 1,
        title:"Quận huyện",
        maxScale:70000,
      },
      {
        id: 0,
        title:"Phường xã",
        minScale:40000,
      },
      ],
  });

  const Huyen_Xa_Xa_sublayer = Huyen_Xa.findSublayerById(0);


  const map = new Map({
    layers: [Huyen_Xa,SuDungDat_Group, Thua_Dat_Map],
    basemap: "topo-vector",
  });

  const view = new MapView({
    container: "viewDiv",
    map: map,
    zoom: 17,
    center: [106.356817, 10.354037],
  });
  //=================================================================================================

  view.ui.add('selectDuAnQH', "top-right");
  view.ui.add('menu', "top-right");

  GiaoDienMain_hide_ZoomDefautWidget();

    //layerlist
  const layerList = new LayerList({
    container: "layerList",
    view: view,
  });
  layerList.selectionEnabled = false;

  layerList.when(function(){
    GiaoDienMain_expandLayerList();
  })

  //legend
  const legend = new Legend({
    view: view,
    container:"legend",
    layerInfos: [
      {
        layer: SuDungDat_Group,
        title: "Sử dụng đất"
      }
    ]
  });

  //base map galley
  var source = new LocalBasemapsSource({
    basemaps: [Basemap.fromId("hybrid"),
              Basemap.fromId("topo-vector"),
              Basemap.fromId("streets-vector"),
              Basemap.fromId("dark-gray"),
              ]
            });

  let basemapGallery = new BasemapGallery({
    view: view,
    container: "base-map",
    source:source,
  });

  //opacity slider
  const opacitySlider = new Slider({
    min: 0,
    max: 1,
    steps: 0.1,
    values: [0.7],
    layout:"vertical",
    container:"slider"
  });

  opacitySlider.on("thumb-drag", function(event){ 
    SuDungDat_Map.opacity = event.value;
  });

  //zoom
  const zoom = new Zoom({
    view: view,
    container: "zoom",
  });
  

  //locate
  const locateWidget = new Locate({
    view: view, 
    container: "locate",
    useHeadingEnabled: false,
    goToOverride: function(view, options) {
      options.target.scale = 1500;
      return view.goTo(options.target);
    }
    
  });
  
  
  view.ui.add(['bottom-right-control'], "bottom-right");

  const scaleBar = new ScaleBar({
    view: view,
    unit: "dual"
  });

  view.ui.add(scaleBar,"bottom-left")

  //==============================================================================================

  function Map_All_removeGraphic()
  {
    view.graphics.removeAll();
  }

  function showCoordinates(evt) {
    var point = view.toMap({x: evt.x, y: evt.y});
    //the map is in web mercator but display coordinates in geographic (lat, long)
    var mp = webMercatorUtils.webMercatorToGeographic(point);
    //display mouse coordinates
    $('#showToaDo').html("Lat/Lon "+mp.y.toFixed(6) + ", " + mp.x.toFixed(6));
  }
  //======================================VARIALBEL========================================
  //-------Locate--------
  var latFeature = 0;
  var longFeature = 0;
  //-------END Locate--------

  //-------zoom to feature-------
  var featureCenter = null;
  //-------end zoom to feature-------
  //==============================================================================================
  //======================================ADDEVENTLISTENER========================================
  view.when(function(){

  
  $('#close-left-info').on('click',function(){
    Map_All_removeGraphic();
    GiaoDien_Hide_LeftInfo();
  })
  
  $('#Xa').on('change',function(){
    const query = new Query({
      where : "MaPhuongXa = '"+$(this).val()+"'",
      returnGeometry:true,
    });
    
    PublicFunction_extendLayer(Huyen_Xa_Xa_sublayer ,query,view);
  })
  
  $("#select-DAQH").on('change',function(){
    Function_sort_SuDungDat_By_DAQH(SuDungDat_Map_sublayer,'MaDuAnQuyHoach', $(this).val(),view);
  });

  view.on("click", (event) => {
    PublicFunction_xoa_lat_long_center_feature_from_localStorage();

    latFeature = event.mapPoint.latitude;
    longFeature = event.mapPoint.longitude;
  })

  view.popup.watch("selectedFeature", (graphic) => {
    Map_All_removeGraphic();
    PublicFunction_xoa_lat_long_center_feature_from_localStorage();

    if(graphic !=null)
    {    
      if(graphic.sourceLayer != null && graphic.sourceLayer.layer == Thua_Dat_Map && graphic.sourceLayer.id ==0){
        view.popup.close();
        PublicFunction_UI_Block('#viewDiv', 'fas fa-map', 'Vui lòng chờ...');
        featureCenter = graphic.geometry.extent.center;

        let myPromise = new Promise(function(myResolve, myReject) {
         
          const odjectID = graphic.attributes.OBJECTID;
          Ajax_getThuaDat(odjectID,Graphic, view);

          myResolve(1); 
        })

        myPromise.then(function(){
          PublicFunction_UI_UnBlock('#viewDiv');
        })
      }  
    }
    else
    {
      GiaoDien_Hide_LeftInfo();
    }
  });

  view.on("pointer-move", showCoordinates);

  $('#TimKiem').on('click',function(){

    if ( $('#timKiem_form').valid() ) {
      PublicFunction_UI_Block('#viewDiv', 'fas fa-map', 'Đang tìm...');

      let myPromise = new Promise(function(myResolve, myReject) {
        const MaXa = $('#Xa').val();
        const SoTo = $('#SoTo').val();
        const SoThua = $('#SoThua').val();

        Map_All_removeGraphic();
        Ajax_timKiemThuaDat(MaXa, SoTo, SoThua,ThuaDat_sublayer,Graphic, view);

        myResolve(1); 
      });
        
      myPromise.then(function(){
        PublicFunction_UI_UnBlock('#viewDiv');
      })
    }
  })
  

  $('#chiDuong').on('click',function(){
    locateWidget.goToLocationEnabled = false;

    if(localStorage.getItem('lat')!== null && localStorage.getItem('long')!== null)
    {
      var lat =localStorage.getItem('lat');
      var long = localStorage.getItem('long');

      latFeature = parseFloat(lat);
      longFeature = parseFloat(long);
    }
    
    locateWidget.locate().then(function(event){
      var latLocation = event.coords.latitude;
      var longLocation = event.coords.longitude;
      var GooGleMapDirUrl = `https://www.google.com/maps/dir/${latLocation},${longLocation}/${latFeature},${longFeature}`;
      window.open(GooGleMapDirUrl);
    
    }).then(function(){
      locateWidget.goToLocationEnabled = true;
    }).catch(function(){
      warningAlert("Vui lòng cấp quyền truy cập vị trí cho trang web.")
    });
    
  });

  $('#phongDen').on('click',function(){
    if(localStorage.getItem('lat')!== null && localStorage.getItem('long')!== null)
    {
      var lat =localStorage.getItem('lat');
      var long = localStorage.getItem('long');

      featureCenter = [parseFloat(long), parseFloat(lat)];
    }
 
    view.goTo({
      center: featureCenter,
      zoom: view.zoom + 2
    });
  });
  })
})());