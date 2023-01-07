<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrekuensiDataController extends Controller
{
    public function index()
    {
        $frequencies = DB::table('data_tunggal')
            ->select('score', DB::raw('count(*) as frequency'))
            ->groupBy('score')
            ->get();

        return view('admin.frekuensi-data', [
            'frequencies' => $frequencies,
        ]);
    }
}
