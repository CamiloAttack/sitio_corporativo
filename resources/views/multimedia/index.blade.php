@extends('container')

@section('content')
 

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

 
    </table>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Galeria Multimedia</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-success" href="{{ route('multimedia.create') }}"> Crear Multimedia</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>tipo</th>            
                                        <th>Archivo</th>            
                                        <th width="55px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     @foreach ($multimedia as $value)
                                        <tr class="gradeU">
                                        <td>{{ $value->id}}</td>                                        
                                        <td>{{ $value->nom_multimedia}}</td>
                                        <td>{{ $value->CategoriaMedia->nom_categoria_media}}</td>
                                        <td>{{ $value->TipoMedia->nom_tipo_media}}</td>
                                        <td class="center">
                                        @php
                                        switch ($value->tipo_media_id) 
                                        {
                                            case 1:
                                                echo " <div  class='content_img_list'> <img src='/archivos_media/thumbnail/$value->multimedia' id='img_destino' class='img_list'>
                                                </div> " ;
                                                break;
                                            case 2:
                                                echo "  <iframe width='160' height='120' src='https://www.youtube.com/embed/$value->multimedia'  frameborder='0' allowfullscreen></iframe>";
                                                break;                    
                                            case 3:
                                                echo "  <video width='160' height='120' controls>
                                                            <source src='/archivos_media/videos/$value->multimedia' type='video/mp4'>
                                                            <source src='movie.ogg' type='video/ogg'>
                                                            Your browser does not support the video tag.
                                                        </video>";
                                        }
                                        @endphp
                                        </td>
                                        <td class="center">            
                                        <!--a class="btn btn-info" href="{{ route('multimedia.show',$value->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a-->

                                        <a class="btn btn-primary" href="{{ route('multimedia.edit',$value->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
                                         <a class="btn btn-danger delete" id="{{$value->id }}_form" >
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>         
                                         </a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['multimedia.destroy', $value->id],'style'=>'display:inline','id'=>$value->id.'_form_delete']) !!}
                                        {!! Form::submit('', ['class' => 'btn btn-danger delete none_class']) !!}
                                        {!! Form::close() !!}
                                        </td>
                                    
                                    </tr>
                                    @endforeach                        
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
 @endsection

