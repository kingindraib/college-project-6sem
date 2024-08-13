@extends('home.master')
@section('title', 'Register')
@section('body_class','page-sub-page page-create-account page-account')
@section('body')
        <!-- Page Content -->
        <div id="page-content">
            <!-- Breadcrumb -->
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Create an Account</li>
                </ol>
            </div>
            <!-- end Breadcrumb -->
    
            <div class="container">
                <header><h1>Create an Account</h1></header>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        @include('message.message')
                        <form role="form" id="form-create-account" method="POST" action="{{ route('register.submit') }}">
                            @csrf
                            <hr>
                            <div class="form-group">
                                <label for="form-create-account-full-name">First Name:</label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                               @error('first_name') <p class="text-danger">{{ $message }}</p>@enderror
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="form-create-account-full-name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name') <p class="text-danger">{{ $message }}</p>@enderror
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="form-create-account-email">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @error('email') <p class="text-danger">{{ $message }}</p>@enderror
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="form-create-account-password">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                                @error('password') <p class="text-danger">{{ $message }}</p>@enderror
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="form-create-account-confirm-password">Confirm Password:</label>
                                <input type="password" class="form-control" name="confirm_password" required>
                                @error('confirm_password') <p class="text-danger">{{ $message }}</p>@enderror
                            </div><!-- /.form-group -->
                            <div class="checkbox pull-left">
                                <label>
                                    <input type="checkbox" id="account-type-newsletter" name="account-newsletter">Receive Newsletter
                                </label>
                            </div>
                            <div class="form-group clearfix">
                                <button type="submit" class="btn pull-right btn-default" id="account-submit">Create an Account</button>
                            </div><!-- /.form-group -->
                        </form>
                        <hr>
                        <div class="center">
                            <figure class="note">By clicking the “Create an Account” button you agree with our <a href="terms-conditions.html">Terms and conditions</a></figure>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- end Page Content -->
@endsection
