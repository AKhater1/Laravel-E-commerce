<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {

        return view ('pages.index');
    }

    public function about() {

        return view ('pages.about');
    }

    public function prolanguage() {

        $myname = array('J'=>'Java','C'=>'C++','P'=>'PHP');
        return view ('pages.prolanguage')->with('myname',$myname);
    }
}
