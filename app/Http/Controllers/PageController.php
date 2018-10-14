<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * 
     */
    public function welcome()
    {
        return view('pages.welcome');
    }

    /**
     * 
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * 
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * 
     */
    public function team()
    {
        return view('pages.team');
    }
}
