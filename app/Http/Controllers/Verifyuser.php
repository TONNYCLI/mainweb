<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Verifyuser extends Controller
{
    public function index()
    {
        $userType = Auth::user()->role;

        if($userType == 'admin'){
            return redirect('admin/dashboard');
        }

        if($userType == 'user'){
            return redirect('/');
        }

    }
}
