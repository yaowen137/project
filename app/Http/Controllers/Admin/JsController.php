<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class JsController extends Controller
{
    public function jstype (Request $request)
    {	
    	$parentid = $request->input('parentid');
    	$res = DB::table('type')->where('parentid', $parentid)->get();
    	foreach ($res as $key => $value) {
    		$res[$key]->path = explode(',', $value->path);
    	}
    	// dd($res);
    	echo json_encode($res);
    }


    public function jsadvert (Request $request)
    {   
        $num = $request->input('num');
        $arr = array();
        $arr1 = array();
        if ($num == 1 || $num == 2) {
            $res = DB::table('type')->select('id', 'name', 'path')->get();
            foreach ($res as $key => $value) {
                $res[$key]->path = explode(',', $value->path);
                array_shift($res[$key]->path);
                $res[$key]->num = count($value->path);
                if ($res[$key]->num == $num) {
                    $arr1 = array();
                    foreach ($res[$key]->path as $k => $v) {
                        $name = DB::table('type')->select('name')->where('id', $v)->first()->name;
                        $arr1[] = $name;
                    }
                    $res[$key]->name = implode(' -> ', $arr1).' -> '.$res[$key]->name;
                    if ($num == 2) {
                        $res[$key]->id = '/ugoodslist/'.$value->id;
                    } else {
                        $res[$key]->id = '/utgoodslist/'.$value->id;
                    }
                    $arr[] = $res[$key];
                }
            }
        } elseif ($num == 3) {
            $res = DB::table('goods')->select('id', 'title')->orderBy('tid','asc')->get();
            foreach ($res as $value) {
                $value->id = '/ugoodsinfo/'.$value->id;
                $value->name = $value->title;
                $arr[] = $value;
            }
        }
        
        
        // dd($res);
        echo json_encode($arr);
    }
}
