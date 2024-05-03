@extends('Main.layout.homeStyle')

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets2/img/lg1.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets2/img/lg1.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <title>Artikel Tersimpan - Katakey</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-574-mexant.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

    <link href="{{ asset('aset1/css/media_query.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('aset1/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('aset1/css/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('aset1/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('aset1/css/style_1.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="{{ asset('aset1/js/modernizr-3.5.0.min.js')}}"></script>
    
<!------------------------------------------------------------------------------------ Style Area ------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------ Style Area ------------------------------------------------------------------------------------------------>
       
    <style>
    .animated-button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      transition: background-color 0.3s;
      cursor: pointer;
      margin: 5px;
      font-size: 16px;
    }

    .animated-button:hover {
      background-color: #0056b3;
    }

    /* Additional styling for the second button */
    .animated-button:nth-of-type(2) {
      background-color: #ff6600;
    }

    .animated-button:nth-of-type(2):hover {
      background-color: #ff4500;
    }
    </style>
    <style>
      .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: hidden; /* Tidak dapat di-scroll */
      }
  
      .modal-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #888;
        width: 20%;
        height: 30%; /* Mengatur tinggi modal menjadi 60% */
        text-align: center;
      }
  
      .close {
        color: #888;
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
      }
  
      #confirm-button, #cancel-button {
        padding: 10px 20px;
        margin: 25px;
        cursor: pointer;
      }
      
                /* DROP DOWN AREA */
  .dropdown:hover .dropdown-menu,
  .dropdown:focus-within .dropdown-menu {
      display: block;
  }

  .dropdown-menu {
      display: none;
}

.dropdown-menu {
    display: none;
    opacity: 0;
    transition: opacity 0.3s ease; /* menambahkan transisi */
}

.dropdown-menu.show {
    display: block;
    opacity: 1;
}
  </style>
      <style>
        /* CSS styles */
        .article-title {
            color: black;
            text-decoration: none; /* Menghilangkan garis bawah */
            font-weight: bold; /* Bold text */
            position: relative; /* Memberikan posisi relatif */
        }
        .article-title::selection {
            color: white; /* Warna teks saat dipilih */
            background-color: #007bff; /* Warna latar belakang saat teks dipilih */
        }
        .article-title:hover {
            color: #ff6347; /* Warna teks saat kursor berada di atas judul artikel */
            cursor: pointer; /* Kursor pointer saat di atas judul artikel */
        }
        .article-title:hover::after {
            content: ""; /* Membuat elemen pseudo */
            position: absolute; /* Memberikan posisi absolut */
            bottom: -2px; /* Jarak dari bawah */
            left: 0; /* Posisi dari kiri */
            width: 100%; /* Lebar sesuai dengan judul artikel */
            background-color: #ff6347; /* Warna garis saat kursor berada di atas judul artikel */
        }
        .article-title span {
            text-decoration: none; /* Menghilangkan garis bawah */
        }
      </style>

<style>
  /* Notificaton */
  .scrollable-menu {
  max-height: 600px; /* Set the max height you want */
  overflow-y: auto; /* Enable vertical scrolling */
}
</style>
</head>

<!------------------------------------------------------------------------------------ Body Area ------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------ Body Area ------------------------------------------------------------------------------------------------>
   
