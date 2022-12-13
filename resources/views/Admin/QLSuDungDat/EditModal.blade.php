<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head" style="color: white; background-color: #1269db;">
                <h5 class="modal-title">
                    <h2 id="modal_title" class="fw-mediumbold">
                    Sửa lô đất mã:</h2><h2 id="OBJECTID" class="fw-mediumbold"></h2> <p hidden id='rowID'></p>
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditForm" >
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Tên loại đất theo dự án*:</label>
                                <input type="text" class="form-control" id="TenLoaiDatTheoDA" name="TenLoaiDatTheoDA">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Diện tích*:</label>
                                <input type="text" class="form-control" id="DienTich" name="DienTich">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Hệ số sử dụng đất*:</label>
                                <input type="text" class="form-control" id="HeSoSuDungDat" name="HeSoSuDungDat" >
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Tầng cao xây dựng*:</label>
                                <input type="text" class="form-control" id="TangCaoXayDung" name="TangCaoXayDung" >
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Mật dộ xây dựng xây dựng*:</label>
                                <input type="text" class="form-control" id="MatDoXayDung" name="MatDoXayDung" >
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Dự án quy hoạch*:</label>
                                <select class="form-control" id="MaDuAnQuyHoach"  name="MaDuAnQuyHoach">
                                    <option value="">Chọn dự án quy hoạch</option>
                                    @foreach($DuAnQuyHoach_list as $item)
                                    <option value="{{$item['MaDuAn']}}">{{$item->TenDuAn}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Loại đất quy hoạch xây dựng*:</label>
                                <select class="form-control" id="MaLoaiDatQHXD"  name="MaLoaiDatQHXD">
                                    <option value="">Chọn loại đất QHXD</option>
                                    @foreach($DMLoaiDatQHXD_list as $item)
                                    <option value="{{$item['MaLoaiDat']}}">{{$item['TenLoaiDat']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="editRowButton" class="btn btn-primary">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    @csrf
                </form>
                <div id='viewDiv' style="height: 239px;width: 100%;" ></div>
            </div>
        </div>
    </div>
</div>