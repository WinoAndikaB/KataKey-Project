@extends('Main.layout.homeStyle')

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="apple-touch-icon" sizes="76x76" href="../assets2/img/lg1.png">
    <link rel="icon" type="image/png" href="../assets2/img/lg1.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>
      @if(!empty($article))
          {{ $article->judulArtikel }} - Katakey
      @else
          -
      @endif
  </title>
  

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

<!-------------------------------------------------------------------------------------- Style Area ------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------- Style Area ------------------------------------------------------------------------------------------------------->

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
  </style>
  <!-- Modal Lapor Komentar -->
  <style>
    /* Tambahkan gaya CSS tambahan sesuai kebutuhan Anda */
    .body-lapor-komentar {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .modal-lapor-komentar  {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .modal-content-lapor-komentar  {
        text-align: center;
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
    .rating {
         font-size: 24px;
       }
  .gold-star {
     color: gold;
     font-size: 15px; /* Adjust the size as needed */
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
        .rating-penulis {
           font-size:55px;
           cursor: pointer;
         }
    
         .star {
           color: gray; /* Mengatur warna bintang awalnya menjadi gray */
           cursor: pointer;
         }
    
         .star.selected {
           color: gold; /* Mengatur warna bintang yang dipilih menjadi gold */
         }
    
         .rating-container {
             font-size: 36px; /* Atur ukuran teks rata-rata rating */
             margin: 20px; /* Atur margin untuk jarak dari teks sekitarnya */
           }
    
           .filled-star {
             color: gold; /* Warna bintang yang diisi */
           }
    </style>

      <!-- Drop Down Notif -->
      <style>
        /* Notificaton */
        .scrollable-menu {
        max-height: 600px; /* Set the max height you want */
        overflow-y: auto; /* Enable vertical scrolling */
    }
    
    </style>
    <style>
        #laporanModal .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        #laporanModal .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        #laporanModal .close:hover,
        #laporanModal .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #laporanModal textarea,
        #laporanModal input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        #laporanModal button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        #laporanModal button[type="submit"]:hover {
            background-color: #45a049;
        }
      </style>


  </head>

<!-------------------------------------------------------------------------------------- Body Area ------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------- Body Area ------------------------------------------------------------------------------------------------------->
 
<body>
  <header class="header-area header-sticky" style="text-align: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
              <nav class="main-nav">
                <ul class="nav">
                  <li style="margin-right: auto;">
                    <img src="{{ asset('assets2/img/katakey1.png') }}" alt="logo" style="width: 50px; height: auto;">
                  </li>
                    <li class="scroll-to-section"><a href="/home">Home</a></li>
                    <li class="scroll-to-section"><a href="/home" class="active">Artikel</a></li>
                    <li class="scroll-to-section"><a href="/Video" class="">Video</a></li>
                    <li class="scroll-to-section"><a href="/kategori">Kategori</a></li>
                    <li class="scroll-to-section"><a href="/ulasan">Ulasan</a></li>
                    <li class="scroll-to-section"><a href="/about" class="">Tentang</a></li>
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

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h2>Detail Artikel</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="what-we-do">
    <div class="container">
      <div class="row">
      
        <div class="col-md-8 animate-box" data-animate-effect="fadeInRight">
          <section>        
            <h1 style="color: rgba(47, 72, 88, 1); font-weight: bold;">{{ $article->judulArtikel }}</h1><br>

            <div class="simple-profile-container" style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px;">
            <a href="{{ route('detailProfilPenulisArtikel', ['id' => $article->id]) }}" style="text-decoration: none; color: inherit;">
                <div class="simple-profile-picture" style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #3498db;">
                 
                  @if(!empty($user->fotoProfil) && filter_var($user->fotoProfil, FILTER_VALIDATE_URL))
                      <img src="{{ $user->fotoProfil }}" alt="Profil Picture" style="width: 100%; height: 100%;">
                  @elseif(!empty($user->fotoProfil))
                      <img src="{{ asset('fotoProfil/' . $user->fotoProfil) }}" alt="Profil Picture" style="width: 100%; height: 100%;">
                  @endif
                  
                </div>
            </a>

            <div class="simple-profile-details" style="flex: 1;">
                <a href="{{ route('detailProfilPenulisArtikel', ['id' => $article->id]) }}" style="text-decoration: none; color: inherit;">
                    <span class="simple-profile-name" style="color: #2c3e50; font-weight: bold; font-size: 1.2em; display: block; margin-bottom: 4px;">
                        {{ $article->penulis }}
                    </span>
                </a>

                <span style="color: #7f8c8d; font-weight: normal; font-size: 1em; display: block;">Penulis | {{ $totalFollowers }} Follower</span>
                <span style="color: #7f8c8d; font-weight: normal; font-size: 1em; display: block;"> 

                <span class="gold-star" data-rating="1">&#9733;</span><span style="color: gray;">{{ number_format($averageRating, 1) }}</span>
              
                <span> 
            </div>

          @auth
          @if(auth()->user()->isNot($user))
              <div id="followButton" style="background-color: #3498db; padding: 8px 16px; border-radius: 20px; cursor: pointer;">
                  <span id="followText" style="color: #fff; font-weight: bold; font-size: 1em; display: block;">{{ auth()->user()->isFollowing($user) ? 'Following' : 'Follow' }}</span>
              </div>
          @endif
      @endauth
      </div>
    
            <hr>
            
            <div class="float-right" style="margin-top: 10px;">
                <ul>
                    <li>
                        Diterbitkan: <span style="color: rgba(165, 165, 165, 1);">{{ \Carbon\Carbon::parse($article['created_at'])->format('l, d M Y H.i') }}</span><br>
                    </li>
                    <li>
                        Diperbarui: <span style="color: rgba(165, 165, 165, 1);">{{ \Carbon\Carbon::parse($article['updated_at'])->format('l, d M Y H.i') }}</span>
                    </li>
                </ul>
            </div>

            <p>
                <i class="fas fa-eye"></i> {{ $formattedJumlahAkses }}
            </p>            
            
          <span class="fh5co_tags_all">
            <a href="#" class="fh5co_tagg">{{ $article->kategori }}</a>
          </span>
          
            <ul class="list-inline">
              <li class="list-inline-item">
                <form action="{{ route('simpan.artikelData', $article->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="artikel_id" value="{{ $article->id }}">
                    <button type="submit" style="background-color: orange; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                        <i class="fa fa-plus" style="color: white;"></i> Simpan
                    </button>
                </form>
            </li>
            
            <li class="list-inline-item">
              <a href="#" id="showModal" class="laporan-button" style="margin-left: 10px; color: #f44336; text-decoration: none; transition: color 0.3s;">
                  <i class="fa fa-flag"></i> Laporkan
              </a>
          </li>
            
            <span class="gold-star" data-rating="1">&#9733;</span><span style="color: gray;">{{ number_format($AvgArt, 1) }} ({{$totalRatingArt}} Rating)</span>

            <span style="text-align: right">
              <p class="icon-bagikan" style="color: rgba(165, 165, 165, 1); display: flex; align-items: center; justify-content: end; gap: 0.5em;">
                  Share &nbsp;&nbsp;&nbsp;
                  <a href="https://www.facebook.com/sharer.php?u=https://www.example.com/post-url{{ $article->judulArtikel }}">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/640px-Facebook_logo_%28square%29.png" alt="Facebook" style="width: 32px; height: 32px;">
                  </a>
                  <a href="https://twitter.com/intent/tweet?url=https://www.example.com/post-url&text={{ $article->judulArtikel }}">
                      <img src="https://seeklogo.com/images/T/twitter-x-logo-101C7D2420-seeklogo.com.png?v=638258862800000000" alt="Twitter" style="width: 32px; height: 32px;">
                  </a>
                  <a href="whatsapp://send?text={{ $article->judulArtikel }}%20-%20https://www.example.com/post-url">
                      <img src="https://cdn4.iconfinder.com/data/icons/miu-square-flat-social/60/whatsapp-square-social-media-512.png" alt="WhatsApp" style="width: 32px; height: 32px;">
                  </a>
                  <a href="https://telegram.me/share/url?url=https://www.example.com/post-url&text={{ $article->judulArtikel }}">
                      <img src="https://cdn3.iconfinder.com/data/icons/social-media-chamfered-corner/154/telegram-512.png" alt="Telegram" style="width: 32px; height: 32px;">
                  </a>
              </p>
          </span>
      
          </ul>

          @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @elseif(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
          @endif
          
          </section>


            @if($article->gambarArtikel)
                @if(filter_var($article->gambarArtikel, FILTER_VALIDATE_URL))
                    <a href="{{$article->gambarArtikel}}" data-lightbox="gambarArtikel" data-title="Deskripsi Gambar">
                        <img src="{{$article->gambarArtikel}}"  style="max-width: 100%; height: auto; border-radius: 14px">
                    </a>
                @else
                    <a href="{{asset('gambarArtikel/'.$article->gambarArtikel)}}" data-lightbox="gambarArtikel" data-title="Deskripsi Gambar">
                        <img src="{{asset('gambarArtikel/'.$article->gambarArtikel)}}"  style="max-width: 100%; height: auto; border-radius: 14px">
                    </a>
                @endif
            @endif

          <div style="font-size: 18px; text-align: justify; margin-top: 20px;">
            <div style="font-size: 18px; line-height: 2; color: black;">
                {!! str_replace('<img', '<img style="max-width: 1152px; width: 100%; height: auto; display: block; margin: 0 auto;"', $article->deskripsi) !!}
            </div>
        </div>        
        </div>


          <div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
            <div>
              <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Kategori</div>
          </div>
          <div class="clearfix"></div>

          @php
          $uniqueCategories = [];
          @endphp
          
          @foreach($kategoriLogA as $item)
              @if (!in_array($item->kategori, $uniqueCategories))
                  <span class="fh5co_tags_all">
                      <a href="{{ route('kategoriA', ['kategori' => $item->kategori]) }}" class="fh5co_tagg">{{ $item->kategori }}</a>
                  </span>
                  @php
                  $uniqueCategories[] = $item->kategori;
                  @endphp
              @endif
          @endforeach

          <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
        </div>
        
        @php
            $uniqueTags = [];
        @endphp
        
        <span class="fh5co_tags_all">
            @foreach($tags as $tag)
                <?php
                $words = explode(",", $tag->tags);
                foreach ($words as $word) {
                    $trimmedWord = trim($word);
                    if (!in_array($trimmedWord, $uniqueTags)) {
                        $uniqueTags[] = $trimmedWord;
                        // Tautan tag ke rute 'TagsArtikel'
                        echo '<a href="' . route("TagsArtikel", $trimmedWord) . '" class="fh5co_tagg">' . $trimmedWord . '</a>';
                        echo ' ';
                    }
                }
                ?>
            @endforeach
        </span>

        
        
        
             
            <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">See More</div>
            <div class="row pb-3">
                @foreach($box as $item)
                <div class="col-4 align-self-center mb-3">

                    @if($item->gambarArtikel)
                      @if(filter_var($item->gambarArtikel, FILTER_VALIDATE_URL))
                          <a href="{{$item->gambarArtikel}}" data-lightbox="gambarArtikel" data-title="Deskripsi Gambar">
                              <img src="{{$item->gambarArtikel}}"  alt="img"  width="120" height="50">
                          </a>
                      @else
                          <a href="{{asset('gambarArtikel/'.$item->gambarArtikel)}}" data-lightbox="gambarArtikel" data-title="Deskripsi Gambar">
                              <img src="{{asset('gambarArtikel/'.$item->gambarArtikel)}}"  alt="img"  width="120" height="50">
                          </a>
                      @endif
                  @endif

                </div>
                <div class="col-8 padding">
                    <div class="most_fh5co_trending_font"><a class="article-title" href="{{ route('detail.artikel', ['id' => $item->id]) }}">{{ \Illuminate\Support\Str::limit($item->judulArtikel, 50) }}</a></div>
                    <div class="most_fh5co_trending_font_123">{{ \Carbon\Carbon::parse($item['created_at'])->format('l, d M Y H.i') }}</div>
                </div>
                @endforeach
            </div>                     
        </div>
    </div>

    <span class="fh5co_tags_all"> Tags : 
        @foreach(explode(',', $article->tags) as $tag)
            <a href="{{ route('TagsArtikel', ['tag' => $tag]) }}" class="fh5co_tagg">{{ $tag }}</a>
        @endforeach
      </span>

      <br>
      <br>
      
      @if ($userHasRated)
    <div class="alert alert-info">
        Anda sudah memberikan rating untuk artikel ini.
    </div>
@else
      <form id="ratingForm" action="{{ route('storeRatingPenulis', ['artikel_id' => $article->id]) }}" method="post">
        @csrf <!-- Menambahkan CSRF token -->
        <div class="row">
          <div class="col-lg-6 offset-lg-0">
            <div class="card" style="width: 135%;">
              <div class="card-body text-center">
                <label for="rating">Berikan rating penulis dari artikel ini</label>
                <div class="rating-penulis">
                  <span class="star" data-rating="1" title="Sangat Buruk">&#9733;</span>
                  <span class="star" data-rating="2" title="Buruk">&#9733;</span>
                  <span class="star" data-rating="3" title="Sedang">&#9733;</span>
                  <span class="star" data-rating="4" title="Baik">&#9733;</span>
                  <span class="star" data-rating="5" title="Sangat Baik">&#9733;</span>
                </div>
                <!-- Input hidden untuk menyimpan rating -->
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="user_id_penulis" value="{{ $article->user_id }}">
                <input type="hidden" name="artikel_id" value="{{ $article->id }}">                
                <input type="hidden" name="rating" id="rating" value="0" required>
                <div id="keterangan"></div>
                <!-- Tombol submit awalnya disembunyikan -->
                <div id="buttonContainer" style="text-align: center;">
                  <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      @endif
      


    <br>
    <br>

    <form action="/komentarArtikel" method="post">
      @csrf
      <input type="hidden" name="artikel_id" value="{{ $article->id }}"> 
      <label for="" style="font-size: 24px;"><strong>{{$totalKomentarArtikels}} Komentar</strong></label><br>
      <label for="pesan" style="font-size: 24px;">Beri Komentar:</label><br>
      <textarea name="pesan" id="pesan" placeholder="Berikan Tanggapan Anda..." required style="width: 730px; height: 200px; border-radius: 10px;"></textarea><br>
      <div class="green-button">
          <button type="submit" style="background-color: orange; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Kirim</button>
      </div>
  </form>
  
      <br>
      @foreach($komentarArtikels as $komentar)
      <div class="card" style="max-width: 730px; margin-bottom: 10px;">
          <div class="card-body" style="display: flex;">
              <div class="profil-foto" style="margin-right: 10px;">

                  @if(!empty($komentar->user->fotoProfil))
                      @if(filter_var($komentar->user->fotoProfil, FILTER_VALIDATE_URL))
                          <img src="{{ $komentar->user->fotoProfil }}" alt="Foto Profil" style="border-radius: 50%; width: 50px; height: 50px;">
                      @else
                          <img src="{{ asset('fotoProfil/' . $komentar->user->fotoProfil) }}" alt="Foto Profil" style="border-radius: 50%; width: 50px; height: 50px;">
                      @endif
                  @endif

              </div>
              <div style="flex: 1;">
                  <h5 class="card-title" style="display: inline-block;">
                      {{ $komentar->user->name }}
                  </h5>
                  @if($komentar->created_at->diffInDays(now()) <= 5)
                  <div style="display: inline-block; background-color: #097BED; color: white; padding: 5px; border-radius: px; font-size: smaller;">
                    <strong>Komentar Baru</strong>
                </div>                
              @endif
                
                  <p>
                      {{ $komentar->created_at->format('d F Y') }} | {{ $komentar->created_at->diffForHumans() }}
                      @if($komentar->updated_at)
                          <span style="color: gray;">(Edited)</span>
                      @endif
                  </p>
                  <p class="card-text" id="pesan-{{ $komentar->id }}" style="text-align: justify;">
                      {{ $komentar->pesan }}
                  </p>
                <div id="edit-pesan-{{ $komentar->id }}" style="display: none; width: 100%; text-align: right;">
                  <textarea id="edit-pesan-text-{{ $komentar->id }}" style="width: 100%;">{{ $komentar->pesan }}</textarea>
                  <button class="simpan-edit-button" data-id="{{ $komentar->id }}" data-user-id="{{ $komentar->user_id }}" style="background: none; border: none; cursor: pointer;">
                      <i class="fas fa-save"></i> Simpan
                  </button>                               
                  
                  <button class="tutup-edit-button" data-id="{{ $komentar->id }}" style="background: none; border: none; cursor: pointer;">
                      <i class="fas fa-times"></i> Tutup
                  </button>
              </div>
              
                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px;">
                    <div style="display: flex; align-items: center;">

                <a href="javascript:void(0);" id="likeButton{{ $komentar->id }}" style="text-decoration: none; color: #333; display: inline-block; padding: 8px 15px; border: 2px solid #4CAF50; border-radius: 20px; background-color: #fff; transition: all 0.3s ease;" onclick="toggleLike('{{ $komentar->id }}')">
                    <i id="thumbIcon{{ $komentar->id }}" class="{{ $komentar->likes->contains('user_id', Auth::id()) ? 'fa' : 'fa-regular' }} fa-thumbs-up" style="color: #4CAF50; margin-right: 5px;"></i>  
                    <span id="likeCount{{ $komentar->id }}" style="font-size: medium; margin-left: 5px;">{{ $komentar->likes->count() }} likes</span>
                </a>                
                 
                        @if(Auth::check() && Auth::user()->id == $komentar->user_id)
                            <a href="{{ route('deleteKomentarArtikel', ['id' => $komentar->id]) }}" style="margin-left: 10px; color: #f44336; text-decoration: none; transition: color 0.3s;">
                                <i class="fas fa-trash" style="font-size: large;"></i> Hapus
                            </a>
                        @endif
                    </div>
                    
                    <div>
                        @if(Auth::check() && Auth::user()->id != $komentar->user_id)
                        <a href="#" class="showLaporanKomen" data-comment-id="{{ $komentar->id }}" data-article-id="{{ $komentar->artikel_id }}" data-pelapor-name="{{ $komentar->user->name }}" style="margin-left: 10px; color: #f44336; text-decoration: none; transition: color 0.3s;">
                          <i class="fas fa-flag" style="font-size: large;"></i> Laporkan
                        </a>
                        @endif
                  </div>

                </div>
            </div>

            @if(Auth::check() && Auth::user()->id == $komentar->user_id)    
            <a href="#" class="edit-button" data-id="{{ $komentar->id }}" data-user-id="{{ $komentar->user_id }}" style="margin-left: 10px; color: #f44336; text-decoration: none; transition: color 0.3s;">
                <i class="fas fa-edit" style="font-size: 20px;"></i> Edit
            </a>
        @endif

          </div>
      </div>
      @endforeach

      <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @if ($komentarArtikels->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&lsaquo;</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $komentarArtikels->previousPageUrl() }}" rel="prev" aria-label="Previous">
                            <span aria-hidden="true">&lsaquo;</span>
                        </a>
                    </li>
                @endif
    
                <!-- Display current page and total pages -->
                <li class="page-item disabled">
                    <span class="page-link">
                        {{ $komentarArtikels->currentPage() }} dari {{ $komentarArtikels->lastPage() }}
                    </span>
                </li>
    
                @if ($komentarArtikels->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $komentarArtikels->nextPageUrl() }}" rel="next" aria-label="Next">
                            <span aria-hidden="true">&rsaquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Next">
                            <span aria-hidden="true">&rsaquo;</span>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    </div>

          <br>
          <br>
          
          <div class="text-center">
            <div class="buttons" style="display: flex; justify-content: center; gap: 10px;">
                <div class="green-button">
                    <a href="/home">Kembali</a>
                </div>
                <div class="orange-button">
                    <a href="/ulasan">Ulasan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>

<!-------------------------------------------------------------------------------------- Modal Area ------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------- Modal Area ------------------------------------------------------------------------------------------------------->
  

    <!-- Modal -->
    <div id="laporanModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.4);">
      <div style="background-color: #fff; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 15px;">
        <span id="closeModal" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
        <div class="text-center">
          <h2 style="color: #4CAF50; font-size: 24px; font-weight: bold;">Laporkan Artikel</h2>
          <strong><span id="judulArtikel" style="font-size: 14px;"></span></strong></p>
          <hr>
        </div>
        <form id="laporanForm">
          <input type="hidden" name="user_id_penulis" value="{{ $article->user_id }}">
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <input type="hidden" name="artikel_id" value="{{ $article->id }}">
          <div>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Konten Seksual" required> Konten Seksual</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Konten kekerasan atau menjijikkan"> Konten kekerasan atau menjijikkan</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Konten kebencian atau pelecehan"> Konten kebencian atau pelecehan</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Pelecehan atau penindasan"> Pelecehan atau penindasan</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Tindakan merugikan atau berbahaya"> Tindakan merugikan atau berbahaya</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Misinformasi"> Misinformasi</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Pelecehan terhadap anak"> Pelecehan terhadap anak</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Mendukung terorisme"> Mendukung terorisme</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Spam atau menyesatkan"> Spam atau menyesatkan</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Masalah hukum"> Masalah hukum</label><br>
            <label style="font-size: 16px;"><input type="radio" name="laporan" value="Teks bermasalah"> Teks bermasalah</label><br>
          </div>
          <div>
            <textarea name="alasan" id="alasan" placeholder="Kenapa Anda melaporkan artikel ini?" required style="width: 100%; border-radius: 15px;"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Kirim</button>
          </div>
        </form>
        <div style="text-align: left; padding: 10px;">
          <p style="font-size: 14px;">Artikel dan pengguna yang dilaporkan akan ditinjau oleh staf kami untuk menentukan apakah artikel dan pengguna tersebut melanggar Pedoman kami atau tidak. Akun akan dikenai sanksi jika melanggar Pedoman Komunitas, dan pelanggaran serius atau berulang dapat berakibat pada penghentian akun.</p>
        </div>
      </div>
    </div>
    

    <!-- Modal Lapor Komentar Artikel -->

    <div id="laporanKomentarModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.4);">
        <div style="background-color: #fff; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 15px;">
          <span id="closeModalLK" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
          <div class="text-center">
            <h2 style="color: #4CAF50; font-size: 24px; font-weight: bold;">Laporkan Komentar Artikel</h2>
            <strong><span id="pelaporName" style="font-size: 14px;"></span></strong></p>
            <hr>
          </div>
          <form id="laporanForm" method="POST" action="{{ route('laporan.storeLaporanKomentarArtikel') }}">
            @csrf
            <div class="modal-body">
              <input type="hidden" name="comment_id" id="comment_id">
              <input type="hidden" name="article_id" id="article_id">
              <input type="hidden" name="user_id_pelapor" value="{{ Auth::id() }}">
              <div style="text-align: left;">
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Konten Komersial atau Spam"> Konten Komersial atau Spam</label><br>
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Materi Pornografi atau Seksual Vulgar"> Materi Pornografi atau Seksual Vulgar</label><br>     
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Pelanggaran Hak Anak"> Pelanggaran Hak Anak</label><br>
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Pernyataan Kebencian dan Kekerasan"> Pernyataan Kebencian dan Kekerasan</label><br>
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Mendukung Terorisme"> Mendukung Terorisme</label><br>
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Pelecehan dan Penindasan"> Pelecehan dan Penindasan</label><br>
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Penggunaan Bunuh Diri atau Menyakiti Diri Sendiri"> Penggunaan Bunuh Diri atau Menyakiti Diri Sendiri</label><br>
                <label style="font-size: 16px;"><input type="radio" name="laporan" value="Misinformasi"> Misinformasi</label><br>
              </div><br>
              <div>
                <textarea name="alasan" id="alasan" placeholder="Kenapa Anda melaporkan komentar ini?" required style="width: 100%; border-radius: 15px;"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Kirim</button>
              </div>
            </div>
          </form>
          <div style="text-align: left; padding: 10px;">
            <p style="font-size: 14px;">Laporan Komentar yang dilaporkan akan ditinjau oleh staf kami untuk menentukan apakah komentar pengguna tersebut melanggar Pedoman kami atau tidak. Akun akan dikenai sanksi jika melanggar Pedoman Komunitas, dan pelanggaran serius atau berulang dapat berakibat pada penghentian akun.</p>
        </div>
        </div>
      </div>
      
      
    

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

<!-- Modal Unfollow -->
<div class="modal fade" tabindex="-1" role="dialog" id="unfollowModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Unfollow Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Are you sure you want to unfollow?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="confirmUnfollow">Unfollow</button>
          </div>
      </div>
  </div>
</div>
<!-------------------------------------------------------------------------------------- JavaScript Area ------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------- JavaScript Area ------------------------------------------------------------------------------------------------------->

  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>

    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <div class="gototop js-top">
      <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
          integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
          crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
          integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
          crossorigin="anonymous"></script>

    <!-- Parallax -->
    <script src="{{ asset('aset1/js/jquery.stellar.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('aset1/js/main.js') }}"></script>

    <!-- Add this line to include jQuery if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


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

<!--------------------------------------------------------------------------------------- Javascript Followers ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Followers ------------------------------------------------------------------------------->

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shC65g+0n3E0yfFilaFIBw5TO7wGvzD0F1Dz0" crossorigin="anonymous"></script>

<script>
    var followButton = document.getElementById('followButton');
    if (followButton) {
        followButton.addEventListener('click', function () {
            var followText = document.getElementById('followText');
            var isFollowing = followText.textContent.trim() === 'Following';
            
            if (isFollowing) {
                $('#unfollowModal').modal('show');
            } else {
                toggleFollow({{ $user->id }});
            }
        });
    }

    document.getElementById('confirmUnfollow').addEventListener('click', function () {
        $('#unfollowModal').modal('hide');
        toggleFollow({{ $user->id }});
    });

    function toggleFollow(userId) {
        var followText = document.getElementById('followText');
        var isFollowing = followText.textContent.trim() === 'Following';

        var method = isFollowing ? 'DELETE' : 'POST';
        var url = isFollowing ? '/unfollow/' + userId : '/follow/' + userId;

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.error) {
                if (isFollowing) {
                    followText.textContent = 'Follow';
                } else {
                    followText.textContent = 'Following';
                }
            } else {
                console.error('Error:', data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
  
    
<!--------------------------------------------------------------------------------------- Javascript Laporkan Modal ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Laporkan Modal ------------------------------------------------------------------------------->

<script>
  document.getElementById('showModal').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('laporanModal').style.display = 'block';

      var judulArtikel = "{{ $article->judulArtikel }}";
      document.getElementById("judulArtikel").innerText = judulArtikel;
  });
  
  document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('laporanModal').style.display = 'none';
  });
  
  window.addEventListener('click', function(event) {
      if (event.target == document.getElementById('laporanModal')) {
          document.getElementById('laporanModal').style.display = 'none';
      }
  });
  
  document.getElementById('laporanForm').addEventListener('submit', function(e) {
      e.preventDefault();
  
      fetch("{{ route('laporan.store') }}", {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
              user_id_penulis: document.querySelector('input[name="user_id_penulis"]').value,
              user_id: document.querySelector('input[name="user_id"]').value,
              artikel_id: document.querySelector('input[name="artikel_id"]').value,
              laporan: document.querySelector('input[name="laporan"]:checked').value,
              alasan: document.querySelector('textarea[name="alasan"]').value
          })
      })
      .then(response => response.json())
      .then(data => {
          alert(data.message);
          document.getElementById('laporanModal').style.display = 'none';
      })
      .catch(error => console.error('Error:', error));
  });
  </script>
  

