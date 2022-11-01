function GiaoDien_LoadDataToForm(MaLoaiQuyHoach, TenLoaiQuyHoach)
{
    $('#TenLoaiQuyHoach_Edit').val(TenLoaiQuyHoach);
    $('#MaLoaiQuyHoach_Edit').val(MaLoaiQuyHoach);

    openModal('#Edit_Modal');
}