@extends('home.master')
@section('title','Login')
@section('body_class','page-sub-page page-sign-in page-account')
@section('body')

        <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <header><h1>Login</h1></header>
            <div class="row">
             
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                  @include('message.message')
                    <form role="form" id="form-create-account"  method="POST" action="{{ route('login.submit') }}" >
                      @csrf
                        <div class="form-group">
                            <label for="form-create-account-email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                            @error('email') <p class="text-danger">{{ $message }}</p> @enderror 
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-create-account-password">Password:</label>
                            <input type="password" class="form-control" name="password" required>
                            @error('password') <p class="text-danger">{{ $message }}</p> @enderror 
                        </div><!-- /.form-group -->
                        <div class="form-group clearfix">
                            <button type="submit" class="btn pull-right btn-default" id="account-submit">Sign</button>
                        </div><!-- /.form-group -->
                    </form>
                    <hr>
                    <div class="center"><a href="{{ route('forget.password') }}">forget password</a></div>
                    <div class="center"><a href="{{ route('register') }}">Don't have account. Create Now</a></div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->

    @endsection