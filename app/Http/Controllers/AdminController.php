<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function listVehicle()
    {
        $vehicles = Vehicle::all();
        return view('admin/list_vehicle', ['vehicles' => $vehicles]);
    }

    public function vehicleDetail($id)
    {
        $vehicle = Vehicle::where('id', $id)->get();
        return view('admin/view_vehicle', ['vehicle' => $vehicle]);
    }

    public function addVehicle()
    {
        return view('admin/add_vehicle');
    }

    public function monitoringData()
    {
        $pools = DB::table('pools')
            ->join('vehicles', 'pools.vehicle_id', 'vehicles.id')
            ->select('vehicles.*', 'pools.status')
            ->where('pools.status', 'LIKE', "%" . "setuju" . "%")
            ->orderBy('pools.id', 'DESC')
            ->get();

        return view('admin/monitoring', [
            'pools' => $pools,
        ]);
    }

    public function exportToExcel()
    {
        $pools = DB::table('pools')
            ->join('vehicles', 'pools.vehicle_id', 'vehicles.id')
            ->select('vehicles.*', 'pools.status')
            ->where('pools.status', 'LIKE', "%" . "setuju" . "%")
            ->orderBy('pools.id', 'DESC')
            ->get();

        //TODO: export data to excel
    }

    public function listPool()
    {
        $pools = DB::table('pools')
            ->join('vehicles', 'pools.vehicle_id', 'vehicles.id')
            ->select('vehicles.*', 'pools.status')
            ->orderBy('pools.id', 'DESC')
            ->get();
        return view('admin/pools', ['pools' => $pools]);
    }

    public function addNewVehicle(Request $request)
    {
        $data = $request->only([
            'name',
            'vehicle_type',
            'fuel_consumption',
            'service_schedule',
            'driver',
            'agreement',
            'start_date',
            'finish_date'
        ]);

        $validator = Validator::make($data, [
            'name' => 'required',
            'vehicle_type' => 'required',
            'fuel_consumption' => 'required',
            'service_schedule' => 'required',
            'driver' => 'required',
            'agreement' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
        ]);

        $vehicle = new Vehicle();
        $vehicle->name = $request->get('name');
        $vehicle->vehicle_type = $request->get('vehicle_type');
        $vehicle->fuel_consumption = $request->get('fuel_consumption');
        $vehicle->service_schedule = $request->get('service_schedule');
        $vehicle->driver = $request->get('driver');
        $vehicle->agreement = $request->get('agreement');
        $vehicle->start_date = $request->get('start_date');
        $vehicle->finish_date = $request->get('finish_date');

        $vehicle->save();

        return redirect()->route('listVehicle');
    }

    public function updateVehicle(Request $request)
    {
        # OPTIONAL
    }

    public function deleteVehicle(Request $request)
    {
        # OPTIONAL
    }

    public function addToPool($id)
    {
        $pool = new Pool();
        $pool->vehicle_id = $id;
        $pool->status = "Menunggu Persetujuan";

        $pool->save();

        return redirect()->route('listPool');
    }
}
