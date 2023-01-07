@extends('admin.layouts.base')

@section('title', 'Create Data Tunggal')

@section('content')
  <div class="row">
    <div class="col-md-12">

      {{-- Alert Here --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Data Tunggal</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.data_tunggal.store') }}">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="score">Score</label>
              <input type="text" class="form-control" id="score" name="score" placeholder="Enter the score">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
