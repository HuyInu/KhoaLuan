function add_hide_class(cont)
{
    if(!cont.classList.contains("hide"))
    {
        cont.classList.add("hide");
    }
}

function hide_menu_content(cont1,cont2)
{
    add_hide_class(cont1);
    add_hide_class(cont2);
    

}

function show_menu_content(seleteCont,closeCont1,closeCont2)
{
    if(seleteCont.classList.contains("hide"))
    {
        seleteCont.classList.remove("hide");

        hide_menu_content(closeCont1,closeCont2);
    }
    else
    {
        seleteCont.classList.add("hide");
    }
    
}