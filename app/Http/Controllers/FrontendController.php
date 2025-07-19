<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/Home');
        // return Inertia::render('Welcome', [
        //     'canLogin' => route('login'),
        //     'canRegister' => route('register'),
        //     'laravelVersion' => app()->version(),
        //     'phpVersion' => PHP_VERSION,
        // ]);
    }

    #This function is to see and learn (me personally) from the Laravel features 
    public function laravelFeatures()
    {
        // Logic for displaying Laravel features can be added here
        return Inertia::render('Welcome', [
            'canLogin' => route('login'),
            'canRegister' => route('register'),
            'laravelVersion' => app()->version(),
            'phpVersion' => PHP_VERSION,
        ]);
    }

}
 