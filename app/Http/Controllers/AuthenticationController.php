<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //

     public function index()
    {
        //
         $user = User::latest()->get();
         return $user;
    }

    
}
