@extends('layouts.app')
@section('title','Manage Student')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Students</li>
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

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add New</a>
                  
                </div>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>DOB</th>
                  <th>Exam</th>
                  <th>Exam Date</th>
                  <th>Result</th>
                  <th>Status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>


                <tbody>
                  @foreach($student as $key =>$std)
                  <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $std['name']}}</td>
                    <td>{{ $std['dob']}}</td>
                    <td>{{ $std['ex_name']}}</td>
                    <td>{{ $std['exam_date'] }}</td>
                    <td>N\A</td>
                    <td><input type="checkbox" class="student_status" data-id="<?php echo $std['id'] ?>" <?php if($std['status']==1) {echo "checked";} ?> name="status"></td>
                    <td>
                      <a href="{{ url('admin/edit_student/'.$std['id']) }}" class="btn btn-info">Edit</a>
                      <a href="{{ url('admin/delete_student/'.$std['id']) }}" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>   
                    

                  @endforeach
                  
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>DOB</th>
                  <th>Exam</th>
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
              <!-- /.card-body -->
             
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manage Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/add_new_student')}}" class="database_operation">
          {{ csrf_field()}}
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Name</label>
         
                <input type="text" name="name" required="required" placeholder="Enter Title" class="form-control">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Email</label>
         
                <input type="text" name="email" required="required" placeholder="Enter email" class="form-control">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Mobile No</label>
         
                <input type="text" name="mobile_no" required="required" placeholder="Enter Mobile" class="form-control">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Select DOB</label>
         
                <input type="date" name="dob" required="required"  class="form-control">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Select Exam</label>
                <select class="form-control" name="exam" required="required">
                  <option value=""> Select</option>
                  @foreach($exams as $exam)
                  <option value="{{ $exam['id'] }}">{{$exam['title'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Enter Password</label>
         
                <input type="text" name="password" required="required"  class="form-control">
              </div>
            </div>

            
           <div class="col-sm-12">
              <div class="form-group">
               
                <button class="btn btn-primary">Add</button>
              </div>
            </div>  

        .
      </div>
    </form>
      
    </div>
  </div>
</div>
   </div>

 @endsection   