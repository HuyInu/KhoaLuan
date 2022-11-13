function GiaoDien_LoadDataToForm(TenNhaMayNuoc, CongSuat, DAQH, OBJECTID)
{
    $('#TenNhaMayNuoc').val(TenNhaMayNuoc);
    $('#CongSuat').val(CongSuat);
    $('#DAQH_NhaMayNuoc').val(DAQH);
    $('#OBJECTID_NhaMayNuoc').html(OBJECTID);

    openModal('#Edit_NhaMayNuoc_Modal');
}