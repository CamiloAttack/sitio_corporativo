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
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('categoria_media.index') }}"> Back</a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Add New Article</h2>
                                </div>

                            </div>
                        </div>

                        @if (count($errors) < 0)
                            <div class="alert alert-danger">
                                <strong><Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(array('route' => 'categoria_media.store','method'=>'POST')) !!}
                             @include('categoria_media.form')
                        {!! Form::close() !!}
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
