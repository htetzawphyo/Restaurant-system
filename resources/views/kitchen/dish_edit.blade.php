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
                      <h3 class="card-title h3">Dishes Edit</h3>
                      <a href="/dish" class="btn btn-default btn-sm float-right text-bold">
                        Back
                      </a>
                    </div>
                    <!-- /.card-header -->
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
                      <form action="/dish/{{ $dish->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $dish->name) }}">    
                        </div>
                        <div class="mb-3">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="">Open select category menu</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{$category->id == $dish->category_id ? 'selected' : ''}}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="d-block">Image</label>
                            <img src="{{ url('/images/'.$dish->image) }}" alt="" width="200" class="d-block mb-1">
                            <input type="file" name="dish_image" class="form-upload">    
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
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
    <!-- ====================================================================== -->
    
    @endsection