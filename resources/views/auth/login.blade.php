@extends('layout.app-auth')

@section('title')
    Welcome to IRBCMS | User
@endsection

@section('body-login')
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
                style="background-image: url(assets/media/bg/bg2.jpg);">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{ asset('z2.png') }}" class="max-h-150px" alt="zone2 logo" />
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <form action="{{ route('auth.store') }}" method="post">
                        @csrf
                        <div class="login-signin">
                            <div class="mb-20">
                                <h3 class="font-weight-bolder">Sign In To Admin</h3>
                                <p class="font-weight-bold">Enter your details to login to your account:</p>
                            </div>
                            <form class="form" id="kt_login_signin_form">
                                <div class="form-group">
                                    <input type="text" placeholder="Username" name="user_name" autocomplete="off"
                                        class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('user_name') is-invalid @enderror" />
                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" name="password"
                                        class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div
                                class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                        <input type="checkbox" name="remember" />
                                        <span></span>Remember me</label>
                                </div>
                                <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password ?</a>
                            </div> --}}
                                <div class="form-group text-center mt-10">
                                    <button id="kt_login_signin_submit"
                                        class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
@endsection
