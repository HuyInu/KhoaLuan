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
        "esri/Graphic"
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
            Graphic
        )=> (async ()=> {

  const url= "https://localhost:6443";
  
          
  const SuDungDat_Map = new MapImageLayer({
    url: url+"/arcgis/rest/services/BanDoNen/Su_Dung_Dat/MapServer",
    title:"Sử dụng đất",
    opacity:0.7,
    minScale: 5958.4470,
    sublayers: [
      {
        id: 0,
        visible: true,
      }],
  });
  
  const SuDungDat_Map_sublayer = SuDungDat_Map.findSublayerById(0);


  const labelClass = {
    symbol: {
      type: "text",
      color: "green",
      font: {
        family: "Arial",
        size: 12,
        weight: "normal"
      }
    },
    labelPlacement: "above-center",
    labelExpressionInfo: {
      expression: "$feature.OBJECTID +'('+ $feature.SoHieuToBanDo+')'"
    }
  };

  const Thua_Dat_Map = new FeatureLayer({
    url: url+"/arcgis/rest/services/ThuaDat/Thua_Dat/FeatureServer/0",
    title:"Thửa dắt",
    opacity:0.7,
    minScale: 2000,
    listMode:"hide",
    labelingInfo:labelClass
  
  });
  
  const Xa = new FeatureLayer({
    url: url+"/arcgis/rest/services/BanDoNen/Huyen_Xa/FeatureServer/0",
    title:"Phường xã",
    minScale:40000,
  });

  const Huyen = new FeatureLayer({
    url: url+"/arcgis/rest/services/BanDoNen/Huyen_Xa/FeatureServer/1",
    title:"Quận huyện",
    maxScale:40000,
  });

  const Huyen_Xa_Group = new GroupLayer({
    title: "Lớp nền",
    layers: [Xa,Huyen],
  });

  const map = new Map({
    layers: [Huyen_Xa_Group,Thua_Dat_Map,SuDungDat_Map],
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

  //legend
  const legend = new Legend({
    view: view,
    container:"legend",
    layerInfos: [
      {
        layer: SuDungDat_Map,
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
    view: view
  });
  
  //view.ui.add(zoom, "bottom-right");

  //locate
  const locateWidget = new Locate({
    view: view, 
    container: "locate",
  });
  GiaoDienMain_remove_hideAttr_locateWidget();
  view.ui.add(["slider",zoom], "bottom-right");
  //view.ui.add([locateWidget], "top-left");

  //==============================================================================================

  function Map_All_removeGraphic()
  {
    view.graphics.removeAll();
  }
 
  //======================================ADDEVENTLISTENER========================================
  $('#close-left-info').on('click',function(){
    Map_All_removeGraphic();
    $( "#leftInfo" ).removeClass( "show_left_Info");
    $( "#leftInfo" ).addClass("hide_left_Info");
  })
  $('#Xa').on('change',function(){
    const query = new Query();
    query.where = "MaPhuongXa = '"+$(this).val()+"'";
    PublicFunction_extendLayer(Xa ,query,view);
  })
  $("#select-DAQH").on('change',function(){
    Function_sort_SuDungDat_By_DAQH(SuDungDat_Map_sublayer,'MaDuAnQuyHoach', $(this).val(),view);
  });

  view.on("click", (event) => {
    view.hitTest(event).then((response) => {
      const results = response.results;
      if (
          results.length > 0 &&
          results[0].graphic &&
          results[0].graphic.layer === Thua_Dat_Map
      ) {
          Map_All_removeGraphic()
          const odjectID = results[0].graphic.attributes.OBJECTID;

          Ajax_getThuaDat(odjectID,Graphic, view);
      }
      else
      {
        Map_All_removeGraphic();
      }


    });
  })

  $('#TimKiem').on('click',function(){
    const MaXa = $('#Xa').val();
    const SoTo = $('#SoTo').val();
    const SoThua = $('#SoThua').val();

    Map_All_removeGraphic();
    Ajax_timKiemThuaDat(MaXa, SoTo, SoThua,Thua_Dat_Map,Graphic, view);
  })

})());