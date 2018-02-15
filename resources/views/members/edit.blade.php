@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Member {{ $member->first_name }} {{ $member->last_name }}</div>
                <div class="panel-body">
   
 
    {!! Form::model($member, ['method' => 'PATCH', 'route' => ['members.update', $member->id]]) !!}
        @include('members/partials/_form', ['submit_text' => 'Edit Coupon'])
    {!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
</div>
@endsection