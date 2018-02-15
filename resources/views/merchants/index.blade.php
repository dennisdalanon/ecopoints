@extends('layouts.app')
@section('title', 'Merchants')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	
				</div>
    <div class="panel-body">

	<h2>Coupons</h2>
	@if ( !$coupons->count() )
		No coupons
	@else
		<ul>
			@foreach( $coupons as $coupon )
				<li>
					{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('coupons.destroy', $coupon->serial_number))) !!}
					<a href="{{route('coupons.show', $coupon->serial_number) }}">{{ $coupon->denomination }} - {{ $coupon->serial_number }}</a>
						(
                            {!! link_to_route('coupons.edit', 'Edit', array($coupon->serial_number), array('class' => 'btn btn-info')) !!},
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
				</li>
			@endforeach
		</ul>

		
	</div>
</div>
</div>
</div>
</div>
</div>
	@endif
@endsection