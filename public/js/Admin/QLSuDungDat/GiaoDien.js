function GiaoDien_LoadDataToForm(TenLoaiDatTheoDA, DienTich, HeSoSuDungDat, TangCaoXayDung, MaDuAnQuyHoach, MaLoaiDatQHXD, MatDoXayDung)
{
    $('#TenLoaiDatTheoDA').val(TenLoaiDatTheoDA);
    $('#DienTich').val(DienTich);
    $('#HeSoSuDungDat').val(HeSoSuDungDat);
    $('#TangCaoXayDung').val(TangCaoXayDung);
    $('#MaDuAnQuyHoach').val(MaDuAnQuyHoach);
    $('#MaLoaiDatQHXD').val(MaLoaiDatQHXD);
    $('#MatDoXayDung').val(MatDoXayDung);

    openModal('#EditModal');
}