$(document).on('submit','.database_operation',function(){
  
   //alert('texting');
   var url=$(this).attr('action');
   //alert(url);
   var data=$(this).serialize(); //data lane
   //console.log(data);
   $.post(url,data,function(fb){
    //	alert(fb);
      var resp =$.parseJSON(fb);
      //console.log(resp);
      if(resp.status=='true')
      {
      	alert(resp.message);
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

//category_status
$(document).on('click','.category_status',function(){
   var id=$(this).attr('data-id');
   //alert(id);
   $.get(Base_Url+'/admin/category_status/'+id,function(fb){  //ajex call
      alert('status successfully changed');
     // alert(fb)
   })

});

//category_status
$(document).on('click','.exam_status',function(){
   var id=$(this).attr('data-id');
   //alert(id);
   $.get(Base_Url+'/admin/exam_status/'+id,function(fb){  //ajex call
      alert('status successfully changed');
     // alert(fb)
   })

});


//student_status
$(document).on('click','.student_status',function(){
   var id=$(this).attr('data-id');
   //alert(id);
   $.get(Base_Url+'/admin/student_status/'+id,function(fb){  //ajex call
      alert('status successfully changed');
     // alert(fb)
   })

});



//Portal_status
$(document).on('click','.portal_status',function(){
   var id=$(this).attr('data-id');
   //alert(id);
   $.get(Base_Url+'/admin/portal_status/'+id,function(fb){  //ajex call
      alert('status successfully changed');
     // alert(fb)
   })

});
