var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 5000
  });

function toast_success(str) {
      Toast.fire({
        icon: 'success',
        title: str
      })
};

function toast_warning(str) {
  Toast.fire({
    icon: 'warning',
    title: str
  })
};

function toast_fail(str) {
  Toast.fire({
    icon: 'error',
    title: str
  })
};

function toast_ask_delete_thuaDat(idModal,content)
{
  $(idModal).find('div.modal-body p:first')
  .html(content).end()
  .modal('show');
}

function open_toast(idModal)
{
  $(idModal).modal('show');
}


function close_toast(idModal)
{
  $(idModal).modal('hide');
}

