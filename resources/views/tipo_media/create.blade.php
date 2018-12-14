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
                            <a class="btn btn-primary" href="{{ route('tipo_media.index') }}"> Back</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
		 

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

						    {!! Form::open(array('route' => 'tipo_media.store','method'=>'POST')) !!}
						         @include('tipo_media.form')
						    {!! Form::close() !!}
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

