@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Coupon {{ $coupon->serial_number }}</div>
                <div class="panel-body">
   
 
    {!! Form::model($coupon, ['method' => 'PATCH', 'route' => ['coupons.update', $coupon->id]]) !!}
        @include('coupons/partials/_form', ['submit_text' => 'Edit Coupon'])
    {!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
</div>
@endsection