<body>
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky" style="text-align: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
              <nav class="main-nav">
                <ul class="nav">
                    <li class="scroll-to-section"><a href="/home">Home</a></li>
                    <li class="scroll-to-section"><a href="/home">Artikel</a></li>
                    <li class="scroll-to-section"><a href="/Video">Video</a></li>
                    <li class="scroll-to-section"><a href="/kategori">Kategori</a></li>
                    <li class="scroll-to-section"><a href="/ulasan">Ulasan</a></li>
                    <li class="scroll-to-section"><a href="/about">Tentang</a></li>
                    <li>
                      <div class="dropdown">
                        <a href="#" class="nav-link text-white font-weight-bold px-0 d-flex align-items-center dropdown-toggle" role="button" id="savedArticlesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div class="profile-picture" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; margin-right: 10px;">
                              <?php
                              $fotoProfil = Auth::user()->fotoProfil;
                              if ($fotoProfil) {
                                  if (filter_var($fotoProfil, FILTER_VALIDATE_URL)) {
                                      // Jika fotoProfil adalah URL, gunakan langsung URL tersebut
                                      echo '<img src="' . $fotoProfil . '" alt="User\'s Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">';
                                  } else {
                                      // Jika fotoProfil adalah nama file, cek apakah file tersebut ada
                                      $pathToFile = public_path('fotoProfil/' . $fotoProfil);
                                      if (file_exists($pathToFile)) {
                                          echo '<img src="' . asset('fotoProfil/' . $fotoProfil) . '" alt="User\'s Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">';
                                      } else {
                                          // Jika file tidak ada, tampilkan foto default
                                          echo '<img src="' . asset('https://powerusers.microsoft.com/t5/image/serverpage/image-id/98171iCC9A58CAF1C9B5B9/image-size/large/is-moderation-mode/true?v=v2&px=999') . '" alt="User\'s Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">';
                                      }
                                  }
                              } else {
                                  // Jika fotoProfil kosong, tampilkan foto default
                                  echo '<img src="' . asset('https://powerusers.microsoft.com/t5/image/serverpage/image-id/98171iCC9A58CAF1C9B5B9/image-size/large/is-moderation-mode/true?v=v2&px=999') . '" alt="User\'s Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">';
                              }
                          ?>
                            </div>
                    
                            <span class="d-sm-inline d-none">
                                <?php
                                $fullName = Auth::user()->name;
                                $words = explode(' ', $fullName);
                    
                                // Ambil dua kata pertama dan dua kata terakhir dari nama pengguna
                                $firstTwoWords = implode(' ', array_slice($words, 0, 1));
                                $lastTwoWords = implode(' ', array_slice($words, -1, 2));
                    
                                echo $firstTwoWords . ' ' . $lastTwoWords;
                                ?>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="savedArticlesDropdown">
                            <a class="dropdown-item" href="/profileUser"><i class="fas fa-user"></i> Profil Anda</a>
                            <a class="dropdown-item" href="/simpanArtikelView"><i class="fas fa-bookmark"></i> Artikel Tersimpan</a>
                            <a class="dropdown-item" href="/simpanVideoView"><i class="fas fa-video"></i> Video Tersimpan</a>
                        </div>
                    </div>
                  </li>
                  <div class="dropdown">
                    <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell" style="color: white;"></i> <span class="badge badge-pill badge-primary">{{ $jumlahData }}</span>
                    </button>
                    
                    <div class="dropdown-menu dropdown-menu-wide scrollable-menu" aria-labelledby="dropdownMenuButton" style="min-width: 550px;">
                      <h6 class="container-title" style="margin: 10px 0; text-align: center;"><i class="fas fa-bell"></i> Notifikasi</h6>
                      <hr>
                      
                      <div class="row" style="display: flex; flex-direction: column; align-items: stretch;">
                          @if($isFollowingAuthor && $jumlahData > 0)
                              @foreach($notifArtikel as $item)
                                  <div class="col-md-12 mb-3" style="display: flex;">
                                      <a class="dropdown-item d-flex" href="{{ route('detail.artikel', ['id' => $item->id]) }}" style="display: flex;">
                                          <img src="{{ !empty($item->gambarArtikel) && filter_var($item->gambarArtikel, FILTER_VALIDATE_URL) ? $item->gambarArtikel : asset('gambarArtikel/'.$item->gambarArtikel) }}" class="media-left" style="max-width: 120px; height: 80px;">
                                          <div class="media-body ml-3" style="align-self: center;">
                                              <h6 class="notification-title mb-1" title="{{ $item->judulArtikel }}"> {{ $item->penulis }} mengupload: <br>
                                                  <?php
                                                  $judul = $item->judulArtikel;
                                                  $length = 35; // Panjang maksimum sebelum perlu di-break
                                              
                                                  // Jika judul lebih panjang dari panjang maksimum
                                                  if (strlen($judul) > $length) {
                                                      $chunks = explode(" ", $judul);
                                                      $output = '';
                                                      $lineLength = 0;
                                              
                                                      foreach ($chunks as $chunk) {
                                                          // Jika panjang baris lebih besar dari panjang maksimum, tambahkan line break
                                                          if ($lineLength + strlen($chunk) > $length) {
                                                              $output .= "<br>";
                                                              $lineLength = 0;
                                                          }
                                                          $output .= $chunk . " ";
                                                          $lineLength += strlen($chunk) + 1; // Ditambah satu untuk spasi
                                                      }
                                              
                                                      echo rtrim($output); // Menghilangkan spasi ekstra di akhir
                                                  } else {
                                                      echo $judul;
                                                  }
                                                  ?>
                                              </h6>
                                              
                                              <p class="notification-time mb-0">{{ $item->created_at->format('d F Y') }} | {{ $item->created_at->diffForHumans() }}</p>
                                          </div>
                                      </a>
                                  </div>
                              @endforeach
                          @else
                              <div class="col-md-12" style="align-self: center;">
                                  <p class="dropdown-item">Tidak ada notifikasi saat ini.</p>
                              </div>
                          @endif
                      </div>
                  </div> 
                </div>
                       
                    <li class="scroll-to-section">
                      <a href="#" class="d-sm-inline d-none text-white text-bold" id="logout-link" onclick="openModal()"> Logout</a>
                    </li>
            </nav>
            </div>
        </div>
    </div>
