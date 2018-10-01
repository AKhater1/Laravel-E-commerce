<?php

namespace App\Http\Controllers;

use App\products;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index() {

        return view ('index', ['products' => products::paginate(3)]);
    }

    public function singleProduct($id)
    {
        return view ('single', ['products' => products::find($id)]);
    }
}
