<!doctype html>
<html lang="en">
    <head>
        @include('includes.head')
        @section('post-css')
        @show
    </head>
    
    <body>
    <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Students Progress
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
        <div class="sidebar-wrapper">
            <ul class="nav"> 
                @yield('li1')
                    <a href="/">
                      <i class="nc-icon nc-bank"></i>
                      <p>Dashboard</p>
                    </a>
                </li>
                @yield('li2')
                    <a href="/students-details/search/students">
                      <i class="nc-icon nc-zoom-split"></i>
                      <p>Search</p>
                    </a>
                </li>
                @yield('li3')
                    <a href="/students-details/create">
                      <i class="nc-icon nc-simple-add"></i>
                      <p>Add New Records</p>
                    </a>
                </li>
                @yield('li4')
                    <a href="/students-details">
                      <i class="nc-icon nc-badge"></i>
                      <p>View All Records</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            @yield('title')
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
            
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">             
              <li class="nav-item">
                <a class="logout" href="{{ route('auth.logout')}}">Log Out</a> 
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          @yield('main-content')
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">            
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, Created by Suneth Senanayake.
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="/js/core/jquery.min.js"></script>
  <script src="/js/core/popper.min.js"></script>
  <script src="/js/core/bootstrap.min.js"></script>
  <script src="/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/js/plugins/chartjs.min.js"></script>
  <script src="/js/plugins/bootstrap-notify.js"></script>
  <script src="/js/paper-dashboard.min.js?v=2.0.1"></script>
  
  @section('post-js')
  @show
  
</body>
    
    
</html>
