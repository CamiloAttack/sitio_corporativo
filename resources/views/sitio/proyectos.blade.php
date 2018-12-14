<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

 <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <title>JS Bin</title>



</head>



<body>
    
    <div id="app" > 
  

      <galeria></galeria>

    </div>  

 </body>
    <script type="text/javascript">

window.App = {
    errors: {!! json_encode($errors->toArray()) !!},
    $multimedia: {!! json_encode($multimedia) !!},
    $length_paginacion: {!! json_encode($length_paginacion) !!}
}

 

</script>
    <script type="text/javascript" src=" https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" /> 
    <script src="{{ elixir('js/app.js') }}"></script> 

    <!-- Required scripts -->


  <style type="text/css">

  .container-fluid{

    width: 87%

  }
    #next{

        position: absolute;
        top: 40%;
        left: 98%;
      width: 100px;
      height:100px;
      border: solid 3px #fff
    }
    #prev{

          position: absolute;
        top: 40%;
        left: -10%;
      width: 100px;
      height:100px; 
      border: solid 3px #fff

    }

    .modal-dialog{

     /* width: 180%;*/
      height: 500px;

      max-width: 900px;
    }
    .modal-content{
      border-radius: 20px;
     /* width: 180%;*/
      height: 520px;

      width:100%;



    }
    .modal-body{
      border-radius: 20px;
      width:900px;
      height:500px;
      line-height:400px;
      margin:0px auto;
      text-align:center;
      background: #000;
    }

    .modal-body img{

     /* width: 180%;*/
      vertical-align:middle;
      height:485px;
    }
    .modal-header,.btn-secondary,.btn-primary{
      display: none;
    }
    .modal-footer{
      height: 0px;

 
    padding: 0rem; 
     border-top:0px solid #e9ecef;  

    }
    #prev:hover,#next:hover{

      border:solid 3px red; 
 



    }

    .imgModal{
     
      -webkit-animation: anima 2s;
    }

    @-webkit-keyframes anima{    
        0%{opacity:0}
        50%{opacity:1} 
        100%{opacity:2}
    }    




input[type = "radio"]{ display:none;/*position: absolute;top: -1000em;*/}
label{ color:grey;}

.clasificacion{
    direction: rtl;
    unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label{color:orange;}
input[type = "radio"]:checked ~ label{color:orange;}

.bg-info {
    background-color: #000 !important;
}
.nav-link{
    color: #ffffff;
    font-weight: 900;
    text-shadow: 1px 1px #992d2d, -1px -1px #333;

  
}


  </style>


</html>