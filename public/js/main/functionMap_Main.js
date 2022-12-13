function FunctionMap_Main_sort_feature(Layer,layerAttribute, AttributeValue,view)
{
    if(AttributeValue != '0')
    {
        PublicFunction_UI_Block('#viewDiv', 'fas fa-map', 'Đang tải bản đồ...');

        var query = {
            where:`${layerAttribute} = '${AttributeValue}'`,
            outFields:['*'],
            returnGeometry:true,
        }
    
        Layer.definitionExpression = `${layerAttribute} = '${AttributeValue}'`;
        Layer.queryFeatures(query).then(function(response){
            console.log(response)
            view.goTo({
                target:response.features,
                zoom:18
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