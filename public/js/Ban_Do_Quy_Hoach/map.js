require([
            "esri/Map",
            "esri/views/MapView"
        ], 
        (
            Map, 
            MapView
        ) => {
            
    const map = new Map({
      basemap: "topo-vector"
    });

    const view = new MapView({
      container: "viewDiv",
      map: map,
      zoom: 4,
      center: [15, 65] // longitude, latitude
    });
  });