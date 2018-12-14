<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titulo:</strong>
            {!! Form::text('nombre', null, array('placeholder' => 'Titledfdffd','class' => 'form-control')) !!}
        </div>
    </div> 
 

 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telefono:</strong>
            {!! Form::text('telefono', null, array('placeholder' => 'Descripción','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rol:</strong>
                {{ Form::select('rol_id', $select_rol, null, ['class' => 'form-control','id' => 'tipo_media_id']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estatus:</strong>
                {{ Form::select('estatus_id', $select_estatus, null, ['class' => 'form-control','id' => 'tipo_media_id']) }}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Descripción','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apellido Paterno:</strong>
            {!! Form::text('ape_pater', null, array('placeholder' => 'Descripción','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apellido Mater:</strong>
            {!! Form::text('ape_mater', null, array('placeholder' => 'Descripción','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rut:</strong>
            {!! Form::text('rut', null, array('placeholder' => 'Descripción','class' => 'form-control')) !!}
        </div>
    </div>    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::text('password', null, array('placeholder' => 'Descripción','class' => 'form-control')) !!}
        </div>
    </div>    

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

