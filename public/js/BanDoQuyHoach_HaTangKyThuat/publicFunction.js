function PublicFunction_extendLayer(layer, Query, view)
  {
    layer.queryExtent(Query).then(function(results){
      view.goTo(results.extent);  // go to the extent of the results satisfying the query
    });
  }

  function PublicFunction_sort_SuDungDat_By_DAQH(layer,layerAttribute, AttributeValue,view)
  {
    const sublayer = layer.findSublayerById(0);
    console.log(sublayer);
    sublayer.definitionExpression = layerAttribute +"= '"+ AttributeValue+"'";
    view.goTo(sublayer.definitionExpression)
    /*if(AttributeValue != '0')
    {
      const query = new Query();
      query.where = layerAttribute+"= '"+AttributeValue+"'";
      query.returnGeometry = true;
      query.outFields = ["OBJECTID"];

      featureLayer.queryFeatures(query).then((results) => {

        if(results.features.length > 0)
        {
          const objectIds = [];

          $.each(results.features, function( index, value ) {
            objectIds.push(value.attributes.OBJECTID);
          });
          
          layerView.filter = {objectIds};
          PublicFunction_goToFeature(results.features[0].geometry,view)
        }
        else
        {
          layerView.filter = '';
        }
      });
    }
    else
    {
      layerView.filter = '';
    }*/
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
    featureLayer.queryFeatures({
            where: queryStr,
            //outFields: ["*"],
            returnGeometry: true
          }).then((results) => {
            console.log(results)
            if (results.features.length > 0) 
            {
              PublicFunction_goToFeature(results.features[0].geometry,view);
            }
          });
  }

  function PublicFunction_HightLight_Feature(highlightSelect, view, OBJECTID)
  {
    view.whenLayerView().then((layerView) => {
      highlightSelect = layerView.highlight(
        OBJECTID
      );
    });
  }

  
  function PublicFunction_creat_CustomPopup(popup, featureLayer, popupContent, title)
  {
    
    popup.title = title;
    popup.content = popupContent;
    featureLayer.popupTemplate = popup;
  }

  function PublicFunction_Convert_geom_to_array(geom)
  {
    
    var b = geom.slice(10,geom.length-2)
    var c = b.split(', ')
    for(i=0;i<c.length;i++)
    {
      c[i] = c[i].split(' ')
    }
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
    return ['#E35832','#FAE243','#32E36B','#EBD43F'];

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