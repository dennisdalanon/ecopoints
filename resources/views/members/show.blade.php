@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
				 		@if ($member->id == Auth::user()->id)
				   			 <strong>Member:</strong> {{ $member->first_name }} {{ $member->last_name }} <strong>Joined:</strong> {{ $member->created_at }}<span>{!! link_to_route('members.edit', 'Edit', array($member->id), array('class' => 'btn btn-info')) !!}</span>
				   		@else <strong>Member:</strong> {{ $member->first_name }} {{ $member->last_name }} <strong>Joined:</strong> {{ $member->created_at }} 
                		@endif
               </div>
                <div class="panel-body">
				<p><strong>Name:</strong> {{$member->first_name}} {{$member->last_name}}</p>
				<p><strong>Email:</strong> {{$member->email_address}}</p>
				<p><strong>Nickname:</strong> {{$member->nickname}}</p>
				<p><strong>Facebook:</strong> {{$member->facebook}}</p>
				<p><strong>Linkedin:</strong> {{$member->linkedin}}</p>

</div>
</div>
</div>
</div>
</div>
</div>

@endsection