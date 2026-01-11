<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePhotoRequest;
use App\Models\ProfilePhoto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
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
        }
        catch (\Exception $e) {
            Alert::toast('Erro ao carregar Dashboard!', 'error');
            return redirect()->back();
        }
    }

    public function updateProfilePhoto(ProfilePhotoRequest $request, $user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $user->update($request->validated());
            if ($request->fImage) {
                $name_original = $request->fImage->getClientOriginalName();
                $extension = $request->fImage->getClientOriginalExtension();
                $uuid = Uuid::uuid4();
                $name_hash = $uuid . '.' . $extension;
                $uploadPath = $request->fImage->storeAs('public/profile_photos', $name_hash);
                if (!$uploadPath) {
                    Alert::toast('Ocorreu um erro ao salvar a foto de perfil.','error');
                    return redirect()->back();
                }
                else {
                    $photos = ProfilePhoto::where('user_id', $user->id)->get();
                    foreach ($photos as $photo) {
                        if ($photo) {
                            $photo->inactivated_by_user = Auth::user()->id;
                            $photo->delete();
                        }
                    }
                    ProfilePhoto::create([
                        'name_original' => $name_original,
                        'name_hash' => $name_hash,
                        'user_id' => $user->id,
                        'registered_by_user' => Auth::user()->id,
                    ]);
                }
            }
            Alert::toast('Alteração realizada com sucesso.','success');
            return redirect()->back();
        }
        catch (\Exception $ex) {
            Alert::toast('Erro ao carregar Dashboard!', 'error');
            return redirect()->back();
        }
    }
}
