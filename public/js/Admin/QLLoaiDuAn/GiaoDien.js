function GiaoDien_LoadDataToForm(MaLoaiDuAn, TenLoaiDuAn)
{
    $('#TenLoaiDuAn_Edit').val(TenLoaiDuAn);
    $('#MaLoaiDuAn_Edit').val(MaLoaiDuAn);

    openModal('#Edit_Modal');
}