<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 CRUD Application</title>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/template/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="/template/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/template/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/template/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="/template/vendor/jquery/jquery.min.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

</head>
<body>
 

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administracion de contenido</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
                        <i class="fa fa-user fa-fw"></i>Bien venido {{ Auth::user()->name }}  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <!--li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li-->
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <!--div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div-->
                            <!-- /input-group -->
                             <a href="/admin"  ><i class="fa fa-files-o fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="#"  ><i class="fa fa-files-o fa-fw"></i>Galeria Multimedia<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" id="collapse">
                                <li>
                                    <a href="/multimedia#">Multimedia</a>
                                </li>                            
                                <li>
                                    <a href="/categoria_media">Categorias Multimedia</a>
                                </li>
                                <li>
                                    <a href="/tipo_media">Tipo Multimedia</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"  ><i class="fa fa-files-o fa-fw"></i>Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" id="collapse">
                                <li>
                                    <a href="/usuario">Usuario</a>
                                </li>                            
                                <li>
                                    <a href="/rol">Rol</a>
                                </li>

                            </ul>
                     
                        </li>                 
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    @yield('content')
  
</div>


 
<div class="modal fade alert" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 

    <div class="panel panel-red">
        <div class="panel-heading">
               Mensaje de confirmacion
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="panel-body">
            <p> Seguro de eliminar este archivo</p>
        </div>
        <div class="panel-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete_return_false"  >No eliminar</button>
            <button type="button" class="btn  btn-danger" id="delete_return_true"  >Eliminar</button>
        </div>
    </div>

    
</div>

<div class="modal fade alert" id="modal-multimedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 

    <div class="panel panel-red">
        <div class="panel-heading">
               Mensaje de confirmacion
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="panel-body">
         
        </div>
        <div class="panel-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete_return_false"  >No eliminar</button>
            <button type="button" class="btn  btn-danger" id="delete_return_true"  >Eliminar</button>
        </div>
    </div>

    
