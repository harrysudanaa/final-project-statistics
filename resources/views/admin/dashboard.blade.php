@extends('admin.layouts.base')

@section('title', 'Dashboard')

@section('content')
  <div class="card w-25 card-primary">
    <div class="card-header">
      <h3 class="card-title">Total Data</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      {{ $total }}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
