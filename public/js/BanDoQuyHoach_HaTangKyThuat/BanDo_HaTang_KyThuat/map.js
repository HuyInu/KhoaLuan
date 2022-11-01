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
  "esri/geometry/support/webMercatorUtils",
  "esri/PopupTemplate"

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
  webMercatorUtils,
  PopupTemplate

) => {

  const url= "https://localhost:6443";

  const Huyen_Xa_Map = new MapImageLayer({
    url: "https://localhost:6443/arcgis/rest/services/BanDoNen/Huyen_Xa/MapServer",
    title:"Lớp nền",
    maxScale:4000,
    sublayers: [
      {
        id: 1,
        visible: true,
        title:'Quận huyện',
        listMode: "hide"
      },
      {
        id: 0,
        visible: true,
        title:'Phường xã',
        listMode: "hide"
      },
    ]
  });

  const Huyen_Xa_Xa_sublayer = Huyen_Xa_Map.findSublayerById(0);

  const TramBienAp = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapDien/FeatureServer/0",
    title:"Trạm biến áp",
    opacity:0.7,
    visible:false
  });

  const DuongDayDien = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapDien/FeatureServer/1",
    title:"Đường dây diện",
    opacity:0.7,
    //visible:false
  });

  const DuongOngNuoc = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapNuoc/FeatureServer/1",
    title:"Đường ống nước",
    opacity:0.7,
    visible:false
  });

  const NhaMayNuoc = new FeatureLayer({
    url: url+"/arcgis/rest/services/HaTangKyThuat/CapNuoc/FeatureServer/0",
    title:"Nhà máy nước",
    opacity:0.7,
    visible:false
  });

  var CapNuoc_Group = new GroupLayer({
    title: "Cấp nước",
    layers: [NhaMayNuoc,DuongOngNuoc]
  });

  var CapDien_Group = new GroupLayer({
    title: "Cấp điện",
    layers: [TramBienAp, DuongDayDien]
  });

  var HaTangKyThuat_Group = new GroupLayer({
    title: "Hạ tầng kỹ thuật",
    layers: [CapDien_Group,CapNuoc_Group],
    minScale: 10000,
    
  });


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
  });

  const scaleBar = new ScaleBar({
    view: view,
    unit: "dual"
  });

  view.ui.add(scaleBar,"bottom-left")

  GiaoDienMain_hide_ZoomDefautWidget();
  view.ui.add(['selectDuAnQH','menu'], "top-right");
  view.ui.add(['bottom-right-control'], "bottom-right");
//=======================================================FUNCTION==============================

function showCoordinates(evt) {
  var point = view.toMap({x: evt.x, y: evt.y});
  //the map is in web mercator but display coordinates in geographic (lat, long)
  var mp = webMercatorUtils.webMercatorToGeographic(point);
  //display mouse coordinates
  $('#showToaDo').html("Lat/Lon "+mp.y.toFixed(6) + ", " + mp.x.toFixed(6));
}

//=====================================================================================
$('#Xa').on('change',function(){
  const query = new Query({
    where : "MaPhuongXa = '"+$(this).val()+"'",
    returnGeometry:true,
  });
  
  PublicFunction_extendLayer(Huyen_Xa_Xa_sublayer ,query,view);
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
          var popup =new PopupTemplate();

          switch(results[0].graphic.layer) {
            case DuongDayDien:
              odjectID = results[0].graphic.attributes.OBJECTID;

              Ajax_get_DuongDayDien(odjectID,popup,DuongDayDien);
            break;

            case DuongOngNuoc:
              odjectID = results[0].graphic.attributes.OBJECTID;

              Ajax_get_OngCapNuoc(odjectID,popup,DuongOngNuoc);
            break;

            case TramBienAp:
              odjectID = results[0].graphic.attributes.OBJECTID;

              Ajax_get_TramBienAp(odjectID,popup,TramBienAp);
            break;

            case NhaMayNuoc:
              odjectID = results[0].graphic.attributes.OBJECTID;

              Ajax_get_NhaMayNuoc(odjectID,popup,NhaMayNuoc);
            break;
          }
            
           
        }
    });
  })

});