<!--------------------------------------------------------------------------------------- Javascript Laporkan Komentar Modal ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Laporkan Komentar Modal ------------------------------------------------------------------------------->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.showLaporanKomen').on('click', function() {
      var commentId = $(this).data('comment-id');
      var articleId = $(this).data('article-id');
      var pelaporName = $(this).data('pelapor-name'); // Mengambil nama pelapor dari atribut data
      $('#comment_id').val(commentId);
      $('#article_id').val(articleId);
      $('#pelaporName').text(pelaporName); // Menampilkan nama pelapor di dalam modal
      $('#laporanKomentarModal').show(); // Menampilkan modal
    });

    $('#closeModalLK').on('click', function() {
      $('#laporanKomentarModal').hide(); // Menutup modal
    });

    // Menutup modal jika pengguna mengklik di luar modal
    window.addEventListener('click', function(event) {
      if (event.target == document.getElementById('laporanKomentarModal')) {
        document.getElementById('laporanKomentarModal').style.display = 'none';
      }
    });
  });
</script>

  
  
<!--------------------------------------------------------------------------------------- Javascript Logout Modal ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Logout Modal ------------------------------------------------------------------------------->

    <!-- MODAL LOGOUT -->
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

<!--------------------------------------------------------------------------------------- Javascript Edit Komentar ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Edit Komentar ------------------------------------------------------------------------------->

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button');
    
    editButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const komentarId = this.getAttribute('data-id');
            const userId = this.getAttribute('data-user-id');
            const editPesanDiv = document.getElementById('edit-pesan-' + komentarId);
            editPesanDiv.style.display = 'block';
        });
    });
    
    // Tambahkan event listener untuk tombol simpan edit
    const simpanEditButtons = document.querySelectorAll('.simpan-edit-button');
    
    simpanEditButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const komentarId = this.getAttribute('data-id');
            const userId = this.getAttribute('data-user-id');
            const editedText = document.getElementById('edit-pesan-text-' + komentarId).value;

            // Perbarui pesan komentar dan tandai sebagai edited
            fetch("{{ url('/simpanEditKomentarArtikel') }}/" + komentarId + "/" + userId, {
                method: "POST",
                body: JSON.stringify({ pesan: editedText }),
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                const pesanElement = document.getElementById('pesan-' + komentarId);
                pesanElement.innerText = editedText;

                // Tampilkan keterangan edited
                const keteranganEdited = document.createElement('span');
                keteranganEdited.style.color = 'gray';
                keteranganEdited.textContent = ' (Edited)';
                pesanElement.appendChild(keteranganEdited);

                document.getElementById('edit-pesan-' + komentarId).style.display = 'none';
            })
            .catch(error => {
                console.error(error);
            });
        });
    });
    
    // Tambahkan event listener untuk tombol tutup edit
    const tutupEditButtons = document.querySelectorAll('.tutup-edit-button');
    
    tutupEditButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const komentarId = this.getAttribute('data-id');
            document.getElementById('edit-pesan-' + komentarId).style.display = 'none';
        });
    });
});

  </script>
  
  
