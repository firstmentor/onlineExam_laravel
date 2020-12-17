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
            <h1 class="m-0 text-dark">Manage Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Exam</li>
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
                      <h3>{{$exam_title}}</h3>
                    </div>
                    <div class="col-sm-6">
                      <h3><span class="float-right">{{ date('d M,Y',strtotime($exam_date)) }}</span></h3>
                    </div>
                </div>
                <form action="{{ url('portal/exam_from_submit')}}" class="database_operation">
                  {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Name</label>
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="text" name="name" class="form-control">
                      </div>  
                    </div>

                    


                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter E-Mail</label>
                        <input type="email" name="email" class="form-control">
                      </div>  
                    </div>

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
                        <label>Enter Password</label>
                        <input type="text" name="password" class="form-control">
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