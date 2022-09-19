function successAlert($message){
    swal($message, {
        icon : "success",
        buttons: {        			
            confirm: {
                className : 'btn btn-success'
            }
        },
    });
};

function errorAlert($message)
{
    swal($message, {
        icon : "error",
        buttons: {        			
            confirm: {
                className : 'btn btn-danger'
            }
        },
    });
}

function warningAlert($message)
{
    swal($message, {
        icon : "warning",
        buttons: {        			
            confirm: {
                className : 'btn btn-warning'
            }
        },
    });
}