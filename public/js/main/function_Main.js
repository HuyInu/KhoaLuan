function show_error_validate_message_function_Main(groupName,message,inputName)
{
    if($(groupName).find('span').length)
    {
        const group = $(groupName).find('span');
        group.html(message)
        group.attr("style", "display: block;");
    }
    else
    {
        $(groupName).append( '<span  for="'+inputName+'" class="error invalid-feedback" style="display: block;">'+message+'</span>');
    }
}

function remove_error_validate_message_function_Main(groupName)
{
    if($(groupName).find('span').length)
    {
        $(groupName).find('span').remove();
    }
}