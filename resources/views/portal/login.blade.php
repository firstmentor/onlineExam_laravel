<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style type="text/css">
  .signUp_container{
    width: 60%;
    height: 400px;
    border: 1px solid;
    border-radius: 35px;
    padding: 21px;
    margin-top: 50px;
    margin-left:20%; 
  }
  
</style>  
</head>
<body>
  <div class="container">
    <div class="signUp_container">
      <div class="signUp_title">
        <h3 class="text-center">Portal Login</h3>

        <hr>
        @if(session('message'))

         <p class ="alert alert-success">
          {{session('message')}}
         </p>
          
       @endif
      </div>  
<form action="{{ url('portal/login_sub') }}" method="post">
        {{csrf_field()}}
      <div class="signUp_form">
        <div class="row">
          
          <div class="col-sm-12">
             <div class="form-group"> 
              <label>Enter Email</label>
              <input type="text" name="email" placeholder="Enter Email" class="form-control">
            </div>  
          </div>
          
          <div class="col-sm-12">
             <div class="form-group"> 
              <label>Enter Password</label>
              <input type="password" name="password" placeholder="Enter Mobile No" class="form-control">
            </div>  
          </div>
          <div class="col-sm-12">
             <div class="form-group"> 
              <button class="btn btn-info btn-block"> Login</button>
            </div>  
          </div>
          <div class="col-sm-12">
             <div class="form-group text-center"> 
             or
            </div>  
          </div>
          <div class="col-sm-12">
             <h5 class="text-right"><a class="btn btn-primary btn-block" href="{{'signup'}}">Sign Up</a></h5>
          </div>


          
          </div>      
      </div>
  </form> 
</div>
</div>



<script type="text/javascript">
  $(document).on('submit','.database_operation',function(){
  
   //alert('texting');
   var url=$(this).attr('action');
   alert(url);
   var data=$(this).serialize(); //data lane
   //alert(data);
   $.post(url,data,function(fb){
    //  alert(fb);
      var resp =$.parseJSON(fb);
      //alert(resp);
      if(resp.status=='true')
      {
        //alert(resp.message);
        setTimeout(function(){
          window.location.href=resp.reload;
        },1000);
      }
      else
      {
         alert(resp.message);
      }   


   })

   return false;
});
</script>
</body>
</html>
