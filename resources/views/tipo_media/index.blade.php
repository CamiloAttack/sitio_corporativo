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
                    <h1 class="page-header">Tipo Multimedia</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-success" href="{{ route('tipo_media.create') }}"> Crear </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th width="280px">Action</th>
                                </tr>
                            @foreach ($tipo_media as $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nom_tipo_media}}</td>
                                <td>{{ $value->desc_tipo_media}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('tipo_media.show',$value->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('tipo_media.edit',$value->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['tipo_media.destroy', $value->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
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

