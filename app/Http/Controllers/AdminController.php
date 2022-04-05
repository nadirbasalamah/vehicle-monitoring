<?php

namespace App\Http\Controllers;

use App\Charts\VehicleChart;
use App\Exports\PoolsExport;
use App\Models\Vehicle;
use App\Models\Pool;
use App\Models\User;
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
        $pools = Pool::with(['vehicle', 'agreement'])->get();

        return view('admin/pools', ['pools' => $pools]);
    }

    public function addNewVehicle(Request $request)
    {
        $data = $request->only([
            'name',
            'vehicle_type',
            'fuel_consumption',
            'service_schedule',
            'vehicle_ownership_type',
        ]);

        Validator::make($data, [
            'name' => 'required',
            'vehicle_type' => 'required',
            'fuel_consumption' => 'required',
            'service_schedule' => 'required',
            'vehicle_ownership_type' => 'required',
        ]);

        $vehicle = new Vehicle();
        $vehicle->name = $request->get('name');
        $vehicle->vehicle_type = $request->get('vehicle_type');
        $vehicle->fuel_consumption = $request->get('fuel_consumption');
        $vehicle->service_schedule = $request->get('service_schedule');
        $vehicle->vehicle_ownership_type = $request->get('vehicle_ownership_type');

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
            'vehicle_ownership_type',
        ]);

        Validator::make($data, [
            'name' => 'required',
            'vehicle_type' => 'required',
            'fuel_consumption' => 'required',
            'service_schedule' => 'required',
            'vehicle_ownership_type' => 'required',
        ]);

        $vehicle = Vehicle::find($id);

        $vehicle->name = $request->get('name');
        $vehicle->vehicle_type = $request->get('vehicle_type');
        $vehicle->fuel_consumption = $request->get('fuel_consumption');
        $vehicle->service_schedule = $request->get('service_schedule');
        $vehicle->vehicle_ownership_type = $request->get('vehicle_ownership_type');

        $vehicle->save();

        return redirect()->route('listVehicle');
    }

    public function addPool()
    {
        $vehicles = Vehicle::all();
        $agreements = User::where('role', 'agreement')->get();

        return view('admin/add_pool', compact('vehicles', 'agreements'));
    }

    public function createPool(Request $request)
    {
        $data = $request->only([
            'vehicle_id',
            'driver',
            'agreement_id',
            'start_date',
            'finish_date',
        ]);

        Validator::make($data, [
            'vehicle_id' => 'required',
            'driver' => 'required',
            'agreement_id' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
        ]);

        $pool = new Pool();

        $pool->vehicle_id = $request->get('vehicle_id');
        $pool->driver = $request->get('driver');
        $pool->agreement_id = $request->get('agreement_id');
        $pool->start_date = $request->get('start_date');
        $pool->finish_date = $request->get('finish_date');
        $pool->status = 'Menunggu Persetujuan';

        $pool->save();

        return redirect()->route('listPool');
    }
}
