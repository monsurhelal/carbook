@extends('frontend.pages.master')
@section('frontend_title','user dehsboard')
@section('frontend_main_content')
	<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row">
          <div class="col-md-8 align-items-center">
    			<div class="featured-top">
                    <h2 class="text-white">welcome to deshboard-{{ Auth::user()->name }}</h2>
              </div>
            </div>
  		</div>
    </section>
@endsection