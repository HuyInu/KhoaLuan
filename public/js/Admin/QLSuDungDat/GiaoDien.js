function GiaoDien_LoadDataToForm(TenLoaiDatTheoDA, DienTich, HeSoSuDungDat, TangCaoXayDung, MaDuAnQuyHoach, MaLoaiDatQHXD, MatDoXayDung)
{
    $('#TenLoaiDatTheoDA').val(TenLoaiDatTheoDA);
    $('#DienTich').val((DienTich ) ? DienTich.replace(".", ",") : '');
    $('#HeSoSuDungDat').val((HeSoSuDungDat ) ? HeSoSuDungDat.replace(".", ",") : '');
    $('#TangCaoXayDung').val((TangCaoXayDung ) ? TangCaoXayDung : '');
    $('#MaDuAnQuyHoach').val(MaDuAnQuyHoach);
    $('#MaLoaiDatQHXD').val(MaLoaiDatQHXD);
    $('#MatDoXayDung').val((MatDoXayDung ) ? MatDoXayDung : '');

    openModal('#EditModal');
}