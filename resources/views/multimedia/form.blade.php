<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titulo:</strong>
            {!! Form::text('nom_multimedia', null, array('placeholder' => 'Titledfdffd','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Categoría:</strong>
                {{ Form::select('categoria_media_id', $select_form_categoria_media, null, ['class' => 'form-control']) }}
        </div>
    </div>  
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo de archivo:</strong>
                {{ Form::select('tipo_media_id', $select_form_tipo_media, null, ['class' => 'form-control','id' => 'tipo_media_id']) }}
        </div>
    </div>
  
    <div class="col-xs-12 col-sm-12 col-md-12 media_none_block"    id="multimedia_text" style="display:none" >
        <div class="form-group">
            <strong>Archivo multimedia:</strong>
            <div  id="video_youtube"></div>            
            {!! Form::text('multimedia_youtube', null, array('placeholder' => 'Body','class' => 'form-control')) !!}

           
        </div>
    </div>                  
    {!! Form::hidden('multimedia') !!}     
    <div class="col-xs-12 col-sm-12 col-md-12 media_none_block"   id="multimedia_img"  style="display:none" >

        <strong>Archivo multimedia:</strong>

        <div class="form-group">
            <!--{!! Form::label('multimedia', 'File') !!}-->
            <div style="" class="content_img_upload"> 
                <div class="box_img_upload" id="box_img_upload" >                      
                    
                </div> 
                <div class="btn_upload">                
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Agregar imagen</span>
                       <!--{!! Form::file('multimedia') !!}-->  
                       <input name="multimedia_img" type="file"  >                                   
                    </span>
                </div>     

            </div>                
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 media_none_block"   id="multimedia_video"  style="display:none" >

        <strong>Archivo multimedia:</strong>

        <div class="form-group">
            <!--{!! Form::label('multimedia', 'File') !!}-->
            <div style="" class="content_video_upload"> 
                <div class="box_video_upload" id="box_video_upload" >                      
                    
                </div> 
                <div class="btn_video_upload">                
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Agregar Video</span>
                       <!--{!! Form::file('multimedia') !!} --> 
                       <input name="multimedia_video" type="file">  

                    </span>
                </div>     

            </div>                
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripción:</strong>
            {!! Form::text('desc_multimedia', null, array('placeholder' => 'Descripción','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

