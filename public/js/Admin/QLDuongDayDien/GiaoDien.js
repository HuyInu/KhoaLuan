function GiaoDien_LoadDataToForm(TenDuongDayDien, LoaiDuongDien, DAQH, OBJECTID)
{
    $('#TenDuongDayDien').val(TenDuongDayDien);
    $('#LoaiDuongDien').val(LoaiDuongDien);
    $('#DAQH_DuongDayDien').val(DAQH);
    $('#OBJECTID_DuongDayDien').html(OBJECTID);

    openModal('#Edit_DuongDayDien_Modal');
}