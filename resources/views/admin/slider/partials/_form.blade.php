<div class="box-body">
    <div class="form-group">
        {{Form::label('Slider Image')}}
        <input type="file" id="sliderImage" name="slider_image"> <br>
        <img src="" id="imgPreview" class="img-responsive" height="100px" width="100px">
    </div>

    <div class="form-group">
        {{Form::label('Slider Text')}}
        {{Form::text('slider_text',null,['class'=>'form-control','placeholder'=>'Enter Slider Text'])}}
    </div>
    <div class="form-group">
        {{Form::label('order')}}
        {{Form::number('order',null,['class'=>'form-control','placeholder'=>'Enter Order'])}}
    </div>
    <div class="form-group">
        {{Form::label('Status')}}
        {{Form::radio('status',1,true)}}Active
        {{Form::radio('status',0)}}In-Active
    </div>
</div>
<div class="box-footer">
    {{Form::button($btnText,['class'=>'btn btn-primary','type'=>'submit'])}}
</div>