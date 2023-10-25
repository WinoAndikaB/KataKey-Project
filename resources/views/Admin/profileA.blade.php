<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets2/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets2/img/lg1.png">
  <title>
    Form Tambah Artikel | GSG PROJECT
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets2/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets2/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets2/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets2/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets2/img/lg1.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">GSG PROJECT</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/profileAdmin">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-badge text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/artikelAdmin">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Artikel</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pengguna">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengguna</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/ulasans">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-paper-diploma text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Ulasan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
       
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profil</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Profil</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="#" class="nav-link text-white font-weight-bold px-0">
                <i><img src="{{ asset('fotoProfil/' . Auth::user()->fotoProfil) }}" alt="User's Profile Picture" width="50" height="50" style="border-radius: 50%; overflow: hidden;"></i>
                <span class="d-sm-inline d-none">{{Auth::user()->name}}</span> |
                <i class="ni ni-button-power"></i>
                <a href="/logout" class="d-sm-inline d-none text-white text-bold"> Logout
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              
              <div class="container">
                <div class="row">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="title">Edit Profile</h5>
                          </div>
                          <div class="card-body">
                            <form method="POST" action="{{ route('updateAdmin', ['id' => Auth::user()->id]) }}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                                    <div class="form-group">
                                        <label>Role</label>
                                        <input type="text" class="form-control" disabled="" name="role" value="{{ Auth::user()->role }}">
                                    </div>
                
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" disabled="" name="username" value="{{ Auth::user()->username }}">
                                    </div>
                
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" disabled="" name="email" value="{{ Auth::user()->email }}">
                                    </div>
        
                                    <div class="form-group">
                                      <label>Foto Profil</label>
                                      <input type="file" class="form-control" name="fotoProfil">
                                  </div>
                
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat" value="{{ Auth::user()->alamat }}">
                                    </div>
                
                                    <div class="form-group">
                                      <label>Instagram</label><br>
                                      <label>Format Penulisan : https://www.instagram.com/goodgamestoreid/</label>
                                      <input type="text" class="form-control" name="instagram" value="{{ Auth::user()->instagram }}" pattern="https?://(www\.)?instagram\.com/.+">
                                  </div>
                                  
                                  <div class="form-group">
                                      <label>Facebook</label><br>
                                      <label>Format Penulisan : https://www.facebook.com/goodgamestoreid/</label>
                                      <input type="text" class="form-control" name="facebook" value="{{ Auth::user()->facebook }}" pattern="https?://(www\.)?facebook\.com/.+">
                                  </div>                  
                
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="4" class="form-control" name="aboutme">{{ Auth::user()->aboutme}}</textarea>
                                    </div>
                
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                      <a href="/dashboard" class="btn btn-info">Kembali</a>
                                      </form>
                                  </div>
                              </div>
                          </div>
                
                          <div class="col-md-4">
                            <div class="card card-user">
                              <div class="card-body text-center">
                                <div class="author">
                                  <a href="#">
                                    <img src="{{ asset('fotoProfil/' . Auth::user()->fotoProfil) }}" alt="User's Profile Picture" width="365" height="250">
                                    <br>
                                    <br>
                                    <br>
                                    <h5 class="title">{{Auth::user()->name}}</h5>
                                    <span>{{Auth::user()->username}}</span>
                                    <p>{{Auth::user()->email}}</p>
                                  </a>
                                </div>
                                <p class="description">
                                  {{Auth::user()->aboutme}}
                                </p>
                              </div>
                              <hr>
                              <div class="button-container text-center">
                                <a href="{{Auth::user()->facebook}}" class="btn btn-neutral btn-icon btn-round btn-lg">
                                  <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="{{Auth::user()->instagram}}" class="btn btn-neutral btn-icon btn-round btn-lg">
                                  <i class="fab fa-instagram"></i> Instagram
                                </a>
                                <br>
                                <br>
                              </div>
                            </div>
                          </div>
                          
                          </div>
                        </div>

          </div>
        </div>
      </div>
    </div>
  </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">

          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets2/js/core/popper.min.js"></script>
  <script src="../assets2/js/core/bootstrap.min.js"></script>
  <script src="../assets2/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets2/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets2/js/plugins/chartjs.min.js"></script>
 
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets2/js/argon-dashboard.min.js?v=2.0.4"></script>

  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    </body>
</html>