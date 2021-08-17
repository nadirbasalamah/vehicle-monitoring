<?php

namespace App\Exports;

use App\Models\Pool;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class PoolsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('pools')
            ->join('vehicles', 'pools.vehicle_id', 'vehicles.id')
            ->select('vehicles.*', 'pools.status')
            ->where('pools.status', 'LIKE', "%" . "setuju" . "%")
            ->orderBy('pools.id', 'ASC')
            ->get();
    }
}
