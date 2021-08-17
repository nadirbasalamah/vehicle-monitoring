<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pool;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    public function index()
    {
        return view('agreement/index');
    }

    public function pools()
    {
        $pools = DB::table('pools')
            ->join('vehicles', 'pools.vehicle_id', 'vehicles.id')
            ->select('vehicles.*', 'pools.status')
            ->orderBy('pools.id', 'ASC')
            ->get();

        return view('agreement/pools', ['pools' => $pools]);
    }

    public function viewPool($id)
    {
        $pool = DB::table('pools')
            ->join('vehicles', 'pools.vehicle_id', 'vehicles.id')
            ->select('vehicles.*', 'pools.status')
            ->where('pools.id', '=', $id)
            ->orderBy('pools.id', 'ASC')
            ->get();

        return view('agreement/view_pool', ['pool' => $pool]);
    }

    public function verifyVehicle(Request $request, $id)
    {
        //TODO: implement verifyVehicle with actual user
        $pool = Pool::find($id);

        $status = '';

        if ($request->get('status') == 'agree') {
            $status = "Disetujui oleh penyetuju";
        } else {
            $status = "Ditolak oleh penyetuju";
        }

        $notes = $request->get('notes');

        $pool->status = $status . ", " . $notes;

        $pool->save();

        return redirect()->route('pools');
    }
}
