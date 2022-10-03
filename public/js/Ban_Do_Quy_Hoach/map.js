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

        ) => {

  const SuDungDat_Map = new MapImageLayer({
    url: "https://localhost:6443/arcgis/rest/services/BanDoNen/Su_Dung_Dat/MapServer",
    title:"Sử dụng đất",
    opacity:0.7,
    minScale: 5958.4470,
  });

  const labelClass = {
    // autocasts as new LabelClass()
    symbol: {
      type: "text", // autocasts as new TextSymbol()
      color: "green",
      font: {
        // autocast as new Font()
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
    url: "https://localhost:6443/arcgis/rest/services/ThuaDat/Thua_Dat/FeatureServer/0",
    title:"Thửa dắt",
    opacity:0.7,
    minScale: 2000,
    listMode:"hide",
    labelingInfo:labelClass
  
  });

  const Huyen_Xa_Map = new MapImageLayer({
    url: "https://localhost:6443/arcgis/rest/services/BanDoNen/Huyen_Xa/MapServer",
    title:"Lớp nền",
    maxScale:4000,
    sublayers: [
      {
        id: 1,
        visible: true,
        title:'Quận huyện'
      },
      {
        id: 0,
        visible: true,
        title:'Phường xã'
      },
    ]
  });

  const map = new Map({
    layers: [Huyen_Xa_Map,Thua_Dat_Map,SuDungDat_Map],
    basemap: "topo-vector"
  });

  const view = new MapView({
    container: "viewDiv",
    map: map,
    zoom: 17,
    center: [106.356817, 10.354037],
  });
 // MapImage.visible  = false;

  view.ui.add('selectDuAnQH', "top-right");
  view.ui.add('menu', "top-right");

  view.when(() => { });

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

  

});