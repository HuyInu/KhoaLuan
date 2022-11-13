function GiaoDien_contentPopup_DuongDayDien(LoaiDuongDayDien, Ten,TenDuAnQuyHoach)
{
  return `<span class = "headPopup" >Loại đường dây điện: </span> <span class = "contenPopup" >${LoaiDuongDayDien}</span></br>
        <span class = "headPopup" >Tên đường dây điện: </span> <span class = "contenPopup" >${Ten}</span></br>
        <span class = "headPopup" >Thuộc dự án: </span> <span class = "contenPopup" >${TenDuAnQuyHoach}</span></br>`
}

function GiaoDien_contentPopup_DuongOngNuoc(LoaiOngNuoc,TenDuAnQuyHoach, DuongKinh, ChieuDai)
{
  return `<span class = "headPopup" >Loại ống nước: </span> <span class = "contenPopup" >${LoaiOngNuoc}</span></br>
        <span class = "headPopup" >Đường kính: </span> <span class = "contenPopup" >${DuongKinh}</span></br>
        <span class = "headPopup" >Chiều dài: </span> <span class = "contenPopup" >${ChieuDai}</span></br>
        <span class = "headPopup" >Thuộc dự án: </span> <span class = "contenPopup" >${TenDuAnQuyHoach}</span></br>`
}

function GiaoDien_contentPopup_TramBienAp(TenLoaiTramBienAp,TenDuAnQuyHoach, Ten)
{
  return `<span class = "headPopup" >Tên đối tượng: </span> <span class = "contenPopup" >${Ten}</span></br>
        <span class = "headPopup" >Loại trạm: </span> <span class = "contenPopup" >${TenLoaiTramBienAp}</span></br>
        <span class = "headPopup" >Thuộc dự án: </span> <span class = "contenPopup" >${TenDuAnQuyHoach}</span></br>`
}

function GiaoDien_contentPopup_NhaMayNuoc(CongSuat,TenDuAnQuyHoach, Ten)
{
  return `<span class = "headPopup" >Tên đối tượng: </span> <span class = "contenPopup" >${Ten}</span></br>
        <span class = "headPopup" >Công suất: </span> <span class = "contenPopup" >${CongSuat}</span></br>
        <span class = "headPopup" >Thuộc dự án: </span> <span class = "contenPopup" >${TenDuAnQuyHoach}</span></br>`
}

function GiaoDien_Load_DuongDayDien_To_Modal(TenDuongDayDien, LoaiDuongDien,DAQH, OBJECTID)
{
  $('#TenDuongDayDien').val(TenDuongDayDien);
  $('#LoaiDuongDien').val(LoaiDuongDien);
  $('#DAQH_DuongDayDien').val(DAQH);
  $('#OBJECTID_DuongDayDien').html(OBJECTID);
}

function GiaoDien_Load_TramBienAp_To_Modal(TenTramBienAp, LoaiTramBienAp,DAQH, OBJECTID)
{
  $('#TenTramBienAp').val(TenTramBienAp);
  $('#LoaiTramBienAp').val(LoaiTramBienAp);
  $('#DAQH_TramBienAp').val(DAQH);
  $('#OBJECTID_TramBienAp').html(OBJECTID);
}

function GiaoDien_Load_DuongCapNuoc_To_Modal(DuongKinh, ChieuDai,LoaiOngCapNuoc, DAQH, OBJECTID)
{
  $('#DuongKinh').val(DuongKinh);
  $('#ChieuDai').val(ChieuDai);
  $('#LoaiOngCapNuoc').val(LoaiOngCapNuoc);
  $('#DAQH_DuongCapNuoc').val(DAQH);
  $('#OBJECTID_DuongCapNuoc').html(OBJECTID);
}

function GiaoDien_Load_NhaMayNuoc_To_Modal(TenNhaMayNuoc, CongSuat, DAQH, OBJECTID)
{
  $('#TenNhaMayNuoc').val(TenNhaMayNuoc);
  $('#CongSuat').val(CongSuat);
  $('#DAQH_NhaMayNuoc').val(DAQH);
  $('#OBJECTID_NhaMayNuoc').html(OBJECTID);
}

function GiaoDien_Show_Edit_DuongDayDien_Modal()
{
  openModal('#Edit_DuongDayDien_Modal');
}

function GiaoDien_Show_Edit_TramBienAp_Modal()
{
  openModal('#Edit_TramBienAp_Modal');
}

function GiaoDien_Show_Edit_DuongCapNuoc_Modal()
{
  openModal('#Edit_DuongCapNuoc_Modal');
}

function GiaoDien_Show_Edit_NhaMayNuoc_Modal()
{
  openModal('#Edit_NhaMayNuoc_Modal');
}
