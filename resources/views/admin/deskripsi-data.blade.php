@extends('admin.layouts.base')

@section('title', 'Deskripsi Data')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Tunggal</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table id="data_tunggal" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Average</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Standard Deviation</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $average }}</td>
                    <td>{{ $min }}</td>
                    <td>{{ $max }}</td>
                    <td>{{ $std_dev }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection