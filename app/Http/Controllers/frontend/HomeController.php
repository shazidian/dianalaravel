<?php
namespace App\Http\Controllers\frontend;

use App;
use illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeController extends Controller {
    public function index() {
        return view('frontend.homes');
    }
}