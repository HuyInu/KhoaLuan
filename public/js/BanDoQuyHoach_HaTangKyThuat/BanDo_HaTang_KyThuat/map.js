require([
  "dojo/dom-class",
  "dojo/query",
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
  "esri/geometry/support/webMercatorUtils",
  "esri/PopupTemplate",
  "esri/core/reactiveUtils"

], (
  domClass,
  query,
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
  webMercatorUtils,
  PopupTemplate,
  reactiveUtils

  ) =>(async () =>{

  const url= "https://localhost:6443";

  const Huyen_Xa_Map = new MapImageLayer({
    url: "https://localhost:6443/arcgis/rest/services/BanDoNen/Huyen_Xa/MapServer",
    title:"Lớp nền",
    sublayers: [
      {
        id: 1,
        visible: true,
        title:'Quận huyện',
        listMode: "hide",
        maxScale:70000,
      },
      {
        id: 0,
        visible: true,
        title:'Phường xã',
        listMode: "hide",
        maxScale:35000,
        minScale:70000,
      },
    ]
  });

  const Huyen_Xa_Xa_sublayer = Huyen_Xa_Map.findSublayerById(0);


//---------------------------------------------Layer---------------------------------------------
//+++++++++++++++++++++++++++++CAP DIEN+++++++++++++++++++++++++++++
  const DuongDayDien_Title = "Đường dây diện";
  const TramBienAp_Title = "Trạm biến áp";

  const TramBienAp = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapDien/FeatureServer/0",
    title: TramBienAp_Title,
    visible:false
  });

  const DuongDayDien = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapDien/FeatureServer/1",
    title: DuongDayDien_Title,
    //visible:false
  });
  
//+++++++++++++++++++++++++++++END CAP DIEN+++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++CAP NUOC+++++++++++++++++++++++++++++
  const DuongCapNuoc_Title = "Đường ống nước";
  const NhaMayNuoc_Title = "Nhà máy nước";

  const DuongOngNuoc = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapNuoc/FeatureServer/1",
    title: DuongCapNuoc_Title,
    visible:false
  });

  const NhaMayNuoc = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapNuoc/FeatureServer/0",
    title: NhaMayNuoc_Title,
    visible:false
  });
//+++++++++++++++++++++++++++++END CAP NUOC+++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++GIAO THONG+++++++++++++++++++++++++++++
  const DuongGiaiThong_Title = "Đường giao thông";

  const DuongGiaoThong = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/GiaoThong/FeatureServer/0",
    title: DuongGiaiThong_Title,
    visible:false
  });
  //+++++++++++++++++++++++++++++END GIAO THONG+++++++++++++++++++++++++++++
  //+++++++++++++++++++++++++++++DUONG THOAT NUOC+++++++++++++++++++++++++++++
  const DuongThoatNuoc_Title ="Ống thoát nước";
  const TramXuLyNuocThai_Title ="Trạm xử lý nước thải";
  const TramBom_Title ="Trạm bơm";
  const MiengXa_Title ="Miệng xả";

  const DuongThoatNuoc = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/ThoatNuoc/FeatureServer/3",
    title: DuongThoatNuoc_Title,
    visible:false
  });

  const TramXuLyNuocThai = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/ThoatNuoc/FeatureServer/0",
    title: TramXuLyNuocThai_Title,
    visible:false
  });

  const TramBom = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/ThoatNuoc/FeatureServer/1",
    title: TramBom_Title,
    visible:false
  });

  const MiengXa = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/ThoatNuoc/FeatureServer/2",
    title: MiengXa_Title,
    visible:false
  });
  //+++++++++++++++++++++++++++++END DUONG THOAT NUOC+++++++++++++++++++++++++++++
  //---------------------------------------------EndLayer---------------------------------------------

//---------------------------------------------GROUP---------------------------------------------
  var CapNuoc_Group = new GroupLayer({
    title: "Cấp nước",
    layers: [NhaMayNuoc,DuongOngNuoc]
  });

  var CapDien_Group = new GroupLayer({
    title: "Cấp điện",
    layers: [TramBienAp, DuongDayDien]
  });

  var GiaoThong_Group = new GroupLayer({
    title: "Giao thông",
    layers: [DuongGiaoThong],
  });

  var ThoatNuoc_Group = new GroupLayer({
    title: "Thoát nước",
    layers: [DuongThoatNuoc, TramXuLyNuocThai, TramBom, MiengXa],
  });

  var HaTangKyThuat_Group = new GroupLayer({
    title: "Hạ tầng kỹ thuật",
    layers: [CapDien_Group, CapNuoc_Group, ThoatNuoc_Group,GiaoThong_Group],
    minScale: 50000//10000,
  });

  
//---------------------------------------------ENDGROUP---------------------------------------------
  const map = new Map({
    layers: [Huyen_Xa_Map,HaTangKyThuat_Group],
    basemap: "topo-vector"
  });

  const view = new MapView({
    container: "viewDiv",
    map: map,
    zoom: 17,
    center: [106.356817, 10.354037],
  });
  
