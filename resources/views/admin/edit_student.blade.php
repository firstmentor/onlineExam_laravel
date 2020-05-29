@extends('layouts.app')
@section('title','Dashboard')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Student</li>
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
                 <form action="{{ url('admin/edit_students_final')}}" class="database_operation">
          {{ csrf_field()}}
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Name</label>
             <input type="hidden" name="id" value="{{$student->id}}">
                <input type="text" name="name" required="required" placeholder="Enter Title" class="form-control" value="{{$student->name}}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Email</label>
         
                <input type="text" name="email" required="required" placeholder="Enter email" class="form-control" value="{{$student->email}}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Mobile No</label>
         
                <input type="text" name="mobile_no" required="required" placeholder="Enter Mobile" class="form-control" value="{{$student->mobile_no}}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Select DOB</label>
         
                <input type="date" name="dob" required="required"  class="form-control" value="{{$student->dob}}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Select Exam</label>
                <select class="form-control" name="exam" required="required">
                  <option value=""> Select</option>
                  @foreach($exams as $exam)
                  <option <?php if($student->exam==$exam['id']) { echo "selected";} ?> value="{{$exam['id'] }}">{{ $exam['title']}}</option>



                  @endforeach
                  
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Password</label>
         
                <input type="text" name="password" required="required"  class="form-control" value="{{$student->password}}">
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