</div>

 <div id="concatena_id_form_delete" style="display:block">  </div>




    <script type="text/javascript">


    function mostrarArchivo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {

            if($("#tipo_media_id").val() == 1){

                $("input[name='multimedia_video']").val() == "";
             
                var html_img = "<img src='"+e.target.result+"' id='img_destino' class='img_upload'>";
                $('#box_img_upload').html(html_img);
                
            }
            if($("#tipo_media_id").val() == 3){

               $("input[name='multimedia_img']").val() == "";

                var html ="<video controls width='320' height='240'> <source id='videoid' type='video/mp4'  src='"+e.target.result+"'> </video>";
                $('#box_video_upload').html(html);            
                
            } 
//console.log(e.target.result);
//var html ="<video controls width='320' height='240'> <source id='videoid' type='video/mp4'  src='"+e.target.result+"'> </video>";
       // console.log(Base64.decode(e.target.result));

     //  $('#mp4').attr('src', e.target.result);       
        }
        reader.readAsDataURL(input.files[0]);
        }
    }


    $("input[name='multimedia_img']").change(function(){

        mostrarArchivo(this);

    }); 
    $("input[name='multimedia_video']").change(function(){

        mostrarArchivo(this);

    }); 

    $("#tipo_media_id").change(function(){
 
            
        $(".media_none_block").css("display","none");

        if(this.value ==1){

            $("#multimedia_img").css("display","block");
            
        }
        if(this.value ==2){
               
            $("#multimedia_text").css("display","block");

        }
        if(this.value ==3){

            $("#multimedia_video").css("display","block");

        }

    });


    $(".delete").click(function(k,v){
        console.log($(this).parent().parent().addClass("rojo_deliminar"));
        $("#concatena_id_form_delete").html($(this).attr("id"));

        $('#modal-confirm').modal('show');
        //$(this).next().submit();

    });

    $("#delete_return_true").click(function(){ //click en el boton confirmar del modal 

        var  id_delete =  "#"+$("#concatena_id_form_delete").html()+"_delete";
        $(id_delete).submit();

    });

    $("#delete_return_false").click(function(){ //click en el boton confirmar del modal 

        $(".gradeU").removeClass("rojo_deliminar");

    });



    $(document).ready(function(){

      

        if($("#tipo_media_id").val() ==1){

            $("#multimedia_img").css("display","block");

            
            var html_img = "<img src='/archivos_media/thumbnail/"+$("input[name='multimedia'").val()+"' id='img_destino' class='img_upload'>";
            $('#box_img_upload').html(html_img);

            
        }
        if($("#tipo_media_id").val() ==2){
               
            $("#multimedia_text").css("display","block");

            var  html = "<iframe width='160' height='120' src='https://www.youtube.com/embed/"+$("input[name='multimedia'").val()+"'  frameborder='0' allowfullscreen></iframe>";

            $("input[name='multimedia_youtube'").val("https://www.youtube.com/watch?v="+$("input[name='multimedia'").val());
            $("#video_youtube").html(html);


        }
        if($("#tipo_media_id").val() ==3){

            $("#multimedia_video").css("display","block");

            var html ="<video controls width='320' height='240'> <source id='videoid' type='video/mp4'  src='/archivos_media/videos/"+$("input[name='multimedia'").val()+"'> </video>";
            $('#box_video_upload').html(html); 



        }

 
    });


    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/template/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/template/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/template/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/template/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/template/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,


        });
    });
    </script>
            <style type="text/css">

                .content_img_list{

                    width: 160px;height: 160px; 
                    border: solid red 1px;
                    position: relative;
                }
                
       
                .img_list{
                   
                    width: 100%;
                    height: 160px; 
                    overflow: hidden;
          
       
                } 


                .content_img_upload{
                    width: 200px;height: 200px; border: solid red 1px;
                    position: relative;
                }
                
                .box_img_upload{
                    width: 100%;
                    height: 200px;
                    border: solid 1px black;
                    overflow: hidden;
                    position: absolute;
                    z-index: 1;
                }
                .img_upload{
                    height: 200px;
                    width: 100%;
         
          
       
                }                
                .btn_upload{
                    width: 100%;
                    height: 40px;
                    border: solid 1px black; 
                    position: absolute;
                    top:160px;
                    z-index: 2;                                                           
                }



                .fileinput-button {
                    position: relative;
                    overflow: hidden;
                    display: inline-block;
                    width: 100%;
                    opacity: 0.5;                    
                 }
                .fileinput-button:hover {
          
                    opacity: 1;                    
                 }
                .fileinput-button input {
                    position: absolute;
                    top: 0;
                    right: 0;
                    margin: 0;
                    opacity: 0;
                    -ms-filter: 'alpha(opacity=0)';
                    font-size: 200px !important;
                    direction: ltr;
                    cursor: pointer;
 
                }
 
 
                .content_video_upload{
                    width: 322px;
                    height: 253px;
                    border: solid red 1px;
                                }
                                
                                .box_video_upload{
                    width: 320px;
                    height: 213px;
                    /* border: solid 1px black; */
                    /* overflow: hidden; */
                    /* position: absolute; */
                    /* z-index: 1; */
                    float: left;
                }
                .video_upload{
                   
         
          
       
                }                
                .btn_video_upload{
                    width: 320px;
                    height: 40px;
                    border: solid 1px black;
                    /* overflow: hidden; */
                    /* position: absolute; */
                    /* z-index: 1; */
                    float: left;                                                           
                }



                .fileinput-button {
                    position: relative;
                    overflow: hidden;
                    display: inline-block;
                    width: 100%;
                    opacity: 0.5;                    
                 }
                .fileinput-button:hover {
          
                    opacity: 1;                    
                 }
                .fileinput-button input {
                    position: absolute;
                    top: 0;
                    right: 0;
                    margin: 0;
                    opacity: 0;
                    -ms-filter: 'alpha(opacity=0)';
                    font-size: 200px !important;
                    direction: ltr;
                    cursor: pointer;
 
                }
                .alert{
                    width: 300px;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 5%;
                }

                video{
                    margin-top: -32px;
                }

                .none_class{
                    display: none;
                }
                .rojo_deliminar{

                    background-color: #fb0000 !important;

                }


                .panel-footer {
                    padding: 10px 0px 5px 43px !important;

                }


        @media (min-width: 768px) {
            .bootstrap-vertical-nav .collapse {
                display: block;
            }
          .bootstrap-vertical-nav {
                margin-top: 50px;
            }


        }
    </style>
</body>
</html>