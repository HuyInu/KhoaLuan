<li class="nav-item">
    <a data-toggle="collapse" href="#user">
        <i class="fas fa-user-alt"></i>
        <p>Người dùng</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="user">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route('user')}}">
                    <span class="sub-item">Quản trị người dùng</span>
                </a>
            </li>
            <li>
                <a href="{{route('PhanQuyen')}}">
                    <span class="sub-item">Phân quyền người dùng</span>
                </a>
            </li>
        </ul>
    </div>
</li>