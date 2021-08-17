<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function index()
    {
        return view('agreement/index');
    }

    public function pools()
    {
        return view('agreement/pools');
    }

    public function viewPool()
    {
        return view('agreement/view_pool');
    }

    public function verifyVehicle(Request $request)
    {
        # code...
    }
}
