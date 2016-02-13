<?php

namespace App\Modules\Citas\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
    	return view('front.index');
    }
}
