<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataTunggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeskripsiDataController extends Controller
{
    public function index()
    {
        return view('admin.deskripsi-data', [
            'average' => DataTunggal::avg('score'),
            'min' => DataTunggal::min('score'),
            'max' => DataTunggal::max('score'),
            'std_dev' => $this->standardDeviation(),
            'frequencies' => $this->frequencyData(),
        ]);
    }
    public function standardDeviation()
    {
        $data = DataTunggal::get('score');
        $mean = (float) DataTunggal::avg('score');
        $n = count($data);
        $distance_sum = 0;

        foreach ($data as $key) {
            $distance_sum += ($key['score'] - $mean) ** 2;
        }

        $variance = $distance_sum / $n;
        $std_dev = $variance / $n;
        return $std_dev;
    }
    public function frequencyData()
    {
        $frequencies = DB::table('data_tunggal')
            ->select('score', DB::raw('count(*) as frequency'))
            ->groupBy('score')
            ->get();

        return $frequencies;
    }
}