//===============================================================================================
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
        layer: HaTangKyThuat_Group,
        title: "Hạ tầng kỹ thuật"
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



  //zoom
  const zoom = new Zoom({
    view: view,
    container: "zoom",
  });

  //locate
  const locateWidget = new Locate({
    view: view, 
    container: "locate",
  });

  const scaleBar = new ScaleBar({
    view: view,
    unit: "dual"
  });

  view.ui.add(scaleBar,"bottom-left")

  GiaoDienMain_hide_ZoomDefautWidget();
  view.ui.add(['selectDuAnQH','menu'], "top-right");
  view.ui.add(['bottom-right-control'], "bottom-right");

  //=======================================================VARIALBEL==============================
  var popup =new PopupTemplate();
  let highlight;
  const editThisAction = {
    title: "Chỉnh sửa",
    id: "edit-this",
    className: "esri-icon-edit"
  }
  
  var clickedFeature={name:null,OBJECTID:null};

  const layerArray =[{layer:DuongDayDien,DAQHCollum:'MaDuAnQuyHoach'},
                    {layer:DuongOngNuoc,DAQHCollum:'LoaiDuAnQuyHoach'},
                    {layer:TramBienAp,DAQHCollum:'MaDuAnQuyHoach'},
                    {layer:NhaMayNuoc,DAQHCollum:'LoaiDuAnQuyHoach'},
                    {layer:DuongGiaoThong,DAQHCollum:'MaDuAnQuyHoach'},
                    {layer:DuongThoatNuoc,DAQHCollum:'MaDuAnQuyHoach'},
                    {layer:TramXuLyNuocThai,DAQHCollum:'MaDuAnQuyHoach'},
                    {layer:TramBom,DAQHCollum:'MaDuAnQuyHoach'},
                    {layer:MiengXa,DAQHCollum:'MaDuAnQuyHoach'},]

  //=======================================================ENDVARIALBEL==============================
  //=======================================================FUNCTION==============================

  function showCoordinates(evt) {
    var point = view.toMap({x: evt.x, y: evt.y});
    //the map is in web mercator but display coordinates in geographic (lat, long)
    var mp = webMercatorUtils.webMercatorToGeographic(point);
    //display mouse coordinates
    $('#showToaDo').html("Lat/Lon "+mp.y.toFixed(6) + ", " + mp.x.toFixed(6));
  }

  function save_Clicked_Feature(name, OBJECTID)
  {
    clickedFeature.name= name;
    clickedFeature.OBJECTID=OBJECTID;
  }
  function selectFeature(graphic) {
    editFeature = graphic;
    view.whenLayerView(editFeature.layer).then((layerView) => {
        highlight = layerView.highlight(editFeature);
    });
  }
  function unselectFeature() {
    if (highlight) {
        highlight.remove();
    }
  }

  function click_feature(OBJECTID, layerTitle, getFeatureDATAFunction, action, mapPoint, graphic)
  {
    save_Clicked_Feature(layerTitle, OBJECTID);
    getFeatureDATAFunction(OBJECTID, action, view, mapPoint);
    selectFeature(graphic);
  }

  
  //=====================================================================================
  $('#Xa').on('change',function(){
    const queryXa = new Query({
      where : "MaPhuongXa = '"+$(this).val()+"'",
      returnGeometry:true,
    });   
    PublicFunction_extendLayer(Huyen_Xa_Xa_sublayer ,queryXa,view);
  })

  $('#select-DAQH').on('change',function(){
    var MaDAQH =  $(this).val();

    let myPromise = new Promise(function(resolve, reject) {
      PublicFunction_UI_Block('#viewDiv', 'fas fa-map', 'Đang tải bản đồ...');
    
      layerArray.forEach(function (value, index) {
        Function_sort_HaTangKyThuat_By_DAQH(value.layer,value.DAQHCollum, MaDAQH);
      });
      var featuresArray = [];
      
      var index =0;
      Function_Sort_HaTangKyThuat(index, layerArray, MaDAQH, featuresArray, view)

      resolve(1);
    });

    myPromise.then(function(){
      PublicFunction_UI_UnBlock('#viewDiv');
    })
    
  })

  view.on("pointer-move", showCoordinates);

  view.on("click", (event) => {
    view.hitTest(event).then((response) => {
      const results = response.results;
        if (
            results.length > 0 &&
            results[0].graphic
        ) {
          var odjectID;
          unselectFeature();
          switch(results[0].graphic.layer) {
            case DuongDayDien:
              odjectID = results[0].graphic.attributes.OBJECTID;
              click_feature(odjectID, results[0].graphic.layer.title, Ajax_get_DuongDayDien, editThisAction, event.mapPoint, results[0].graphic);
            break;

            case DuongOngNuoc:
              odjectID = results[0].graphic.attributes.OBJECTID;
              click_feature(odjectID, results[0].graphic.layer.title, Ajax_get_OngCapNuoc, editThisAction, event.mapPoint, results[0].graphic);
            break;

            case TramBienAp:
              odjectID = results[0].graphic.attributes.OBJECTID;
              click_feature(odjectID, results[0].graphic.layer.title, Ajax_get_TramBienAp, editThisAction, event.mapPoint, results[0].graphic);
            break;

            case NhaMayNuoc:
              odjectID = results[0].graphic.attributes.OBJECTID;
              click_feature(odjectID, results[0].graphic.layer.title, Ajax_get_NhaMayNuoc, editThisAction, event.mapPoint, results[0].graphic);
            break;
          }
        }
    });
  })

  
  view.popup.on("trigger-action", (event) => {
    if (event.action.id === "edit-this") {
      switch(clickedFeature.name) {
        case DuongDayDien_Title:
          GiaoDien_Show_Edit_DuongDayDien_Modal();
        break;
        case TramBienAp_Title:
          GiaoDien_Show_Edit_TramBienAp_Modal();
        break;
        case DuongCapNuoc_Title:
          GiaoDien_Show_Edit_DuongCapNuoc_Modal();
        break;
        case NhaMayNuoc_Title:
          GiaoDien_Show_Edit_NhaMayNuoc_Modal();
        break;
      };
    }
  });

  

})());