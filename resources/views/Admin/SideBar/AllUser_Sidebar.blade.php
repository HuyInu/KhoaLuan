<li class="nav-item">
    <a data-toggle="collapse" href="#map">
        <i class="fas fa-map"></i>
        <p>Bản đồ</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="map">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route('ban-do-quy-hoach')}}">
                    <span class="sub-item">Tra cứu thông tin quy hoạch</span>
                </a>
            </li>
            <li>
                <a href="{{route('ban-do-ha-tang-ky-thuat')}}">
                    <span class="sub-item">Tra cứu dữ liệu hạ tầng kỹ thuật</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a href="{{route('duAnQuyHoach')}}">
        <i class="fas fa-desktop"></i>
        <p>Dự án quy hoạch</p>
    </a>
</li>