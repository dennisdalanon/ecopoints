@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Coupon {{ $coupon->serial_number }}</div>
                <div class="panel-body">


<ul>
	<li>{{ $coupon->id }}</li>
	<li>{{ $coupon->serial_number }}</li>
	<li>{{ $coupon->denomination }}</li>
	<li>{{ $coupon->merchant->merchant_name }}</li>
	<li>{{ $coupon->design['file_name'] }}</li>
	<li>{{ $coupon->created_at }}</li>
	<li>{{ $coupon->project['project_name'] }}</li>
	<li>{{ $coupon->redeemed_date }}</li>	
</ul>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection