@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        @foreach($members as $member)
                            @if ($member->id == Auth::user()->id)
                             <strong>Member:</strong> {{ $member->first_name }} {{ $member->last_name }} 
                             <span>{!! link_to_route('members.edit', 'Edit', array($member->id), array('class' => 'btn btn-info')) !!}</span>
                            @endif
                        @endforeach                
                    </div>
                    <div class="panel-body">                  
                        @foreach($members as $member)
                            @if ($member->id == Auth::user()->id) 
                                <span class="span-head">Joined: {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $member->created_at)->format('d F Y h:i A') }}</span>                          
                                <span class="span-head">Nickname: {{ $member->nickname }}</span>
                                <span class="span-head">Email: {{ $member->email_address }}</span>
                                <span class="span-head">Coupon Count: {{ $member->coupons->count() }}</span>
                                <span class="span-head">Coupon Total Value: {{ number_format($member->coupons->sum('denomination') )}}</span>
                            
                            @endif
                        @endforeach  
                            <div id="coupon-form">
                                <form method="POST" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="PATCH">
                                    <input name="_token" type="hidden" value="'+$('meta[name="csrf_token"]').attr('content')+'">
                                </form>
                            </div>
                     
                        <div id="scrollable" class="top-panel"><strong>Available Coupons:</strong>
                            @foreach($members as $member)
                                @if ($member->id == Auth::user()->id)   
                                    @php $sum = 0; @endphp
                                    @foreach($coupons as $coupon)
                                        @if ($coupon->member_id == $member->id && $coupon->project_id == Null)
                                            @php $sum+= $coupon->denomination; @endphp
                                        @endif
                                    @endforeach 
                                    @php echo number_format($sum); //Display total available coupons @endphp 
                                @endif
                            @endforeach 
                            @foreach($members as $member)
                                @if ($member->id == Auth::user()->id)
                                    <div class="inner-top-panel">
                                        <div class="scroll-content">
                                            <table id="sortablelist" class="connectedSortable" data-id="couponlist">
                                                @foreach ($member->coupons as $coupon)
                                                    @if (!$coupon->project_id)
                                                        <tr data-coupon-id="{{ $coupon->id }}">
                                                        <td class="ecocard" 
                                                            data-coupon-id="{{ $coupon->id }}" 
                                                            data-coupon-serial="{{ $coupon->serial_number }}" 
                                                            data-denomination="Donate {{ $coupon->denomination }} ecopoints"                                             
                                                            @foreach($coupondesigns as $coupondesign)
                                                            @if ($coupondesign->id == $coupon->coupon_design_id )
                                                             style="background: #fff url('/images/designs/{{ $coupondesign->file_name }}') no-repeat right top;"
                                                            @endif
                                                            @endforeach >
                                                        {{-- <span class="coupon">{{ $coupon->serial_number }}</span> --}}
                                                        <span class="gifted">Gifted by {{ $coupon->merchant->merchant_name }}</span> 
                                                          

                                                        </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>


                        <div id="project" class="top-panel"><strong>Projects Available:</strong> 
                            <div class="project-panel">
                            @foreach($members as $member)
                                @if ($member->id == Auth::user()->id)                                
                                    @foreach($projects as $project)
                                        <div class="inner-top-panel">
                                            <table id="sortable{{ $project->id }}" 
                                                class="project connectedSortable" 
                                                data-project-id="{{ $project->id }}" 
                                                data-project="{{ $project->project_name }}" 
                                                data-project-id="{{ $project->project_id }}" >
                                                <thead>
                                                    <tr class="ui-state-disabled">
                                                        <th height="1px"><a href="/projects/{{strtolower($project->project_name)}}">{{ $project->project_name }}</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($member->coupons as $coupon) 
                                                        @if (!empty($coupon->project_id) && $project->id == $coupon->project_id)
                                                            <tr class="ui-state-disabled">
                                                                <td class="ecocard" 
                                                                @foreach($coupondesigns as $coupondesign)
                                                                    @if ($coupondesign->id == $coupon->coupon_design_id )
                                                                    style="background: #fff url('/images/designs/{{ $coupondesign->file_name }}') no-repeat right top;"
                                                                    @endif
                                                                @endforeach>
                                                                    <span class="coupon">{{ $coupon->serial_number }}</span>
                                                                    <span class="gifted">Gifted by {{ $coupon->merchant->merchant_name }}</span>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                            </div>
                        </div>     
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="/js/ajax-crud.js"></script>
<script src="/js/bootstrap-tour.js"></script>
<script>
$( function() {
// Bootstrap Tour
    var tour = new Tour({
        name: "tour",
        steps: [],
        //storage: false,
        container: "body",
        smartPlacement: true,
        keyboard: true,
    });

    // Add your steps. Not too many, you don't really want to get your users sleepy
    tour.addSteps([
        {
            element: "#scrollable", // string (jQuery selector) - html element next to which the step popover should be shown
            placement: "top",
            smartPlacement: true,
            title: "Available Coupons", // string - title of the popover
            content: "You can drag and drop these coupons onto the project available table", // string - content of the popover
            animation: true,
            container: "body",
            backdrop: true,
            backdropContainer: 'body',
            backdropPadding:3,
        },
        {
            element: "#project",
            placement: "top",
            smartPlacement: true,
            title: "Donate To Project",
            content: "Select any project to donate your ecopoints from your available coupons."
        }
    ]);

    // Initialize the tour
    tour.init();
    //tour.setCurrentStep(0);
    // Start the tour
    tour.start();
});
</script>
@endsection

