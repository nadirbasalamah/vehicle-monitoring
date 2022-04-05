<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pool;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    public function index()
    {
        return view('agreement/index');
    }

    public function pools()
    {
        $userId = Auth::id();

        $pools = Pool::with(['vehicle', 'agreement'])->where('agreement_id', $userId)->get();

        return view('agreement/pools', ['pools' => $pools]);
    }

    public function viewPool($id)
    {
        $pool = Pool::with(['vehicle'])->where('id', $id)->get();

        return view('agreement/view_pool', ['pool' => $pool]);
    }

    public function verifyVehicle(Request $request, $id)
    {
        $pool = Pool::find($id);

        $status = '';

        if ($request->get('status') == 'agree') {
            $status = "Disetujui oleh " . Auth::user()->name;
        } else {
            $status = "Ditolak oleh " . Auth::user()->name;
        }

        $notes = $request->get('notes');

        $pool->status = $status . ", " . $notes;

        $pool->save();

        return redirect()->route('pools');
    }
}
