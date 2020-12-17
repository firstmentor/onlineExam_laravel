@extends('layouts.student')
@section('title','Dashboard')
@section('content')



    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Exams</li>
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
              <div class="card-header">
                <h3 class="card-title">Title</h3>

                
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Exam Title</th>
                  <th>Exam Date</th>
                  <th>Result</th>
                
                  <th>Status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>{{$student_info->title}}</td>
                    <td>{{$student_info->exam_date}}</td>
                    <td>
                      <?php
                      if(strtotime($student_info->exam_date)<strtotime(date('Y-m-d')))
                      {
                          echo "Completed";
                      }
                      else if(strtotime($student_info->exam_date)==strtotime(date('Y-m-d')))
                      {
                         echo "Running";
                      }  
                      else
                      {
                        echo "pending";
                      }
                      ?>
                      </td>
                    <td></td>
                    <td><a href="{{url('student/join_exam')}}" class="btn btn-info">Join Exam</a></td>
                  </tr>

               
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Exam Title</th>
                  <th>Exam Date</th>
                  <th>Result</th>
                
                  <th>Status</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
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
</section>

  @endsection