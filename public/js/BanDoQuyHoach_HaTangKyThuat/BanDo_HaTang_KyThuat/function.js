function Function_sort_HaTangKyThuat_By_DAQH(Layer,layerAttribute, AttributeValue)
{
    if(AttributeValue != '0')
    {         
        Layer.definitionExpression = `${layerAttribute} = '${AttributeValue}'`; 
    }
    else
    {
        Layer.definitionExpression = '';
    }
}

function Function_queryFeatures_then_goto(Layer, layerAttribute, AttributeValue)
{
    var query = {
        where:`${layerAttribute} = '${AttributeValue}'`,
        outFields:['*'],
        returnGeometry:true,
    }

    var results = Layer.queryFeatures(query).then(function(response){
        return response.features;
    })
    return results;
    //return(Layer.queryFeatures(query));
}

function Function_Sort_HaTangKyThuat(index, layerArray, AttributeValue, featuresArray, view)
{   
    if(index == (layerArray.length -1))
    {
        view.goTo({
            target:featuresArray,
            zoom:15
        });
    }
    else
    {
        var promise = Function_queryFeatures_then_goto(layerArray[index].layer, layerArray[index].DAQHCollum, AttributeValue);
        index++;
        promise.then(function(features){
            featuresArray = featuresArray.concat(features);
            Function_Sort_HaTangKyThuat(index, layerArray, AttributeValue, featuresArray, view)
        });
    }
    
}