<div class="box-body">
    <div class="form-group">
        {{Form::label('Key')}}
        {{Form::text('key',null,['class'=>'form-control','placeholder'=>'Enter Key'])}}
    </div>
    <div class="form-group">
        {{Form::label('Value')}}
        {{Form::text('value',null,['class'=>'form-control','placeholder'=>'Enter Value'])}}
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