@extends('container')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show value</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categoria_media.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $categoria_media->nom_categoria_media}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Body:</strong>
                {{ $categoria_media->desc_categoria_media}}
            </div>
        </div>
    </div>
@endsection