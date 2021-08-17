<?php

namespace App\Http\Controllers;

use App\Charts\VehicleChart;
use App\Exports\PoolsExport;
use App\Models\Vehicle;
use App\Models\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Excel;

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
            ->where('pools.status', 'LIKE', "%" . "disetujui" . "%")
            ->orderBy('pools.id', 'ASC')
            ->get();

        $vehiclesCart = new VehicleChart;

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];

        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"
        ];

        $vehicleNames = [];
        $fuelUsages = [];

        foreach ($pools->toArray() as $key => $value) {
            $vehicleNames[] = $value->name;
            $fuelUsages[] = $value->fuel_consumption;
        }

        $vehiclesCart->labels($vehicleNames);
        $vehiclesCart->dataset('Penggunaan BBM pada Kendaraan', 'bar', $fuelUsages)
            ->color($borderColors)
            ->backgroundcolor($fillColors)
            ->fill(false);

        return view('admin/monitoring', [
            'pools' => $pools,
            'vehiclesCart' => $vehiclesCart,
        ]);
    }

    public function exportToExcel()
    {
        return Excel::download(new PoolsExport, 'VehicleData.xlsx');
    }

    public function listPool()
    {
        $pools = DB::table('pools')
            ->join('vehicles', 'pools.vehicle_id', 'vehicles.id')
            ->select('vehicles.*', 'pools.id AS pool_id', 'pools.status')
            ->orderBy('pools.id', 'ASC')
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

        Validator::make($data, [
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

    public function update($id)
    {
        $vehicle = Vehicle::where('id', $id)->get();
        return view('admin/edit_vehicle', ['vehicle' => $vehicle]);
    }

    public function updateVehicle(Request $request, $id)
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

        Validator::make($data, [
            'name' => 'required',
            'vehicle_type' => 'required',
            'fuel_consumption' => 'required',
            'service_schedule' => 'required',
            'driver' => 'required',
            'agreement' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
        ]);

        $vehicle = Vehicle::find($id);

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
    public function addToPool($id)
    {
        $pool = new Pool();
        $vehicle = Vehicle::where('id', $id)->get();

        $pool->vehicle_id = $id;
        $pool->status = "Menunggu Persetujuan " . $vehicle[0]->agreement;

        $pool->save();

        return redirect()->route('listPool');
    }
}
