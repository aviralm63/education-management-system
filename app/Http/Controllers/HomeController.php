<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     /**
     * Show the Dependent Dropdown for Category layout
     *
     * @return \Illuminate\Http\Response
     */
    public function myform(Request $request )
    {
       
        $catid = $request['cat_id'];
        
        $categories = DB::table("product_tags")->where("categories_id",$catid)->pluck('name','id');
        return $categories;
    }
}
