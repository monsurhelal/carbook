@extends('frontend.pages.master')
@section('frontend_title','login')
@section('frontend_main_content')
	<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row">
          <div class="col-md-8 align-items-center">
    			<div class="featured-top">
					<form action="{{ route('registation.store') }}" method="POST" class="request-form  bg-primary">
							@csrf
						<h2>Login form</h2>
							<div class="form-group">
								<label for="" class="label">name</label>
								<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="enter your name">
								@error('name')
									<span class="invalid-feedback">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="" class="label">number</label>
								<input type="text" name="number" class="form-control @error('number') is-invalid @enderror " placeholder="enter your number">
								@error('number')
									<span class="invalid-feedback">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="" class="label">email</label>
								<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="enter your email">
								@error('email')
									<span class="invalid-feedback">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="" class="label">password</label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="enter your password">
								@error('password')
									<span class="invalid-feedback">{{ $message }}</span>
								@enderror
							</div>
						<div class="form-group">
						<input type="submit" value="sign up" class="btn btn-secondary py-3 px-4">
						</div>
						<a class="btn btn-secondary py-3 px-4" href="{{ route('login.form') }}">login</a>
					</form>
              </div>
            </div>
  		</div>
    </section>
@endsection