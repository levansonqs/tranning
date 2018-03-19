
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php  $avatar ='/images/userDefault.png'; ?>
        <img src="{{ $avatar }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="activ"><a href="{{ route('admin.index.index') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>    
      <li><a href="{{ route('admin.index.index') }}"><i class="far fa-list-alt"></i> <span>Slider</span></a></li>
      <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-user"></i> <span>Thành viên</span></a></li>
      <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-tag"></i> <span>Danh mục</span></a></li>
      <li><a href="{{ route('admin.product.index') }}"><i class="fab fa-product-hunt"></i> <span>Sản phẩm</span></a></li>
      <li><a href="{{ route('admin.order.index') }}"><i class="fas fa-clipboard-list"></i> <span>Đơn hàng</span></a></li>
      <li><a href="{{ route('admin.orderdetail.index') }}"><i class="fas fa-clipboard-list"></i> <span>Chi tiết đơn hàng</span></a></li>
      <li><a href="{{ route('shop.index.index') }}"><i class="fas fa-cart-plus""></i> <span>Shop</span></a></li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>