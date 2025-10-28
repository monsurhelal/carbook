@extends('frontend.pages.master')
@section('frontend_title','driver login')
@section('frontend_main_content')
	<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row">
          <div class="col-md-8 align-items-center">
    			<div class="featured-top">
					<form action="{{ route('driver.login') }}" method="POST" class="request-form  bg-primary">
							@csrf
						<h2>Login form</h2>
							<div class="form-group">
								<label for="" class="label">email</label>
								<input type="text" name="email" class="form-control" placeholder="enter your email">
							</div>
							<div class="form-group">
								<label for="" class="label">password</label>
								<input type="password" name="password" class="form-control" placeholder="enter your password">
							</div>
						<div class="form-group">
						<input type="submit" value="Login" class="btn btn-secondary py-3 px-4">
						</div>
					</form>
              </div>
            </div>
  		</div>
    </section>
@endsection