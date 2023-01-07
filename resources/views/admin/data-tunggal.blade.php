@extends('admin.layouts.base')

@section('title', 'Data Tunggal')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Tunggal</h3>
        </div>

        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          {{-- button create, import, export --}}
          <div class="d-flex">
            <div class="row mr-2">
              <div class="col-md-12">
                <a href="{{ route('admin.data_tunggal.create') }}" class="btn btn-success mb-2">Create Data</a>
              </div>
            </div>
            <div class="row mr-2">
              <div class="col-md-12">
                <a href="{{ route('admin.data_tunggal.export') }}" class="btn btn-secondary mb-2">Export Data</a>
              </div>
            </div>
            <div class="row mr-2">
              <div class="col-md-12">
                {{-- Button Trigger --}}
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#importModal">Import Data</button>

                {{-- Modal --}}
                <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="Import Data" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="Import Data">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('admin.data_tunggal.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                          <div class="custom-file">
                            <input type="file" class="" id="myFile" name="file">
                            {{-- <label class="custom-file-label" for="myFile">Choose file</label> --}}
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="uploadFile">Import</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- end button --}}

          <div class="row">
            <div class="col-md-12">
              <table id="data_tunggal" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Number</th>
                    <th>Score</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach ($data_tunggal as $data)
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $data->score }}</td>
                      <td class="d-flex">
                        <a href="{{ route('admin.data_tunggal.edit', $data->id) }}" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteData">
                          <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteLabel">Delete Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are you sure to delete this Data?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('admin.data_tunggal.destroy', $data->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
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
    $('#deleteData').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
    $('#importData').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  </script>
@endsection
