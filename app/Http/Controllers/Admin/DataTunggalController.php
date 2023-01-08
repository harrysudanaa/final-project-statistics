<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataTunggalExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\DataTunggalImport;
use App\Models\DataTunggal;
use Illuminate\Http\Request;

class DataTunggalController extends Controller
{
    public function export()
    {

        return Excel::download(new DataTunggalExport, 'data_tunggal.xlsx');
    }

    public function import(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        if ($request->hasFile('file')) {
            $request->file('file')->storeAs('imports', rand() . $fileName, 'public');
        }
        (new DataTunggalImport)->import($request->file('file'), null, \Maatwebsite\Excel\Excel::XLSX);

        return redirect('/admin/data_tunggal')->with('toast_success', 'Import Successfully!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_tunggal = DataTunggal::all();
        return view('admin.data-tunggal', ['data_tunggal' => $data_tunggal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-tunggal-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // // check in range
        // Validator::extend('no_in_range', function ($attribute, $value, $parameters) {
        //     return (($value < 0) && ($value > 100)) ? true : false;
        // });
        // $message = [
        //     'score.no_in_range' => 'The score must be in range of 0 - 100',
        // ];
        $request->validate([
            'score' => 'required|numeric'
        ]);
        DataTunggal::create($data);
        return redirect('admin/data_tunggal')->with('toast_success', 'Data Created Successfully!');
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_tunggal = DataTunggal::where('id', $id)->first();
        return view('admin.data-tunggal-edit', ['data_tunggal' => $data_tunggal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data_tunggal = DataTunggal::where('id', $id)->first();
        $request->validate([
            'score' => 'required|numeric'
        ]);
        $data_tunggal->update($data);
        return redirect('admin/data_tunggal')->with('toast_success', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataTunggal::where('id', $id)->first()->delete();
        return redirect('admin/data_tunggal')->with('toast_success', 'Data Deleted Successfully!');
    }
}
