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
                      <h3 class="card-title h3">Order Listing</h3>
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
                          <th>Table Number</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                            <tr>
                              <td>{{ $order->dish->name }}</td>
                              <td>{{ $order->table_id }}</td>

            {{-- compact နဲ့ ပါလာတဲ့ status က array ထဲမှာ ရှိနေတဲ့အတွက် အရင်ဆုံး status ဆိုပြီး သုံးရတယ်။ ပြီးမှ array ထဲက တဆင့် ပြန်ထောက်ရတယ်။ (order->status) ဆိုတာက number ထွက်လာမှ --}}
                              <td>{{ $status[$order->status] }}</td>
                              <td>
                                <div>
                                  <a href="/order/{{$order->id}}/approve" 
                                    class="btn btn-info btn-sm">Approve</a>
                                  <a href="/order/{{$order->id}}/cancel" class="btn btn-danger btn-sm">Cancel</a>
                                  <a href="/order/{{$order->id}}/ready" class="btn btn-success btn-sm">Ready</a>
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
        "searching": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>

@endsection