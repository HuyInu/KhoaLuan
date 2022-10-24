$("#basemap").on("click",function(){
    show_menu_content(baseMap,layerList,legend,search);
})

$("#layerlist").on("click",function(){
    show_menu_content(layerList,baseMap,legend,search);
})

$("#infor").on("click",function(){
    show_menu_content(legend,baseMap,layerList,search);
})

$("#search").on("click",function(){
    show_menu_content(search,legend,baseMap,layerList);
})
/*$("#select-DAQH").on("change",function(){
    console.log($(this).val());
})*/