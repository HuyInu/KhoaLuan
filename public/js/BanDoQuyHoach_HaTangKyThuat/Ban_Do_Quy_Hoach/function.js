function Function_sort_SuDungDat_By_DAQH(subLayer,layerAttribute, AttributeValue,view)
{
    if(AttributeValue != '0')
    {
        var query = {
            where:`${layerAttribute} = '${AttributeValue}'`,
            outFields:['*'],
            returnGeometry:true,
        }
    
        subLayer.definitionExpression = `${layerAttribute} = '${AttributeValue}'`;
        subLayer.queryFeatures(query).then(function(response){
            
            view.goTo({
                target:response.features,
                zoom:18
            })
        })
    }
    else
    {
        subLayer.definitionExpression = '';
    }
}