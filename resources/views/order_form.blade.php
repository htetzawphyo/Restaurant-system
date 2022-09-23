<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                <h4>Order Form</h4>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <!-- ./row -->
            <div class="row">
                <div class="col-lg-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-0">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order Lists</a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{route('order.submit')}}" method="post">
                                @csrf
                                <div class="row ">
                                    @foreach ($dishes as $dish)
                                     <div class="card col-lg-3 col-md-4 col-sm-6 py-1" style="width: rem;">
                                        <img src="{{url('/images/'.$dish->image)}}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                          <p class="card-text h4"><strong>{{$dish->name}}</strong></p>
                                          <div class="form-outline">
                                            <label class="form-label" for="typeNumber">Choose Quantity</label>
                                            <input type="number" id="typeNumber" class="form-control" value="" name="{{$dish->id}}"/>
                                          </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="h5">Your Table</label>
                                    <select name="table" class="form-control">
                                        <option value="">Select Your Table</option>
                                        @foreach($tables as $table)
                                            <option value="{{ $table->id }}">
                                                <strong>Table</strong> {{ $table->number }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-info btn-lg">Order Now</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <div class="table table-bordered table-striped">
                                <table id="dishes" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>Dish Name</th>
                                      <th>Table Number</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                    </thead>
                                    {{-- @if ($order->status == )
                                        
                                    @endif --}}
                                    <tbody>
                                      @foreach ($orders as $order)
                                        <tr>
                                          <td>{{ $order->dish->name }}</td>
                                          <td>{{ $order->table_id }}</td>
                                          <td>{{ $status[$order->status] }}</td>
                                          <td>
                                            <a href="/order/{{$order->id}}/serve" class="btn btn-success">
                                                Serve
                                            </a>
                                          </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
