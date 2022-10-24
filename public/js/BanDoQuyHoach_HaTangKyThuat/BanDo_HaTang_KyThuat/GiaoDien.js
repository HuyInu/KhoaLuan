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
