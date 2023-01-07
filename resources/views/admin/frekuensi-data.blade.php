@extends('admin.layouts.base')

@section('title', 'Frekuensi Data')

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
                    <th>Number</th>
                    <th>Score</th>
                    <th>Frequency</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach ($frequencies as $frequency)
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $frequency->score }}</td>
                      <td>{{ $frequency->frequency }}</td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    $('#data_tunggal').DataTable();
  </script>
@endsection
