@extends('layouts.app')
@section('title', $project->project_name)
@section('project-title')
{{ $project->project_name }}
@endsection
@section ('class', 'project')
@section('content')
<div class="container">
                  <!-- Left Container -->
                  <div class="left-container">
                    <!-- Start Projects -->
                    <h1 class="heading">Project</h1>
                    <div class="leftlayer">                 
                         <div class="project-info"><h3>{{$project->project_name }}</h3> 
                         <h4>{{ $project->location }}</h4>
                         <h4>Recipient:
                         @foreach ($recipients as $recipient)
                          @if ($recipient->id == $project->recipient_id)
                            {{$recipient->recipient_name}}
                          @endif
                         @endforeach
                         </h4>
                         {{ $project->project_description}}</div>
                         <div class="target-date">Target Date:<br/> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $project->ideal_planting_date)->format('d F Y') }} </div>
         
                    </div>

                    <h1 class="heading">Latest News</h1>
                    <div class="leftlayer latest-news">                 
                      @foreach($coupons as $coupon)
                              @if ($coupon->project_id == $project->id)
                                <p>
                                @foreach ($members as $member)
                                  @if ($member->id == $coupon->member_id)
                                   {{$member->first_name}} {{$member->last_name}}
                                  @endif
                                @endforeach donated {{$coupon->denomination}} ecopoints to {{$project->project_name}}<br/>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $coupon->donated_on)->format('d F Y g:i A') }}</p>
                              @endif
                        @endforeach 
                    </div>

                  </div>
                  <!-- Right Container -->
                  <div class="right-container">
                     <div class="heading">@php // echo date("d F Y"); @endphp</div>
                     <div class="rightlayer">
                      <div class="scout">
                        <span class="bar">Collected Altogether: 
                         @php $sum = 0; @endphp
                            @foreach($coupons as $coupon)
                              @if ($coupon->project_id == $project->id)
                                @foreach($merchants as $merchant)
                                  @if ($merchant->id == $coupon->merchant_id)
                                      @php $sum+= $coupon->denomination; @endphp
                                  @endif
                                @endforeach
                              @endif
                            @endforeach 
                          @php $pointscollected = $sum; echo number_format($sum); //Display total points for this project @endphp
                        </span>
                        {{-- @if (Auth::check())
                        <span class="bar">Available To Gift: 
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
                            @endforeach <br/>      
                        </span> 
                        @endif --}}
                        <span class="bar">Target Points: {{number_format($project->points_required) }}</span>
                    <span class="bar">Points Still Needed:
                      @php 
                        $pointsneeded = $project->points_required - $pointscollected; 
                        echo number_format($pointsneeded);

                      @endphp
                    </span>
                      </div>

                     <div class="project-info">
                
                     
                      @if (Auth::check())
                                <input type="hidden" class="projectid" name="project" value="{{$project->id}}"/>
                                <input type="hidden" class="memberid" name="member" value="{{Auth::user()->id}}"/>
                              @if (!$followed)
                              <div class="project-input">
                                  <button class="join follow" type="submit">Follow Project</button>
                               </div>
                              @else
                                @if ($followed->member_id == Auth::user()->id && $followed->project_id == $project->id) 
                                <div class="project-input">
                                  <button class="join unfollow" type="submit">Following</button>
                                </div>
                                @else
                                <div class="project-input">
                                  <button class="join follow" type="submit">Follow Project</button>
                                </div>
                                @endif 
                              @endif 

                        <button class="join">Join Project</button>
                        <button class="gift" data-toggle="modal" data-target="#myModal">Donate To Project</button>
                        
                        @else
                        <button class="join"><a href="/login">Follow Project</a></button>
                        <button class="join"><a href="/login">Join Project</a></button>
                        <button class="gift"><a href="/login">Donate To Project</a></button>
                      @endif

                      </div>
                     </div>
                     <div class="heading">Location</div>
                     <div class="rightlayer" id="map" style="height: 250px; width: 100%;"> 
                     <!-- Get Map -->
                     <script language=javascript src='http://maps.google.com/maps/api/js?&key=AIzaSyCwa_j4luc7vGc0b-mvKY_XmWt2hSa2no8'></script>
                     <script>
                     function initialize(){
                        var myLatlng = new google.maps.LatLng({{$project->latitude}},{{$project->longitude}});
                        var myOptions = {
                        zoom: 12,                        
                        disableDefaultUI: true,
                        scrollwheel: false,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                          }
                        map = new google.maps.Map(document.getElementById("map"), myOptions);
                          var marker = new google.maps.Marker({
                          position: myLatlng, 
                          map: map,
                          title:"{{$project->project_name}}"
                          });
                      } 

