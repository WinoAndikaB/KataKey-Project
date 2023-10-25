@extends('Main.layout.homeStyle')

<title>Profil - GSG Project</title>

<header class="header-area header-sticky" style="text-align: center;">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-12">
              <nav class="main-nav d-flex align-items-center justify-content-between">
                  <ul class="nav">
                      <li class="scroll-to-section"><a href="/home" class="text-center">Home</a></li>
                      <li class="scroll-to-section"><a href="/home" class="text-center">Trending</a></li>
                      <li class="scroll-to-section"><a href="/home" class="text-center">Artikel</a></li>
                      <li class="scroll-to-section"><a href="/about" class="text-center">Tentang</a></li>
                  </ul>
                  <ul class="nav">
                      <li class="scroll-to-section">
                          <a href="/profileUser" class="nav-link text-white font-weight-bold px-0 d-flex align-items-center">
                              <div class="profile-picture">
                                <img src="{{ asset('fotoProfil/' . Auth::user()->fotoProfil) }}" alt="User's Profile Picture">
                              </div>
                              <span class="d-sm-inline d-none">{{Auth::user()->name}}</span>
                          </a>
                      </li>
                      <li class="scroll-to-section">
                          <a href="/logout" class="text-right">Logout</a>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
</header>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<body class="landing-page sidebar-collapse">
  <div class="wrapper">
    <div class="section section-about-us">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                      <h5 class="title">Edit Profile</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('updateUser', ['id' => Auth::user()->id]) }}" enctype="multipart/form-data">
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
                              <a href="/home" class="btn btn-info">Kembali</a>
                              </form>
                          </div>
                      </div>
                  </div>
        
                  <div class="col-md-4">
                    <div class="card card-user">
                      <div class="card-body text-center">
                        <div class="author">
                          <a href="#">
                            <img src="{{ asset('fotoProfil/' . Auth::user()->fotoProfil) }}" alt="User's Profile Picture">
                            <br>
                            <br>
                            <br>
                            <h5 class="title">{{Auth::user()->name}}</h5>
                            <span>{{Auth::user()->username}}</span>
                          </a>
                          <p class="description">
                            {{Auth::user()->email}}
                          </p>
                        </div>
                        <p class="description">
                          {{Auth::user()->bio}}
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
                      </div>
                    </div>
                  </div>
                  
                  </div>
                </div>
            </div>
            </body>