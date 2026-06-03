<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class PublicController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('public.home', compact('profile'));
    }

    public function resume()
    {
        return view('public.resume');
    }

    public function jobs()
    {
        return view('public.jobs');
    }

    public function blog()
    {
        return view('public.blog');
    }

    public function contact()
    {
        $profile = Profile::first();
        return view('public.contact', compact('profile'));
    }
}