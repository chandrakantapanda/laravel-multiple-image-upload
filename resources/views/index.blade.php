<html lang="en">
    <head>
        <title>How To Upload Multiple Image In Laravel 8 </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>  
        <div class="container lst">  
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> something went wrong <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
          
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div> 
            @endif
          
            <h3 class="well">How To Upload Multiple Image In Laravel 8 </h3>
         
            <form method="post" action="{{url('file')}}" enctype="multipart/form-data">
                @csrf      
                <div class="input-group demo control-group lst increment" >
                    <input type="file" name="image_path[]" class="myfrm form-control">
                    <div class="input-group-btn"> 
                        <button class="btn btn-success add_btn" type="button">Add</button>
                    </div>
                </div>
                <div class="clone hide d-none">
                    <div class="demo control-group lst input-group" style="margin-top:10px">
                        <input type="file" name="image_path[]" class="myfrm form-control">
                        <div class="input-group-btn"> 
                            <button class="btn btn-danger remove_btn" type="button">Remove</button>
                        </div>
                    </div>
                </div>      
                <button type="submit" class="btn btn-success submit_btn" style="margin-top:10px">Submit</button>      
            </form>        
        </div>
        <h4><i class="glyphicon glyphicon-picture"></i> Display Data Image    </h4>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr><th>#</th>
                <th>Picture</th>
            </tr>
            </thead>
            <tbody> 
            @foreach($images as $image)
            <tr>
                <td>{{$image->name}}</td>
                <td>
                    <img src="{{url('/files/'.$image->image_path)}}" style="height:120px; width:200px"/>
                    
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>



        <script type="text/javascript">
            $(document).ready(function() {
              $(".add_btn").click(function(){ 
                  var lsthmtl = $(".clone").html();
                  $(".increment").after(lsthmtl);
              });
              $("body").on("click",".remove_btn",function(){ 
                  $(this).parents(".demo").remove();
              });
            });
        </script>  
    </body>
</html>