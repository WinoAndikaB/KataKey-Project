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
                                if ($fotoProfil && file_exists(public_path('fotoProfil/' . $fotoProfil))) {
                                ?>
                                <img src="{{ asset('fotoProfil/' . $fotoProfil) }}" alt="User's Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
                                <?php
                                } else {
                                ?>
                                <img src="{{ asset('https://powerusers.microsoft.com/t5/image/serverpage/image-id/98171iCC9A58CAF1C9B5B9/image-size/large/is-moderation-mode/true?v=v2&px=999') }}" alt="User's Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
                                <?php
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
                <h6 style="color: orange; font-Helvetica : Helvetica ;">No Articles Saved</h6>
                <h4 style="font-Helvetica : 'Your Cool Font';">Tidak Ada Artikel Yang Tersimpan</h4>
            </div>
          @else
          @foreach($savedArtikels as $item)
          <div class="row" style="text-align: justify">
            <div class="col-lg-3 col-md-4 col-sm-12" data-aos="fade-right" data-aos-delay="200">
                <div class="d-flex justify-content-center">
                  <img src="{{ asset('gambarArtikel/'.$item->artikel->gambarArtikel) }}" class="media-left" style="width: 400; height: 250;">
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12" data-aos="fade-left" data-aos-delay="200">
              <a href="{{ route('detail.artikel', ['id' => $item->artikel->id]) }}" style="text-decoration: none;">
                <h4 class="article-title" onclick="selectText(this)" style="text-align: left;">{{ $item->artikel->judulArtikel}}</h4>
              </a>                   
              <span class="d-flex"><b>{{ $item->artikel->penulis }} • 
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
                <br>
              </b></span>
              <p>{!! substr(strip_tags($item->artikel->deskripsi), 0, 400) . (strlen(strip_tags($item->artikel->deskripsi)) > 400 ? '...' : '') !!}</p>
              </b></span>
        
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