<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class JstypeController extends Controller
{
    public function jstype (Request $request)
    {	
    	$parentid = $request->input('parentid');
    	$res = DB::table('type')->where('parentid', $parentid)->get();
    	// dd($res);
    	echo json_encode($res);
    }
}
