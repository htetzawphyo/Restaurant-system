@extends('layouts.master')

    @section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Starter Page</h1>
              </div><!-- /.col -->
              
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title h3">Dishes</h3>
                      <a href="/dish/create" class="btn btn-default btn-sm float-right text-bold">
                        Create Dish
                      </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                      @endif
                      <table id="dishes" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Dish Name</th>
                          <th>Category Name</th>
                          <th>Created</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($dishes as $dish)
                            <tr>
                              <td>{{ $dish->name }}</td>
                              <td>{{ $dish->category->name }}</td>
                              <td>{{ $dish->created_at }}</td>
                              <td>
                                <div class="form-row">
                                  <a href="/dish/{{ $dish->id }}/edit" class="btn btn-warning btn-sm h-25">Edit</a>
                                <form action="/dish/{{$dish->id}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm ml-2" type="submit"
                                  onclick="return confirm('Are you sure you want to delete')"
                                  >Delete</button>
                                </form>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                
              </div>
              <!-- /.col-md-6 -->
              
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>    
    
<!-- Page data table script -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>
    $(function () {
      $("#dishes").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "pageLength": 10,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>

@endsection