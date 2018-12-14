@extends('container')

@section('content')
 

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

  
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
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th width="280px">Action</th>
                                </tr>
                            @foreach ($categoria_media as $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nom_categoria_media}}</td>
                                <td>{{ $value->desc_categoria_media}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('categoria_media.show',$value->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('categoria_media.edit',$value->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['categoria_media.destroy', $value->id],'style'=>'display:inline']) !!}
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

