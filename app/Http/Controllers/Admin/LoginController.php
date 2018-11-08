<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function logout ()
    {
    	unset($_SESSION['Admin']);
    	return redirect('/alogin');
    }
}
