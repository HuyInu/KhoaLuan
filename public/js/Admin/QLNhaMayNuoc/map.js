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

        const CapNuoc_Map = new MapImageLayer({
            url: url+"/arcgis/rest/services/HaTangKyThuat/CapNuoc/MapServer",
            sublayers: [
              {
                id: 1,
                title:"Đường ong nuoc",
                listMode: "hide",
                visible:false
              },
              {
                id: 0,
                title:"Nha may nuoc",
                listMode: "hide",
                
              }],
          });

          const NhaMayNuoc_sublayer = CapNuoc_Map.findSublayerById(0);
    
          const map = new Map({
            layers: [CapNuoc_Map],
            basemap: "topo-vector",
          });
        
          const view = new MapView({
            container: "viewDiv",
            map: map,
            zoom: 17,
            center: [106.356817, 10.354037],
          });

             $(document).on("click", '#edit', function(event) { 
            const id = $(this).attr('OBJECTID');

            FunctionMap_Main_sort_feature(NhaMayNuoc_sublayer,'OBJECTID', id,view);
          })
    })());