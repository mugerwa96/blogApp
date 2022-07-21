@extends('layouts.app')
@section('content')
  
<div class="container py-5">
    <div class="row justify-content-center align-item-center">
        <div class="col-md-6 py-3">
            <div class="card p-3 shadow">
                <div class="message"></div>
                <form id="add_new_post" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="fw-bold"><i class="fas fa-plus-circle mx-2"></i>Add Post</p>
                    <div class="mb-3">
                      
                      <input type="text" class="form-control" id="title" name="title" placeholder="Post title">
                        <div class="error_in_title"></div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="description"></textarea>
                        <div class="error_in_description"></div>  
                    </div>
                      <div class="mb-3">
                            <input  type="file" class="form-control" name="file" id="file" >
                      </div>
                    <button type="submit"  id="savebtn"class="btn btn-primary"><i class="fab fa-telegram"></i> ADD</button>
                </form>
                </div>
              
        </div>
    </div>
</div>
@endsection

@section('scripts')
   <script>
    $(document).ready(function(){
           
           // title validation
           var error_in_title=false;
           $('#title').keyup(function(){
               check_title();
           });
           function check_title(){
               var title=$('#title').val();
               if(title.length=="")
               {
                   error_in_title=true;
                   $('#title').css("border","1.5px solid red");
                   $('.error_in_title').show();
                   $('.error_in_title').html("<small style='color:red;'><i class='fa fa-times-circle mx-2'></i>Title required</small>");
                   $('#savebtn').attr("disabled",true);
               }else{
                   error_in_title=false;
                   $('#title').css("border","");
                   $('.error_in_title').show();
                   $('.error_in_title').html("<small style='color:red;'></small>");
                   $('#savebtn').attr("disabled",false);
               }
           }
       
           // decription validation
           var error_in_description=false;
           $('#description').keyup(function(){
               check_description();
           });
           function check_description(){
               var description=$('#description').val();
               if(description.length=="")
               {
                   error_in_description=true;
                   $('#description').css("border","1.5px solid red");
                   $('.error_in_description').show();
                   $('.error_in_description').html("<small style='color:red;'><i class='fa fa-times-circle mx-2'></i>description required</small>");
                   $('#savebtn').attr("disabled",true);
               }else{
                   error_in_description=false;
                   $('#description').css("border","");
                   $('.error_in_description').show();
                   $('.error_in_description').html("<small style='color:red;'></small>");
                   $('#savebtn').attr("disabled",false);
               }
           }
       
           $('#add_new_post').submit(function(e){
                   
               e.preventDefault()
             const formData=new FormData(this);
          
              check_description();
              check_title();
            //   check_image();
               
       
              if(error_in_description==false && error_in_title==false )
              {
                   $.ajax({
                      
                       url:"{{route('blog.store')}}",
                       data:formData,
                       method:"post",
                       contentType:false,
                       processData:false,
                       success:function(response)
                       {
                       
                        $("#add_new_post")[0].reset();
                            if(response==1){
                                $('.message').html('<div class="alert alert-success" role="alert">Saved post</div>');
                            }
                            setTimeout(() => {
                                $('.message').hide()
                            }, 1000);
                            $('.message').show();
                        }
                       ,error:function(){
                           console.log("Error in sending form data");
                       }
                   })
              }
              else
              {
              return false;
              }
           })
       })
   </script>
@endsection