<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorType;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

	public function show($id)
	{
		$doctor = Doctor::findOrFail(intval($id));
		return view('frontend.doctor.show', compact('doctor'));
	}
}
