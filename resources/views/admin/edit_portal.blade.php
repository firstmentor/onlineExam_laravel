@extends('layouts.app')
@section('title','Edit Portal ')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Portal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Portal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              
              <div class="card-body">
                 <form action="{{ url('admin/edit_portal_final')}}" class="database_operation">
          {{ csrf_field()}}
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Name</label>
             <input type="hidden" name="id" value="{{$p->id}}">
                <input type="text" name="name" required="required" placeholder="Enter Title" class="form-control" value="{{$p->name}}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Email</label>
         
                <input type="text" name="email" required="required" placeholder="Enter email" class="form-control" value="{{$p->email}}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Mobile No</label>
         
                <input type="text" name="mobile" required="required" placeholder="Enter Mobile" class="form-control" value="{{$p->mobile}}">
              </div>
            </div>
            
           
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Password</label>
         
                <input type="text" name="password" required="required"  class="form-control" value="{{$p->password}}">
              </div>
            </div>

            
           <div class="col-sm-12">
              <div class="form-group">
               
                <button class="btn btn-primary">Update</button>
              </div>
            </div>  

      </div>
    </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
              
          

   </div>




@endsection   