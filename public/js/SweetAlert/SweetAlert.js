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


function deleteAlert(itemID, itemType, callback){
    swal({
        title: 'Bạn có chắc xóa '+itemType+' mã "'+itemID+'" ?',
        text: "Bạn sẽ không thể hoàn tác.",
        icon: 'warning',
        buttons:{
            confirm: {
                text : 'Xóa',
                className : 'btn btn-success'
            },
            cancel: {
                text : 'Quay lại',
                visible: true,
                className: 'btn btn-danger'
            }
        }
    }).then((confirmed) => {
        callback(confirmed);
    });
}