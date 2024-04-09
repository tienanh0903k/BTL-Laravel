<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        {{-- href="{{ route('dashboard') }}" --}}
      <a class="nav-link" >
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('products') }}">
        {{-- href="{{ route('products') }}" --}}
        <i class="fa-solid fa-shirt"></i>
        <span>Sản phẩm</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('products') }}">
        {{-- href="{{ route('products') }}" --}}
        <i class="fa-solid fa-list"></i>
        <span>Danh mục</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('suppiler.index') }}">
        <i class="fa-solid fa-truck"></i>
        <span>Nhà cung cấp</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('purchaseorders.index') }}">
        <i class="fa-solid fa-file-import"></i>
        <span>Hóa đơn nhập</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('suppiler.index') }}">
        <i class="fa-solid fa-file-invoice"></i>
        <span>Đơn hàng</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('suppiler.index') }}">
        <i class="fa-solid fa-user"></i>
        <span>Tài khoản</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


  </ul>
