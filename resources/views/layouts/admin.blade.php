<!DOCTYPE html>
<html lang="en">
  
<x-admin-head />


<body data-topbar="dark">

  <div id="layout-wrapper">

    <x-page-topbar />

    <!-- ========== Left Sidebar Start ========== -->
    <x-vertical-menu />

    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">

          @yield('content')
          
         

        </div>

      </div>


      <x-admin-footer/>

    </div>


    <!-- end main content-->

  </div>


  <x-script />

     {!! ToastMagic::scripts() !!} 
</body>

</html>