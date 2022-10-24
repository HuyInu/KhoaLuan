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
    layers: [HaTangKyThuat_Group,Huyen_Xa_Map],
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

  

  //zoom
  const zoom = new Zoom({
    view: view
  });

  //locate
  const locateWidget = new Locate({
    view: view, 
    container: "locate",
  });

  GiaoDienMain_remove_hideAttr_locateWidget();
  GiaoDienMain_hide_ZoomDefautWidget();
  view.ui.add(['selectDuAnQH','menu'], "top-right");
  view.ui.add(['slider',zoom,'locate'], "bottom-right");
//=======================================================FUNCTION==============================

//=====================================================================================
  view.on("click", (event) => {
    view.hitTest(event).then((response) => {
      const results = response.results;
        if (
            results.length > 0 &&
            results[0].graphic
        ) {
          var odjectID;
          var popup =new PopupTemplate();;

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