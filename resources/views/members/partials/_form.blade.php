<div class="form-group">
    {!! Form::label('id', 'Member ID:') !!}
    {!! Form::text('id') !!}
</div>
<div class="form-group">
	{!! Form::label('first_name', 'First Name:') !!}
	{!! Form::text('first_name') !!}
</div>
<div class="form-group">
	{!! Form::label('last_name', 'Last Name:') !!}
	{!! Form::text('last_name') !!}
</div>
<div class="form-group">
	{!! Form::label('created_at', 'Created:') !!}
	{!! Form::date('created_at', 'created_at') !!}
</div>
<div class="form-group">
	{!! Form::label('email_address', 'Email Address:') !!}
	{!! Form::text('email_address') !!}
</div>
<div class="form-group">
    {!! Form::submit('Update', ['class'=>'btn primary']) !!}
</div>