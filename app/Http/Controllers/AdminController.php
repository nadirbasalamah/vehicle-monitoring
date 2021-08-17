<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function listVehicle()
    {
        return view('admin/list_vehicle');
    }

    public function vehicleDetail()
    {
        return view('admin/view_vehicle');
    }

    public function addVehicle()
    {
        return view('admin/add_vehicle');
    }

    public function monitoringData()
    {
        return view('admin/monitoring');
    }

    public function listPool()
    {
        return view('admin/pools');
    }

    public function addNewVehicle(Request $request)
    {
        # code...
    }

    public function updateVehicle(Request $request)
    {
        # code...
    }

    public function deleteVehicle(Request $request)
    {
        # code...
    }

    public function addToPool(Request $request)
    {
        # code...
    }
}
