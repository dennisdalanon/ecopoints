<div class="form-group">
    {!! Form::label('id', 'ID:') !!}
    {!! Form::text('id') !!}
</div>
<div class="form-group">
    {!! Form::label('serial_number', 'Serial No:') !!}
    {!! Form::text('serial_number') !!}
</div>
<div class="form-group">
    {!! Form::label('project_id', 'Project ID:') !!}
    {!! Form::text('project_id') !!}
</div>
<div class="form-group">
	{!! Form::label('merchant_id', 'Merchant:') !!}
	{!! Form::text('merchant_id') !!}
</div>
<div class="form-group">
	{!! Form::label('created_at', 'Created:') !!}
	{!! Form::date('created_at', 'created_at') !!}
</div>
<div class="form-group">
	{!! Form::label('project_id', 'Project:') !!}
	{!! Form::select('project_id', $projects) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update', ['class'=>'btn primary']) !!}
    {!! Form::button('Donate', ['class'=>'btn primary']) !!}
</div>