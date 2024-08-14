<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
        // $doctors = User::where('role', 'doctor')->get(); // Get all doctors
        // $sliders = Slider::all(); // Get all doctors
        // $specialties = Specialty::all(); // Get all doctors
        // return view('welcome', compact('doctors', 'sliders', 'specialties')); // Pass data to the view
    }
}
