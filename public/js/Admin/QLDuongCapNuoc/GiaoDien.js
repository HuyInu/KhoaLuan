function GiaoDien_LoadDataToForm(DuongKinh, ChieuDai,LoaiOngCapNuoc, DAQH, OBJECTID)
{
    $('#DuongKinh').val(DuongKinh.replace(".", ","));
  $('#ChieuDai').val(ChieuDai.replace(".", ","));
  $('#LoaiOngCapNuoc').val(LoaiOngCapNuoc);
  $('#DAQH_DuongCapNuoc').val(DAQH);
  $('#OBJECTID_DuongCapNuoc').html(OBJECTID);

    openModal('#Edit_DuongCapNuoc_Modal');
}