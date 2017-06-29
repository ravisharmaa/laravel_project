<div class="box-body">
    <div class="form-group">
        {{Form::label('First Name')}}
        {{Form::text('firstname',isset($user->users_profile->firstname)?$user->users_profile->firstname:null,
            ['class'=>'form-control','placeholder'=>'Enter First Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('Last Name')}}
        {{Form::text('lastname',isset($user->users_profile->lastname)?$user->users_profile->lastname:null,['class'=>'form-control','placeholder'=>'Enter Last Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('Address')}}
        {{Form::text('address',isset($user->users_profile->address)?$user->users_profile->address:null,['class'=>'form-control','placeholder'=>'Enter Address'])}}
    </div>

    @if(!empty($user->users_profile->user_image))
        <div class="form-group">
            {{Form::label('Previous Image')}}
            <img src="{{route('admin.user-profile.serve', $user->users_profile->user_image)}}" class="img-thumbnail img_zoom">
        </div>
    @endif

    <div class="form-group">
        {{Form::label('User Image')}}
        {{Form::file('user_image',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('Phone Number')}}
        {{Form::text('phone_number',isset($user->users_profile->address)?$user->users_profile->address:null,['class'=>'form-control','placeholder'=>'Enter Phone Number'])}}
    </div>
    <div class="form-group">
        {{Form::label('username')}}
        {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter username'])}}
    </div>
    <div class="form-group">
        {{Form::label('Email')}}
        {{Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email Address'])}}
    </div>
    <div class="form-group">
        {{Form::label('Password')}}
        {{Form::text('password',null,['class'=>'form-control','placeholder'=>'Enter Password'])}}
    </div>
    <div class="form-group">
        {{Form::label('Confirm Password')}}
        {{Form::text('confirm_password',null,['class'=>'form-control','placeholder'=>'Retype Password'])}}
    </div>
</div>
<div class="box-footer">
    {{Form::button($btnText,['class'=>'btn btn-primary','type'=>'submit'])}}
</div>