function PublicFunction_extendLayer(layer, Query, view)
  {
    layer.queryFeatures(Query).then(function(results){
      view.goTo(results.features[0].geometry.extent);  // go to the extent of the results satisfying the query
    });
  }

  function PublicFunction_goToFeature(geometry,view)
  {
    view.goTo({
      center: [geometry],
      zoom: 20
    });
  }

  function PublicFunction_queryFeature_gotoFeature( queryStr, featureLayer, view)
  {
    PublicFunction_UI_Block('#viewDiv', 'fas fa-map', 'Đang tải bản đồ...');
    featureLayer.queryFeatures({
            where: queryStr,
            outSpatialReference : 102100,
            returnGeometry: true
          }).then((results) => {
            if (results.features.length > 0) 
            {
              luu_lat_long_center_feature_to_localStorage(results.features[0].geometry.extent.center.latitude,
                                                          results.features[0].geometry.extent.center.longitude);
              PublicFunction_goToFeature(results.features[0].geometry,view);
            }
          }).then(function(){
            PublicFunction_UI_UnBlock('#viewDiv');
          });
    
  }

  function luu_lat_long_center_feature_to_localStorage(lat, long)
  {
    localStorage.setItem('lat', lat);
    localStorage.setItem('long',long);
  }

  function PublicFunction_HightLight_Feature(highlightSelect, view, OBJECTID)
  {
    view.whenLayerView().then((layerView) => {
      highlightSelect = layerView.highlight(
        OBJECTID
      );
    });
  }

  
  function PublicFunction_creat_CustomPopup(popupContent, title, action, view, location)
  {

    view.popup.open({
      title: title, 
      content: popupContent, 
      location: location,
      actions:[action]
    });
  }

  function PublicFunction_Convert_geom_to_array(geom)
  {
    var PolygonType = geom.slice(0,5);
    var Array_Polygon;
    if(PolygonType == 'MULTI')
    {
      Array_Polygon = Multipolygon_to_Array(geom);
    }
    else
    {
      Array_Polygon = Polygon_to_Array(geom);
    }
    return Array_Polygon;
  }

  function Polygon_to_Array(geom)
  {
    var b = geom.slice(10,geom.length-2)
    var c = b.split(', ')
    for(i=0;i<c.length;i++)
    {
      c[i] = c[i].split(' ')
    }
  
    return c;
  }

  function Multipolygon_to_Array(geom)
  {
    var b = geom.slice(16,geom.length-3)	
		var c = b.split(')), ((')
	
		c.forEach(function(valueC, index){
			c[index] = valueC.split(', ');
			c[index].forEach(function(valueC2, index2){
				c[index][index2] = valueC2.split(' ');
			})
		})

    return c;
  }

  function PublicFunction_get_VN2000()
  {
    return `PROJCS["TIENGIANG_VN2000",GEOGCS["GCS_VN_2000",DATUM["D_Vietnam_2000",SPHEROID["WGS_1984",6378137.0,298.257223563]],
            PRIMEM["Greenwich",0.0],UNIT["Degree",0.0174532925199433],
            METADATA["Vietnam - onshore",103.8,8.45,109.6,23.39,0.0,0.0174532925199433,0.0,3328]],
            PROJECTION["Transverse_Mercator"],PARAMETER["False_Easting",500000.0],PARAMETER["False_Northing",0.0],
            PARAMETER["Central_Meridian",105.75],PARAMETER["Scale_Factor",0.9999],PARAMETER["Latitude_Of_Origin",0.0],UNIT["Meter",1.0]]`;
  }

  function PublicFunction_get_colorArray()
  {
    return ['#ff6459','#ff8b59','#ffaf59','#ffca59',
            '#ffe959','#f4ff59','#d3ff59','#afff59',
            '#7aff59','#49d128','#2af599','#2af5c6',
            '#2adaf5','#2a96f5','#132dd6','#7922e3',
            '#b922e3','#e322dd','#e322a9','#e32269'];

  }

  function PublicFunction_Create_Polugon_Graphic(Graphic,color,rings, spatial)
  {
    polylineGraphic = new Graphic({
      geometry:
        {
          type: "polygon",
          rings:rings,
          spatialReference:spatial
        },
        symbol: {
          type: "simple-fill", // autocasts as new SimpleFillSymbol()
          color: color,
          outline: {
            // autocasts as new SimpleLineSymbol()
            color: [163, 122, 10],
            width: 2
          }},
      });
    return polylineGraphic;
  }

  function PublicFunction_HighLight_Feature(THUADATSHAPE, SUDUNGDAT, Graphic, view)
  {
    let polylineGraphic;
    var rings;
    
    var color = PublicFunction_get_colorArray();
    var spatial = PublicFunction_get_VN2000();

    rings = PublicFunction_Convert_geom_to_array(THUADATSHAPE);
    polylineGraphic = PublicFunction_Create_Polugon_Graphic(Graphic,`#d4d2d2`,rings, spatial);
    view.graphics.add(polylineGraphic);

    $.each(SUDUNGDAT,function(index, item){
        
        rings = PublicFunction_Convert_geom_to_array(item.SUDUNGDATSHAPE);
        polylineGraphic = PublicFunction_Create_Polugon_Graphic(Graphic,color[index],rings, spatial);
        view.graphics.add(polylineGraphic);
    })
  }  
  
  function PublicFunction_UI_Block(IdDivBlock, fontAwsome, message)
  {
    $(IdDivBlock).block({ 
      message: ` <i style="font-size:30px; color:#f0f5ff;" class="`+fontAwsome+`"></i><b style="margin-left:10px;font-size:30px; color:#f0f5ff;">`+message+`</b>`, 
      css: { border: 'none',
              backgroundColor: 'transparent' } 
    }); 
  }
  function PublicFunction_UI_UnBlock(IdDivBlock)
  {
    $(IdDivBlock).unblock(); 
  }

  


  