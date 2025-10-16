<?php

namespace App\Http\Controllers;

use App\Models\ProfilePhoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Display the login page.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        try{
            $user = Auth::user();
            $photo = ProfilePhoto::where('user_id', $user->id)->first();
            $hasPhoto = ProfilePhoto::NOT_PHOTO;
            if ($photo) {
                $existsPhoto = Storage::disk('public')->exists('profile_photos/' . $photo->name_hash);
                if ($existsPhoto) {
                    $hasPhoto = ProfilePhoto::HAS_PHOTO;
                }
            }
            return view('profile.index', compact('photo', 'hasPhoto', 'user'));
        } catch (\Exception $e) {
            Alert::toast('Erro ao carregar Dashboard!', 'error');
            return redirect()->back();
        }
    }
}
