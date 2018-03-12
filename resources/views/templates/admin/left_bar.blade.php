
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
      <li class="activ"><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>    
      <li><a href=""><i class="fa fa-sliders"></i> <span>Slider</span></a></li>
       <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa  fa-th-large"></i> <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href=" {{ route('admin.category.index') }}"><i class="fa fa-tag"></i>Danh mục</a></li>
            <li><a href=""><i class="fa fa-book"></i>Sản phẩm</a></li>
          </ul>
        </li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>