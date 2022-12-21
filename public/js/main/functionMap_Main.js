function FunctionMap_Main_sort_feature(Layer,layerAttribute, AttributeValue,view)
{
    if(AttributeValue != '0')
    {
        PublicFunction_UI_Block('#viewDiv', 'fas fa-map', 'Đang tải bản đồ...');

       /* var query = {
            where:`${layerAttribute} = '${AttributeValue}'`,
            outFields:['*'],
            returnGeometry:true,
        }*/

        Layer.definitionExpression = `${layerAttribute} = '${AttributeValue}'`;
        Layer.queryFeatures().then(function(response){
            view.goTo({
                target:response.features,
                extent:response.features[0].geometry.extent
            })
            PublicFunction_UI_UnBlock('#viewDiv');
        })
    }
    else
    {
        PublicFunction_UI_UnBlock('#viewDiv');
        Layer.definitionExpression = '';
    }
}