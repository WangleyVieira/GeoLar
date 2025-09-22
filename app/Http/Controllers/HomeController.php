<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return view('profile.index');
        } catch (\Exception $e) {
            Alert::toast('Erro ao carregar Dashboard!', 'error');
            return redirect()->back();
        }
    }
}
