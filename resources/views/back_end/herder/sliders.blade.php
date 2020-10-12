
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="/back_end/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('trangchuadmin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Danh mục hãng </span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Chúc một ngày mới vui vẻ </h6>
                <a class="collapse-item" href="{{ route('them-hang-san-pham.create') }}">Thêm hãng</a>
                <a class="collapse-item" href="{{ route('them-hang-san-pham.index') }}">Danh sách hãng</a>
                <a class="collapse-item" href="{{ route('them-ten-muc-san-pham.create') }}">Thêm mục sản phẩm</a>
                <a class="collapse-item" href="{{ route('them-ten-muc-san-pham.index') }}">Danh sách mục sản phẩm</a>
                <a class="collapse-item" href="{{ route('themsp') }}">Tên sản phẩm</a>
               <a class="collapse-item" href="{{ route('list-sp') }}">Danh sách sản phẩm bán</a>


            </div>
        </div>
    </li>




    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Setting</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chúc một ngày mới vui vẻ</h6>
                <a class="collapse-item" href="/admin/Setting-thong-tin/1">Setting</a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Examples
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Đơn hàng</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chúc một ngày mới vui vẻ </h6>
                <a class="collapse-item errorsp" href="{{ route('sanphammua') }}"> sản phẩm khách hàng </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage1" aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lí user</span>
        </a>
        <div id="collapsePage1" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chúc một ngày mới vui vẻ</h6>

                  @can('create-user')
                     <a class="co llapse-item" href="{{  route('them-user-admin.create')  }}">Thêm user quản trị </a>
                   @endcan
                   @can('list-user')
                   <a class="collapse-item" href="{{ route('them-user-admin.index') }}">List user quản trị</a>

                   @endcan
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm2" aria-expanded="true" aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Quản lí quyền quản trị</span>
        </a>
        <div id="collapseForm2" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chúc một ngày mới vui vẻ </h6>

                <a class="collapse-item" href="/admin/them-nhom-quyen">Thêm nhóm quyền</a>
                <a class="collapse-item" href="{{ route('listquyen') }}">Danh sách quyền </a>

                <a class="collapse-item" href="{{ route('hienthitable')  }}">Nhóm quyền 1 table </a>

            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('loginadmin')  }}">
            <i class="fa fa-user"></i>
            <span> Đăng xuất</span>
        </a>
    </li>




</ul>
