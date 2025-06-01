<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FrontendController extends Controller
{
	// protected $theme_prefix = "frontend.pages.";
	// return view($this->theme_prefix . 'home', compact('title'));

	public function index(): View
	{
		$title = "Home";
		return view('frontend.pages.home', compact('title'));
	}
}