google.maps.event.addDomListener(window,'load', initialize);
                     </script>
                   

                     </div>

                     <div class="heading">Status</div>
                     <div class="rightlayer">
                     <!-- Group by Merchants -->
                     @foreach($uniquemerchants as $uniquecoupon)                 
                      @if ($uniquecoupon->project_id == $project->id)

                         @foreach($merchants as $merchant)
                              @if ($merchant->id == $uniquecoupon->merchant_id)
                                <a href="/merchants/{{strtolower($merchant->merchant_name)}}"><img src="/images/logos/{{$merchant->logo}}" height="50px" alt="{{$merchant->merchant_name}}" title="{{$merchant->merchant_name}}" class="merchant-logo" /></a>
                              @endif
                          @endforeach

                      @endif
                     @endforeach 
                     <!-- End of Group by Merchants -->

                          
                     </div>
                  </div>


                 
                 </div>
             <!-- End Homepage Container -->
             </div>
                <!-- Start Modal -->
                @if (Auth::check())
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      
                    <div class="selection merchants">

                  <!-- Start Denomination Filter -->
                  <dl class="dropdownlist"> 
                    <dt><a href="#"><span class="hida">Select to Filter</span><p class="multiSel"></p></a></dt>
                    <dd>
                      <div class="mutliSelect">
                        <ul>
                          <li><input type="checkbox" value="default" checked/>default</li>
                          <li><input type="checkbox" value="1" />1 Ecopoint</li>
                          <li><input type="checkbox" value="5" />5 Ecopoints</li>
                          <li><input type="checkbox" value="10" />10 Ecopoints</li>
                          <li><input type="checkbox" value="20" />20 Ecopoints</li>
                          <li><input type="checkbox" value="50" />50 Ecopoints</li>
                          <li><input type="checkbox" value="100" />100 Ecopoints</li>
                          <li><input type="checkbox" value="merchants" />By Merchants</li>
                        </ul>
                      </div>
                    </dd>
                  </dl>
                  <!-- End Denomination Filter -->
                  <button class="modalbtn filter">Filter</button>
                  <button class="modalbtn all">Donate All</button>
                  <button class="modalbtn select">Donate</button>
                    <!-- All Available Coupons -->
                    @foreach($members as $member)
                      @if ($member->id == Auth::user()->id)
                        <ul id="couponlist">
                          @foreach ($member->coupons as $coupon)
                            @if (!$coupon->project_id)
                              <li class="ecocard" 
                                data-coupon-id="{{ $coupon->id }}" 
                                data-coupon-serial="{{ $coupon->serial_number }}" 
                                data-denomination="Donate {{ $coupon->denomination }} ecopoints"  
                                @foreach($coupondesigns as $coupondesign)
                                  @if ($coupondesign->id == $coupon->coupon_design_id )
                                      style="background: #fff url('/images/designs/{{ $coupondesign->file_name }}') no-repeat left top;"
                                  @endif
                                 @endforeach >
                              </li>
                            @endif
                          @endforeach
                        </ul>
                      @endif
                    @endforeach
                    <!-- Available Coupons -->
                    
                      <!-- Group by Merchants -->
                      <ul id="merchantlist" style="display: none">
                        @foreach($donatemerchants as $donatemerchant)                 
                          @if ($donatemerchant->member_id == Auth::user()->id && !$donatemerchant->project_id)
                            @foreach($merchants as $merchant)
                              @if ($merchant->id == $donatemerchant->merchant_id)
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="/images/logos/{{$merchant->logo}}" height="50px" alt="{{$merchant->merchant_name}}" title="{{$merchant->merchant_name}}" class="merchant-logo" /></a>
                                   <ul class="dropdown-menu">
                                    @foreach($members as $member)
                                      @if ($member->id == Auth::user()->id)
                                          @foreach ($member->coupons as $coupon)
                                              @if (!$coupon->project_id && $coupon->merchant_id == $donatemerchant->merchant_id)
                                                  <li class="ecocard" 
                                                      data-coupon-id="{{ $coupon->id }}" 
                                                      data-coupon-serial="{{ $coupon->serial_number }}" 
                                                      data-denomination="Donate {{ $coupon->denomination }} ecopoints" @foreach($coupondesigns as $coupondesign)
                                                          @if ($coupondesign->id == $coupon->coupon_design_id )
                                                             style="background: #fff url('/images/designs/{{ $coupondesign->file_name }}') no-repeat left top;"
                                                          @endif
                                                      @endforeach >
                                                  </li>
                                              @endif
                                          @endforeach
                                      @endif
                                    @endforeach
                                   </ul>
                                </li>
                              @endif
                            @endforeach
                          @endif
                        @endforeach 
                      </ul>
                      <!-- End of Group by Merchants -->
                    </div>
                  </div>
                @endif   
                <!-- End Modal -->
@endsection
@section('script')
<script type="text/javascript">
$( function() {
    $('.flex-center').css("background-image", "url(/images/backgrounds/{{$project->image}})"); 
    $('.flex-center').addClass("{{$project->project_skin}}");
});
</script>
<script src="/js/ajax-crud.js"></script>
@endsection