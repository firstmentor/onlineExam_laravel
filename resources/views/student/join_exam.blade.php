@extends('layouts.student')
@section('title','Join Exam')
@section('content')
<style>
   .question_option>li{
    list-style: none;
    height: 50px;
    line-height: 50px;
   }
</style>



    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Join Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Join Exams</li>
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
                <h3 class="card-title">Join Exam</h3>

                
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <h3>Time : 3 Hrs</h3>
                  </div>
                  <div class="col-sm-4"> 
                    
                    <h3 class="text-center">Time : 3:00:00</h3>

                  </div>
                  <div class="col-sm-4"> 

                    <h3 class="text-right">Status : Pending</h3>

                  </div> 
                   
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


          <!------------------ card  2----------------------------------------------------->
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Question</h3>

                
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <p><b>1. Question Description</b></p>

                    <ul class="question_option mt-4">
                      <li><input type="radio" name="ans1"> Option 1</li>
                      <li><input type="radio" name="ans1"> Option 2</li>
                      <li><input type="radio" name="ans1"> Option 3</li>
                      <li><input type="radio" name="ans1"> Option 4</li>
                    </ul>  


                  </div>

                  <div class="col-sm-12">
                    <p><b>2. Question Description</b></p>

                    <ul class="question_option mt-4">
                      <li><input type="radio" name="ans1"> Option 1</li>
                      <li><input type="radio" name="ans1"> Option 2</li>
                      <li><input type="radio" name="ans1"> Option 3</li>
                      <li><input type="radio" name="ans1"> Option 4</li>
                    </ul>  


                  </div> 


                  <div class="col-sm-12">
                    <p>3. Question Description</p>

                    <ul class="question_option mt-4">
                      <li><input type="radio" name="ans1"> Option 1</li>
                      <li><input type="radio" name="ans1"> Option 2</li>
                      <li><input type="radio" name="ans1"> Option 3</li>
                      <li><input type="radio" name="ans1"> Option 4</li>
                    </ul>  


                  </div> 


                  <div class="col-sm-12 mt-4">
                    <p>4. Question Description</p>

                    <ul class="question_option">
                      <li><input type="radio" name="ans1"> Option 1</li>
                      <li><input type="radio" name="ans1"> Option 2</li>
                      <li><input type="radio" name="ans1"> Option 3</li>
                      <li><input type="radio" name="ans1"> Option 4</li>
                    </ul>  


                  </div>


                  <div class="col-sm-12 mt-4">
                   
                   <button class="btn btn-info btn-block">Submit</button>


                  </div>   



                </div>    
                  
              
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        
        <!------------------ card  2  end  ----------------------------------------------------->







      
    </section>
    <!-- /.content -->
              
  </div>


  @endsection