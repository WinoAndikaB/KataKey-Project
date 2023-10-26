<?php

namespace App\Http\Controllers;

use App\Models\artikels;
use App\Models\Dislikes;
use App\Models\Likes;
use App\Models\ulasans;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    function HomeSetelahLogin(Request $request){
        $search = $request->input('search');

        $query1 = artikels::query();
        $query2 = artikels::query(); 
        $query3 = artikels::query(); 
        $query4 = artikels::query(); 
    
        if (!empty($search)) {
            $query1->where(function($query) use ($search) {
                $query->where('judulArtikel', 'LIKE', '%' . $search . '%')
                      ->orWhere('penulis', 'LIKE', '%' . $search . '%')
                      ->orWhere('deskripsi', 'LIKE', '%' . $search . '%');
            });
    
            $query2->where(function($query) use ($search) {
                $query->where('judulArtikel', 'LIKE', '%' . $search . '%')
                      ->orWhere('penulis', 'LIKE', '%' . $search . '%')
                      ->orWhere('deskripsi', 'LIKE', '%' . $search . '%');
            });
            $query3->where(function($query) use ($search) {
                $query->where('judulArtikel', 'LIKE', '%' . $search . '%')
                      ->orWhere('penulis', 'LIKE', '%' . $search . '%')
                      ->orWhere('deskripsi', 'LIKE', '%' . $search . '%');
            });
            $query4->where(function($query) use ($search) {
                $query->where('judulArtikel', 'LIKE', '%' . $search . '%')
                      ->orWhere('penulis', 'LIKE', '%' . $search . '%')
                      ->orWhere('deskripsi', 'LIKE', '%' . $search . '%');
            });
        }
    
            // Get trending articles randomly
            $trending = artikels::inRandomOrder()->take(3)->get();

            // Get the latest articles
            $latest = artikels::orderBy('created_at', 'desc')->take(8)->get();

            // Get what's new articles randomly
            $whatsnew = artikels::inRandomOrder()->take(5)->get();

            // Get a box of articles randomly
            $box = artikels::inRandomOrder()->take(8)->get();

            $semua = artikels::all();
            $todayDate = date('l, d M Y H.i');
    
        return view('main.setelahLogin.home', compact('trending', 'latest','whatsnew','semua', 'box', 'todayDate'));
    }

    public function showDetailArtikel($id)
    {
        $article = artikels::findOrFail($id);

        $box = artikels::inRandomOrder()->take(8)->get();
    
        return view('main.setelahLogin.detailArt', compact('article','box'));
    }
    
    
    function about(){
        return view('main.setelahLogin.about');
    }

    function ulasan(){
        $data1=ulasans::all();

        //Rating
        $ratings = $data1->pluck('rating')->map(function ($rating) {
            return (int) $rating; // Mengonversi rating ke integer
        });
        
        $totalRatings = $ratings->sum();
        $averageRating = $ratings->count() > 0 ? $totalRatings / $ratings->count() : 0;

        //Hitung Ulasan
        $totalUlasan = ulasans::count();
        
    return view('main.setelahLogin.ulasan', compact('data1', 'averageRating', 'totalUlasan'));
    }

    function storeUlasan(Request $request){
        $ulasan = new ulasans;
        $ulasan->rating = $request->rating;
        $ulasan->email = $request->email;
        $ulasan->nama = $request->nama;
        $ulasan->pesan = $request->pesan;
    
        // Get the user's profile picture
        $ulasan->fotoProfil = Auth::user()->fotoProfil;
    
        $ulasan->save();
    
        return redirect('ulasan');
    }

    public function simpanEditUlasan(Request $request, $id) {

    
        $ulasan = ulasans::find($id);
        
        if ($ulasan) {
            $ulasan->pesan = $request->input('pesan');
            $ulasan->save();
            return response()->json(['message' => 'Pesan ulasan berhasil diperbarui']);
        } else {
            return response()->json(['error' => 'Ulasan tidak ditemukan'], 404);
        }
    }

    public function likeUlasan($id){
        $userId = Auth::id();
        
        // Check if the user has already liked or disliked this ulasan
        $existingLike = Likes::where('ulasan_id', $id)->where('user_id', $userId)->first();
        $existingDislike = Dislikes::where('ulasan_id', $id)->where('user_id', $userId)->first();
        
        if (!$existingLike && !$existingDislike) {
            // If the user hasn't liked or disliked, add a like
            $like = new Likes();
            $like->ulasan_id = $id;
            $like->user_id = $userId;
            $like->save();
        } elseif ($existingDislike) {
            // If the user has previously disliked, remove the dislike and add a like
            $existingDislike->delete();
            $like = new Likes();
            $like->ulasan_id = $id;
            $like->user_id = $userId;
            $like->save();
        }
    
        return redirect('ulasan');
    }
    
    public function dislikeUlasan($id){
        $userId = Auth::id();
        
        // Check if the user has already liked or disliked this ulasan
        $existingLike = Likes::where('ulasan_id', $id)->where('user_id', $userId)->first();
        $existingDislike = Dislikes::where('ulasan_id', $id)->where('user_id', $userId)->first();
        
        if (!$existingLike && !$existingDislike) {
            // If the user hasn't liked or disliked, add a dislike
            $dislike = new Dislikes();
            $dislike->ulasan_id = $id;
            $dislike->user_id = $userId;
            $dislike->save();
        } elseif ($existingLike) {
            // If the user has previously liked, remove the like and add a dislike
            $existingLike->delete();
            $dislike = new Dislikes();
            $dislike->ulasan_id = $id;
            $dislike->user_id = $userId;
            $dislike->save();
        }
    
        return redirect('ulasan');
    }
    
    public function deleteUlasan($id)
    {
        $data=ulasans::find($id);
        $data->delete();
        return redirect('/ulasan');
    }

      //Profile User
      public function profileUser()
      {
          return view('main.setelahLogin.profile');
      }  
    

      public function updateUser(Request $request, $id)
      {
          $user = User::findOrFail($id);
          $user->update([
              'name' => $request->input('name'),
              'alamat' => $request->input('alamat'),
              'instagram' => $request->input('instagram'),
              'facebook' => $request->input('facebook'),
              'aboutme' => $request->input('aboutme'),
          ]);
      
          // Handle profile picture upload
          if ($request->hasFile('fotoProfil')) {
              $image = $request->file('fotoProfil');
      
              // Create a filename that includes spaces and user information
              $filename = 'fotoProfil.' . $user->name . ' ' . $user->username . '.' . $image->getClientOriginalExtension();
      
              // Save the image in the public directory
              $image->move(public_path('fotoProfil'), $filename);
      
              // Update the user's fotoProfil attribute with the filename
              $user->fotoProfil = $filename;
              $user->save();
          }
      
          return redirect('/profileUser');
      }
      
}
