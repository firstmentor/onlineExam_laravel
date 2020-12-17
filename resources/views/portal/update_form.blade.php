@extends('layouts.portal')
@section('title','Dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Form</li>
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
                <div class="row">
                    <div class="col-sm-6">
                      <h3></h3>
                    </div>
                    <div class="col-sm-6">
                      <h3><span class="float-right"></span></h3>
                    </div>
                </div>
                <form action="{{ url('portal/student_exam_info')}}" method="get">
                  {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Mobile No</label>
                        <input type="text" name="mobile_no" class="form-control">
                      </div>  
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter DOB</label>
                        <input type="date" name="dob" class="form-control">
                      </div>  
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Select Exam</label>
                        <select class="form-control" name="exam">
                          <option value="">Seletc</option>
                           @foreach($exams as $exam)
                           <option  value="{{ $exam['id']}}"> {{ $exam['title'] }}</option>
                           @endforeach                        

                        </select>
                      </div>  
                    </div>

                    

                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-info"> Save</button>
                      </div>  
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