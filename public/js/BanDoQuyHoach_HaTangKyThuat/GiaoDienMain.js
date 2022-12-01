function add_hide_class(cont)
{
    if(!cont.classList.contains("hide"))
    {
        cont.classList.add("hide");
    }
}

function hide_menu_content(cont1,cont2,cont3)
{
    add_hide_class(cont1);
    add_hide_class(cont2);
    add_hide_class(cont3);
    

}

function show_menu_content(seleteCont,closeCont1,closeCont2,closeCont3)
{
    if(seleteCont.classList.contains("hide"))
    {
        seleteCont.classList.remove("hide");

        hide_menu_content(closeCont1,closeCont2,closeCont3);
    }
    else
    {
        seleteCont.classList.add("hide");
    }
}

function GiaoDienMain_hide_ZoomDefautWidget()
{
    $('.esri-ui-top-left').html('');
}

function GiaoDienMain_remove_hideAttr_locateWidget()
{
    $('#locate').removeAttr("hidden");
    $('#locate').removeClass("esri-hidden");
}

function GiaoDienMain_Load_Data_To_Select(Data,valueField, textField, select)
{
    $(select).html('');
    $.each(Data, function(index,item){
        $(select).append(`<option value="`+item[valueField]+`">`+item[textField]+`</option>`)
    })
    
}

function GiaoDienMain_expandLayerList() {
    document.querySelectorAll('.esri-layer-list__child-toggle').forEach(function(node, index){
      $(node).attr("esri-layer-list__child-toggle--open");
    });

    document.querySelectorAll('.esri-layer-list__list').forEach(function(node, index){
      
        $(node).attr("aria-expanded","true");
        $(node).removeAttr('hidden');
      
    });
  }
