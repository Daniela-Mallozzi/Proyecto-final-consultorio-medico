<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

    public function detail(Request $request, $slug)
    {
        $service = Specialty::where('slug', $slug)->first();
        return view('services.detail', compact('service'));
    }

    public function doctor(Request $request, $slug)
    {
        $doctor = User::where('slug', $slug)->first();
        return view('services.doctor', compact('doctor'));
    }
}
