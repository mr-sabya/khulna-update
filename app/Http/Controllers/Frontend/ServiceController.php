<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('frontend.service.index', compact('service'));
    }
}
