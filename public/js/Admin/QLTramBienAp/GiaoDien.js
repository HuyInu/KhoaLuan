function GiaoDien_LoadDataToForm(TenTramBienAp, LoaiTramBienAp,DAQH, OBJECTID)
{
  $('#TenTramBienAp').val(TenTramBienAp);
  $('#LoaiTramBienAp').val(LoaiTramBienAp);
  $('#DAQH_TramBienAp').val(DAQH);
  $('#OBJECTID_TramBienAp').html(OBJECTID);

  openModal('#Edit_TramBienAp_Modal');
}