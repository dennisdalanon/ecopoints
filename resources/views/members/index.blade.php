@extends('layouts.app')
@section('title', 'Members')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	@foreach($members as $member)
				 		@if ($member->id == Auth::user()->id)
				   			{{ $member->first_name }} {{ $member->last_name }}
                		@endif
					@endforeach
				</div>
    <div class="panel-body">

	@if ( !$members->count() )
		No members
	@else
		<ul>
			@foreach( $members as $member )
			@if ($member->id == Auth::user()->id)
				<li>
					{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('members.destroy', $member->id))) !!}
					<a href="{{route('members.show', $member->id) }}">{{ $member->first_name }} - {{ $member->last_name }}</a>
						(
                            {!! link_to_route('members.edit', 'Edit', array($member->id), array('class' => 'btn btn-info')) !!},
                            {!! Form::submit('Disable', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
				</li>
			@endif
			@endforeach
		</ul>

		<!-- Add Form Update for Members -->
		@foreach($members as $member)
		
				@if ($member->id == Auth::user()->id)
				   @if (Auth::user()->avatar !="")
				    <img src="{{ Auth::user()->avatar}}" height="100" width="100"><br />
				   @endif
				   {!! Form::model($member, ['method' => 'PATCH', 'route' => ['members.update', $member->id]]) !!}
					<label>First Name:</label> <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $member->first_name }}" required autofocus>
					<label>Last Name:</label><input id="last_name" type="text" class="form-control" name="last_name" value="{{ $member->last_name }}" autofocus>
					<label>Facebook:</label><input id="facebook" type="text" class="form-control" name="facebook" value="{{ $member->facebook }}" autofocus>
					<label>Twitter:</label><input id="twitter" type="text" class="form-control" name="twitter" value="{{ $member->twitter }}" autofocus>
					<label>linkedIn:</label><input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ $member->linkedin }}" autofocus>
					{{ Form::submit('Update', ['class' => 'btn btn-danger']) }}
				 {!! Form::close() !!}
                @endif
		
		@endforeach
		<!-- End Form Update for Members -->
	</div>
</div>
</div>
</div>
</div>
</div>
	@endif
@endsection
