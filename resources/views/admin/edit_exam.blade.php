@extends('layouts.app')
@section('title','Dashboard')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Exam Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Exam Manage</li>
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
                 <form action="{{ url('admin/edit_new_exam')}}" class="database_operation">
          {{ csrf_field()}}
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Title</label>
                <input type="hidden" name="id" value="{{$exam_master->id}}">
                <input type="text" name="title" required="required" value="{{$exam_master->title }}" placeholder="Enter Category name" class="form-control">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Select Exam Date</label>
         
                <input type="date" value="{{$exam_master->exam_date }}"name="exam_date" required="required"  class="form-control">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label>Select Exam Category</label>
                <select class="form-control" name="exam_category" required="required">
                  <option value="">Select</option>
                  @foreach($category as $cat)
                  <option <?php if($exam_master->category==$cat['id']) { echo "selected"; } ?> value="{{ $cat['id'] }}">{{$cat['name'] }}</option>
                  @endforeach
                  
                </select>
              </div>
           <div class="col-sm-12">
              <div class="form-group">
               
                <button class="btn btn-primary">Update</button>
              </div>
            </div>  

        .
      </div>
    </form>
                   
              
            </div>
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