<!--------------------------------------------------------------------------------------- Javascript Like ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Like ------------------------------------------------------------------------------->

<script>
    function toggleLike(commentId) {
        var button = document.getElementById('likeButton' + commentId);
        var icon = document.getElementById('thumbIcon' + commentId);
        var likeCount = document.getElementById('likeCount' + commentId);
    
        // Toggle class untuk mengubah ikon
        if (icon.classList.contains('fa')) {
            icon.classList.remove('fa');
            icon.classList.remove('fas');
            icon.classList.add('fa-regular');
            icon.classList.add('far');
        } else {
            icon.classList.remove('fa-regular');
            icon.classList.remove('far');
            icon.classList.add('fa');
            icon.classList.add('fas');
        }
    
        // Mengambil nilai jumlah like dari teks
        var likeText = likeCount.textContent.trim();
        var currentLikes = parseInt(likeText.split(' ')[0]); // Ambil bagian angka dari teks
        var newLikes = currentLikes + (icon.classList.contains('fa') ? 1 : -1); // Tambah atau kurangi like sesuai dengan perubahan ikon
    
        // Mengupdate teks jumlah like
        likeCount.textContent = newLikes + ' likes';
    
        // Mengirim permintaan ke server untuk menambah atau menghapus like
        fetch('/likeKomentarArtikel/' + commentId, {
            method: 'POST', // POST atau DELETE sesuai dengan kebutuhan Anda
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
    </script>

<!--------------------------------------------------------------------------------------- Javascript Rating ------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------- Javascript Rating ------------------------------------------------------------------------------->

<script>
// Ambil elemen-elemen yang diperlukan
const ratingPenulis = document.querySelectorAll('.star');
const ratingInput = document.getElementById('rating');
const keterangan = document.getElementById('keterangan');
const submitBtn = document.getElementById('submitBtn'); // Perhatikan perubahan di sini

// Sembunyikan tombol submit secara default
submitBtn.style.display = 'none';

// Fungsi untuk menampilkan keterangan rating
function tampilkanKeterangan(ratingValue) {
  switch(ratingValue) {
    case 1:
      return "Sangat Buruk";
    case 2:
      return "Buruk";
    case 3:
      return "Sedang";
    case 4:
      return "Baik";
    case 5:
      return "Sangat Baik";
    default:
      return "";
  }
}

// Fungsi untuk menangani klik pada bintang rating
function handleRatingClick() {
  const ratingValue = parseInt(this.getAttribute('data-rating'));
  ratingInput.value = ratingValue; // Set nilai input rating

  // Tampilkan keterangan sesuai rating
  keterangan.innerText = tampilkanKeterangan(ratingValue);

  // Tambahkan kelas checked ke bintang yang dipilih
  ratingPenulis.forEach(s => s.classList.remove('checked'));
  this.classList.add('checked');

  // Hapus kelas selected dari semua bintang
  ratingPenulis.forEach(s => s.classList.remove('selected'));

  // Tambahkan kelas selected ke bintang-bintang sebelumnya
  for (let i = 0; i < ratingValue; i++) {
    ratingPenulis[i].classList.add('selected');
  }

  // Tampilkan tombol submit jika rating telah dipilih
  submitBtn.style.display = 'block';
}

// Tambahkan event listener ke setiap bintang
ratingPenulis.forEach(star => {
  star.addEventListener('click', handleRatingClick);
});

  </script>


    
  </body>
</html>