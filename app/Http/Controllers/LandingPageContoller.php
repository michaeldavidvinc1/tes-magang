<?php

namespace App\Http\Controllers;
use App\Models\PropertyModel;
use Illuminate\Http\Request;

class LandingPageContoller extends Controller
{
    public function home(){
        $data = PropertyModel::all();
        return view('welcome', ['data' => $data]);
    }
}
