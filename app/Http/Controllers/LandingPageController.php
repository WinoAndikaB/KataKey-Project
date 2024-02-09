<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikels;
use App\Models\komentar_artikel;
use App\Models\komentar_video;
use App\Models\syaratdanketentuans;
use App\Models\ulasans;
use App\Models\video;
use App\Models\kategori;

class LandingPageController extends Controller
{

    //[Landing Page]  Search Artikel
    public function searchLP(Request $request) {
        $searchTerm = $request->input('search');
        
        $artikels = artikels::where('judulArtikel', 'like', '%' . $searchTerm . '%')
            ->get();
    
        return view('main.sebelumLogin.searchLP', compact('artikels'));
    }

    //[Landing Page] Search Video
    public function searchLPV(Request $request) {
        $searchTerm = $request->input('searchLPV');
        
        $videos = video::where('judulVideo', 'like', '%' . $searchTerm . '%')
            ->get();
    
        return view('main.sebelumLogin.searchLPV', compact('videos'));
    }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //[Landing Page] Halaman Home landing Page
    public function landingPage(Request $request)
    {
  
                // Get trending articles randomly
                $trending = artikels::whereNotIn('status' , ['Pending', 'Rejected'])
                ->inRandomOrder()
                ->take(3)
                ->get();
        
    
                // Get the latest articles excluding "Pending" and "Rejected" articles
                $latest = artikels::whereNotIn('status', ['Pending', 'Rejected'])
                ->orderBy('created_at', 'desc')
                ->take(8)
                ->get();

                // Get what's new articles randomly excluding "Pending" and "Rejected" articles
                $whatsnew = artikels::whereNotIn('status', ['Pending', 'Rejected'])
                ->inRandomOrder()
                ->take(5)
                ->get();
    
                   // Get a box of articles randomly excluding "Pending" and "Rejected" articles
                $boxLong = artikels::whereNotIn('status', ['Pending', 'Rejected'])
                ->inRandomOrder()
                ->take(1)
                ->get();

                $box3 = artikels::whereNotIn('status', ['Pending', 'Rejected'])
                    ->inRandomOrder()
                    ->take(5)
                    ->get();

                $box2 = artikels::whereNotIn('status', ['Pending', 'Rejected'])
                    ->inRandomOrder()
                    ->take(2)
                    ->get();

                $box = artikels::whereNotIn('status', ['Pending', 'Rejected'])
                    ->inRandomOrder()
                    ->take(8)
                    ->get();

                $semua = artikels::whereNotIn('status', ['Pending', 'Rejected'])->get();

                $todayDate = date('l, d M Y');
    
        return view('main.sebelumLogin.landingPage', compact('trending', 'latest','whatsnew','semua', 'box', 'box2', 'box3', 'boxLong', 'todayDate'));
    }

    //[Landing Page] Menampilkan Detail Artikel Ketika Di Klik
    public function showDetailLPArtikel($id)
    {
        $article = artikels::findOrFail($id);

        $kategoriA = kategori::all();
    
        $box = artikels::inRandomOrder()->take(8)->get();
        $tags = artikels::inRandomOrder()->take(10)->get();
        $kategori = artikels::inRandomOrder()->take(10)->get();
    
        // Hitung jumlah komentar untuk artikel dengan ID tertentu
        $totalKomentar = komentar_artikel::where('artikel_id', $id)->count();
    
        $komentarArtikels = komentar_artikel::where('artikel_id', $id)->latest()->paginate(6);
    
        return view('main.sebelumLogin.detailArtLP', compact('kategoriA','article', 'box', 'tags', 'kategori', 'komentarArtikels', 'totalKomentar'));
    }
    

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //[Landing Page] Halaman Kategori landing Page

    function kategoriLandingPage(){

        $kategoriA = kategori::all();

        return view('main.sebelumLogin.KategoriSL.kategoriLandingPage', compact('kategoriA'));
    }

    function kategoriLandingPageA($kategori){

        $kategoriLandingPageA = artikels::where('kategori', $kategori)
            ->whereNotIn('status', ['Pending', 'Rejected'])
            ->inRandomOrder()
            ->take(10)
            ->get();
    
        return view('main.sebelumLogin.KategoriSL.kategoriLandingPageA', compact('kategoriLandingPageA'));
    }
    
    function kategoriLandingPageV($kategori){

        $kategoriLandingPageV = video::where('kategoriVideo', $kategori)
            ->whereNotIn('statusVideo', ['Pending', 'Rejected'])
            ->inRandomOrder()
            ->take(10)
            ->get();
    
        return view('main.sebelumLogin.KategoriSL.kategoriLandingPageV', compact('kategoriLandingPageV'));
    }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //[Landing Page] Halaman About landing Page

    function aboutLandingPage(){
        return view('main.sebelumLogin.aboutLandingPage');
    }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   
    //[Landing Page] Syarat Ketentuan landing Page

    function syaratKetentuanLP(){
        $syarat = syaratdanketentuans::all();
        return view('main.sebelumLogin.syaratKetentuanLP', compact('syarat'));
    }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //[Landing Page] Halaman Video landing Page

    function landingPageVideo(Request $request){
            
        $semuaVideo = video::whereNotIn('statusVideo', ['Pending', 'Rejected'])
            ->inRandomOrder()
            ->get();

        $todayDate = date('l, d M Y');

        return view('main.sebelumLogin.landingPageVideo', compact('semuaVideo', 'todayDate'));
    }

    //[Landing Page] Halaman Detail Video Ketika Di Klik
    public function showDetailLPVideo($id)
    {
        $video = Video::findOrFail($id);

        $kategoriV = kategori::all();

        $boxVideo = Video::inRandomOrder()->take(10)->get();
        $tagsV = Video::inRandomOrder()->take(10)->get();

        $komentarVideos = komentar_video::where('video_id', $id)->latest()->paginate(6);

        $totalKomentarV = komentar_video::where('video_id', $id)->count();
        
        return view('main.sebelumLogin.detailVidLP', compact('kategoriV','video', 'boxVideo', 'tagsV', 'kategoriV', 'komentarVideos','totalKomentarV' ));
    }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //[Landing Page] Ulasan landing Page

    function ulasanLandingPage(Request $request){
        // Mengambil data ulasan dengan mengurutkannya berdasarkan created_at
        $data1 = ulasans::orderBy('created_at', 'desc')->get();

        // Mengambil data ulasan secara acak
        $query = ulasans::orderBy('created_at', 'desc')->get();

        //Rating
        $ratings = $data1->pluck('rating')->map(function ($rating) {
            return (int) $rating; // Mengonversi rating ke integer
        });
        
        $totalRatings = $ratings->sum();
        $averageRating = $ratings->count() > 0 ? $totalRatings / $ratings->count() : 0;
    
        //Hitung Ulasan
        $totalUlasan = ulasans::count();
        

        return view('main.sebelumLogin.ulasanLP', compact('data1', 'averageRating', 'totalUlasan'));
    }
}
