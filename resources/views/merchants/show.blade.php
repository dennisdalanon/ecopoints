@extends('layouts.app')
@section('title', $merchant->merchant_name)
@section('merchant-name')
{{ $merchant->merchant_name }}
@endsection
@section ('class', 'merchant')
@section('content')
<div class="container">
                  <!-- Left Container -->
                  <div class="left-container">
                    <!-- Start Projects -->
                    <h1 class="heading"><img height="50px" src="/images/logos/{{$merchant->logo}}" alt="{{$merchant->merchant_name}}" title="{{$merchant->merchant_name}}" class="merchant-logo" /> {{$merchant->merchant_name}}</h1>
                    <div class="leftlayer">
                    @if ($merchant->physical_address_1 != NULL)                 
                    <p><strong>Address:</strong> {{$merchant->physical_address_1}} {{$merchant->physical_city}} {{$merchant->physical_country}} {{$merchant->physical_postcode}}</p>
                    @endif
                    <p><strong>Total points donated:</strong>
                    @php $sum = 0; @endphp
                            @foreach($coupons as $coupon)
                              @if ($coupon->merchant_id == $merchant->id)
                                @foreach($projects as $project)
                                  @if ($project->id == $coupon->project_id)
                                      @php $sum+= $coupon->denomination; @endphp
                                  @endif
                                @endforeach
                              @endif
                            @endforeach 
                        @php echo $sum; //Display total points for this project @endphp 
                    </p>
                    </div>
                    @if (Auth::check()) {{-- Call members that merchant gifted ecopoints--}}
                    <h1 class="heading">Gifted Members</h1>
                    <div class="leftlayer members">                 
                      <!-- Display Unique Member Name Here-->
                      <ul>
                     @foreach($uniquemembers as $uniquecoupon)                 
                      @if ($uniquecoupon->merchant_id == $merchant->id)

                         @foreach($members as $member)
                              @if ($member->id == $uniquecoupon->member_id)
                                <li><a href="/members/{{$member->id}}">{{$member->first_name}} {{$member->last_name}}</a></li>
                              @endif
                          @endforeach

                      @endif
                     @endforeach
                     </ul> 
                     <!-- End Display Unique Member Name Here-->
                    </div>
                    @endif

                  </div>
                  <!-- Right Container -->
                  <div class="right-container">
                     <div class="heading">Projects Donated</div>
                     <div class="rightlayer"> 

                      <!-- Group by Merchants -->
                    <ol>
                     @foreach($uniqueprojects as $uniquecoupon)                 
                      @if ($uniquecoupon->merchant_id == $merchant->id)

                         @foreach($projects as $project)
                              @if ($project->id == $uniquecoupon->project_id)
                                <li><a href="/projects/{{ strtolower($project->project_name) }}">{{$project->project_name}}</a>
                                @if (Auth::check()) - {{-- Display only if authenticated --}}
                                  @php $sum = 0; @endphp
                                  @foreach($coupons as $coupon)
                                    @if ($coupon->merchant_id == $merchant->id)
                                      @if ($project->id == $coupon->project_id)
                                        @php $sum+= $coupon->denomination; @endphp
                                      @endif
                                    @endif
                                  @endforeach 
                                  @php echo $sum; @endphp 
                                @endif
                                </li>
                              @endif
                          @endforeach

                      @endif
                     @endforeach
                     </ol> 
                     <!-- End of Group by Merchants -->
                     </div>
                  </div>            
                 </div>
             <!-- End Homepage Container -->
             </div>



@endsection