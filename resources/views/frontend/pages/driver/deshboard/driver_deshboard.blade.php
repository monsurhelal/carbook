@extends('frontend.pages.master')
@section('frontend_title','user dehsboard')
@section('frontend_main_content')
	<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row">
          <div class="col-md-8 align-items-center">
    			<div class="featured-top">
                    <h2 class="text-white">welcome to deshboard-{{ Auth::guard('driver')->user()->name }}</h2>
              </div>
            </div>
  		</div>
    </section>
    	<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="car-list">
						@if (isset($authDriver->car[0]->car_name))
							<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th class="bg-dark heading">Per Day Rate</th>
						        <th class="bg-black heading">Leasing</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="">
						        <td class="price">car image</td>
						        <td class="price">
									@if (isset($authDriver->car[0]->image))
										<img style="width: 100px" class="rounded" src="{{ asset('admin/assets/images/cars/'.$authDriver->car[0]->image) }}" alt="car image">
									@else
										No car assigned yet
									@endif
								</td>
						      </tr>
						      <tr class="">
						        <td class="price">car name</td>
						        <td class="price">
									@if (isset($authDriver->car[0]->car_name))
										{{ $authDriver->car[0]->car_name }}
									@else
										No car assigned yet
									@endif
								</td>
						      </tr>
						      <tr class="">
						        <td class="price">pick up location</td>
						        <td class="price">
									@if (isset($authDriver->rentACar->pick_up_location))
										{{ $authDriver->rentACar->pick_up_location }}
									@else
										No pick up location assigned yet
									@endif
								</td>
						      </tr>
						      <tr class="">
						        <td class="price">drop off location	</td>
						        <td class="price">
									@if (isset($authDriver->rentACar->drop_off_location))
										{{ $authDriver->rentACar->drop_off_location }}
									@else
										No drop off location assigned yet
									@endif	
								</td>
						      </tr>
						      <tr class="">
						        <td class="price">pick up date</td>
						        <td class="price">
									@if (isset($authDriver->rentACar->pick_up_date))
										{{ $authDriver->rentACar->pick_up_date }}
									@else
										No pick up date assigned yet
									@endif
								</td>
						      </tr>
						      <tr class="">
						        <td class="price">drop off date</td>
						        <td class="price">
									@if (isset($authDriver->rentACar->drop_off_date))
										{{ $authDriver->rentACar->drop_off_date }}
									@else
										No drop off date assigned yet
									@endif	
								</td>
						      </tr>
						      <tr class="">
						        <td class="price">pick up time</td>
						        <td class="price">
									@if (isset($authDriver->rentACar->pick_up_time))
										{{ $authDriver->rentACar->pick_up_time }}
									@else
										No pick up time assigned yet
									@endif	
								</td>
						      </tr>
						      <tr class="">
						        <td class="price">payment</td>
						        <td class="price">
									@if (isset($authDriver->rentACar->payment))
										{{ $authDriver->rentACar->payment }}
									@else
										No payment assigned yet	
									@endif	
								</td>
						      </tr>
						      <tr class="">
						        <td class="price"> Trip and payment status</td>
						        <td class="price">
									@if (isset($authDriver->rentACar->payment_status))
										@if ( $authDriver->rentACar->payment_status == 0)
										{{-- <a href="{{ route('payment.status',$authDriver->rentACar->id) }}" class="btn btn-warning">cash callect</a> --}}
										<form action="{{ route('payment.status',$authDriver->rentACar->id) }}" method="POST">
											@csrf
											@method('PUT')
											<button class="btn btn-warning">cash callect</button>
										</form>
										@else
											<span>cash reachived and trip complite</span>
										@endif
									@else
										No payment status assigned yet	
									@endif
									
								</td>
						      	</tr>
						    	</tbody>
							</table>
						@else
							<h3>No Trip for you</h3>
						@endif
	    				
					  </div>
    			</div>
    		</div>
			</div>
		</section>
@endsection