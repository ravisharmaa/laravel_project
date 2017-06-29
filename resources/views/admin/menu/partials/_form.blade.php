<div class="box-body">
    <div class="form-group">
        {{Form::label('Menu Name')}}
        {{Form::text('name',null,
            ['class'=>'form-control','placeholder'=>'Enter Menu Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('Choose Parent')}}
        {{Form::select('parent_id',isset($dropDownMenus)?$dropDownMenus:null,null,['class'=>'form-control','placeholder'=>'Choose Parent'])}}
    </div>

    <div class="form-group">
        {{Form::label('Menu Url')}}
        {{Form::text('url',null,['class'=>'form-control','placeholder'=>'Enter Menu Url'])}}
    </div>

    <div class="form-group">
        {{Form::label('Menu Order')}}
        {{Form::text('order',null,['class'=>'form-control','placeholder'=>'Enter Order'])}}
    </div>

    <div class="form-group">
        {{Form::label('Status')}}
        {{Form::radio('status','1',true)}}Active
        {{Form::radio('status','0')}}De-Active
    </div>

</div>
<div class="box-footer">
    {{Form::button($btnText,['class'=>'btn btn-primary','type'=>'submit'])}}
</div>