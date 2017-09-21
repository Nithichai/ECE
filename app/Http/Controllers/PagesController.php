<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      $title ='Home';
        // return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }
    public function about(){
      $title ='เกี่ยวกับเรา';
      return view('pages.about')->with('title',$title);
    }
    public function services(){
      $data = array(
        'title' => 'ติดต่อเรา',
        'services' => ['1','2','3']
      );
      return view('pages.services')->with($data);
    }
}
