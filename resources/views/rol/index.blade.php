@extends('container')

@section('content')
 

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
    @endif


    </table>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rol Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-success" href="{{ route('rol.create') }}"> Crear</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>                                        
                                        <th width="110px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     @foreach ($rol as $value)
                                        <tr class="gradeU">
                                        <td>{{ $value->id}}</td>                                        
                                        <td>{{ $value->nombre}}</td>
                                        <td>{{ $value->descripcion}}</td>     
                                        <td class="center">            
                                        <a class="btn btn-info" href="{{ route('rol.show',$value->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                        <a class="btn btn-primary" href="{{ route('rol.edit',$value->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
                                         <a class="btn btn-danger delete" id="{{$value->id }}_form" >
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>         
                                         </a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['rol.destroy', $value->id],'style'=>'display:inline','id'=>$value->id.'_form_delete']) !!}
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

