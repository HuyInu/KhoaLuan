$("#basemap").on("click",function(){
    show_menu_content(baseMap,layerList,legend);
})

$("#layerlist").on("click",function(){
    show_menu_content(layerList,baseMap,legend);
})

$("#infor").on("click",function(){
    show_menu_content(legend,baseMap,layerList);
})

/*$("#select-DAQH").on("change",function(){
    console.log($(this).val());
})*/