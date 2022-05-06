<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index'); 
    }
    public function login(){
        return view('pages.login'); 
    }
    public function services(){
        
        $data = array(
            'title' => 'Service Page',
            'services' => [
            'Front End',
            'Back End',
            'Database'
            ]
        ); 
        return view('pages.services')->with($data); 
    }
}