</header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-text">
                    <h2>List Artikel Yang Tersimpan</h2>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- ***** Main Banner Area End ***** -->

  <div class="pd-top-80 pd-bottom-50" id="grid">
    <div class="container">

      <section class="about-us" id="about">
        <div class="container">
          <div class="row">
            <div>

              <br>

              @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @elseif(session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
              @endif
          
            <br>
            
            @if($savedArtikels->isEmpty())
            <div class="text-center">
                <img src="https://pic.onlinewebfonts.com/thumbnails/icons_195265.svg" alt="No Following" style="width: 150px; margin-bottom: 20px;">
                <p style="font-size: 1.2rem; color: #666; margin-bottom: 20px;">Anda belum menyimpan artikel apapun.</p>
                <a href="/home" style="background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 1rem; border-radius: 5px;">Temukan Artikel</a>
            </div>
        @else
            @foreach($savedArtikels as $item)
                <div class="row" style="text-align: justify">
                    <div class="col-lg-3 col-md-4 col-sm-12" data-aos="fade-right" data-aos-delay="200">
                        <div class="d-flex justify-content-center">
                          
                          @if(!empty($item->artikel->gambarArtikel) && filter_var($item->artikel->gambarArtikel, FILTER_VALIDATE_URL))
                              <a href="{{$item->artikel->gambarArtikel}}" data-lightbox="gambarArtikel" data-title="Deskripsi Gambar">
                                  <img src="{{$item->artikel->gambarArtikel}}" class="media-left" style="max-width: 400px; height: 250px; border-radius: 14px;">
                              </a>
                          @endif
                          
                          @if(!empty($item->artikel->file_path))
                              <a href="{{asset('gambarArtikel/'.$item->artikel->file_path)}}" data-lightbox="gambarArtikel" data-title="Deskripsi Gambar">
                                  <img src="{{asset('gambarArtikel/'.$item->artikel->file_path)}}" class="media-left" style="max-width: 400px; height: 250px; border-radius: 14px;">
                              </a>
                          @endif
                      
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12" data-aos="fade-left" data-aos-delay="200">
                        <a href="{{ route('detail.artikel', ['id' => $item->artikel->id]) }}" style="text-decoration: none;">
                            <h4 class="article-title" onclick="selectText(this)" style="text-align: left;">{{ $item->artikel->judulArtikel }}</h4>
                        </a>
                        <span class="d-flex">
                            <b>{{ $item->artikel->penulis }} • 
                            @php
                                $ulasanCreatedAt = \Carbon\Carbon::parse($item->created_at);
                                $sekarang = \Carbon\Carbon::now();
                                $selisihWaktu = $sekarang->diffInMinutes($ulasanCreatedAt);
                                if ($selisihWaktu < 60) {
                                    echo $selisihWaktu . ' Menit Lalu';
                                } elseif ($selisihWaktu < 1440) {
                                    echo floor($selisihWaktu / 60) . ' Jam Lalu';
                                } elseif ($selisihWaktu < 10080) {
                                    echo floor($selisihWaktu / 1440) . ' Hari Lalu';
                                } elseif ($selisihWaktu < 43200) {
                                    echo floor($selisihWaktu / 10080) . ' Minggu Lalu';
                                } elseif ($selisihWaktu < 525600) {
                                    echo floor($selisihWaktu / 43200) . ' Bulan Lalu';
                                } else {
                                    echo floor($selisihWaktu / 525600) . ' Tahun Lalu';
                                }
                            @endphp
                            <br></b>
                        </span>
                        <p>{!! substr(strip_tags($item->artikel->deskripsi), 0, 400) . (strlen(strip_tags($item->artikel->deskripsi)) > 400 ? '...' : '') !!}</p>
                        <p>Tags:
                            @php
                                $tags = explode(",", $item->artikel->tags);
                                foreach ($tags as $tag) {
                                    $trimmedTag = trim($tag);
                                    echo '<a href="' . route("TagsVideos", $trimmedTag) . '" class="fh5co_tagg">' . $trimmedTag . '</a>';
                                    echo ' ';
                                }
                            @endphp
                        </p>
                        <div style="float: right; color: rgba(165, 165, 165, 1);">
                            <p>
                                <a href="{{ route('simpan.deleteArtikel', ['id' => $item->id]) }}"><i class="fas fa-trash"></i></a>
                            </p>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        @endif
        

          </div>
        </div>
      </section>  
    </div>
</div>

<!------------------------------------------------------------------------------------ Modal Area ------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------ Modal Area ------------------------------------------------------------------------------------------------>
   
      <!-- Modal Logout -->
      <div id="logout-modal" class="modal">
        <div class="modal-content">
          <span class="close" id="close-button" onclick="closeModal()">&times;</span>
          <h2>Konfirmasi Logout</h2>
          <p>Apakah anda mau logout?</p>
          <div style="text-align: center;">
            <button style="width: 120px;" class="btn btn-primary" id="confirm-logout-button" onclick="confirmLogout(true)">Ya</button>
            <button style="width: 120px;" class="btn btn-danger" id="cancel-logout-button" onclick="confirmLogout(false)">Tidak</button>
          </div>
        </div>
      </div>

<!------------------------------------------------------------------------------------ Javascript Area ------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------ Javascript Area ------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------------------------------------- Javascript Dropdown ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Dropdown ------------------------------------------------------------------------------->

<script>
  document.addEventListener("DOMContentLoaded", function() {
      var dropdownMenu = document.querySelector('.dropdown-menu');

      // Saat mouse memasuki dropdown, tambahkan kelas 'show'
      dropdownMenu.addEventListener('mouseenter', function() {
          dropdownMenu.classList.add('show');
      });

      // Saat mouse meninggalkan dropdown, hapus kelas 'show'
      dropdownMenu.addEventListener('mouseleave', function() {
          dropdownMenu.classList.remove('show');
      });
  });
</script>

      <!--  logout Script -->
      <script>
        // JavaScript untuk modal logout
        function openModal() {
          const modal = document.getElementById('logout-modal');
          modal.style.display = 'block';
        }
      
        function closeModal() {
          const modal = document.getElementById('logout-modal');
          modal.style.display = 'none';
        }
      
        function confirmLogout(confirmed) {
          if (confirmed) {
            // Redirect ke URL logout yang sesuai (ganti URL ini dengan URL logout sebenarnya)
            window.location.href = '/logout';
          } else {
            // Tutup modal jika pengguna memilih "No"
            closeModal();
          }
        }
      
        // Tutup modal jika pengguna mengklik di luar modal
        window.addEventListener('click', (event) => {
          const modal = document.getElementById('logout-modal');
          if (event.target == modal) {
            modal.style.display = 'none';
          }
        });
      </script>

  </body>
</html>