@extends('layouts.basic')

@section('content')

<!-- start: LOGIN -->
<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo margin-top-30 center-block">
            <img class="center-block animated pulse" src="{{asset('_img/login.png')}}" alt=""/>
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <form class="form-login" method="post" action="{{ route('login') }}">
                    @csrf

                <fieldset>
                    <legend>
                        Sign in to your account
                    </legend>
                    <p>
                        Please enter your username and password to log in.
                    </p>

                    <div class="form-group">
                        <span class="input-icon">
                            <input  autofocus required autocomplete="off" value="{{ old('username') }}" type="text" class="form-control underline {{ $errors->has('username') ? ' error' : '' }}" name="username" placeholder="Enter Username">
                            <i class="fa fa-user"></i> </span>

                            @if ($errors->has('username'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group form-actions">
                        <span class="input-icon">
                            <input required type="password" class="form-control underline {{ $errors->has('password') ? ' error' : '' }} password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <i class="fa fa-lock"></i>
                            <a class="forgot" href="{{ route('password.request') }}">
                                I forgot my password
                            </a> </span>
                    </div>
                    <div class="form-actions">

                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">
                            Login <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                    
                </fieldset>
            </form>
            
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                &copy; 2016 - <?php echo date('Y') ?> <span class="text-bold text-uppercase"> My First Laravel </span>. <br/><span>All rights reserved</span>
            </div>
            <!-- end: COPYRIGHT -->
        </div>
        <!-- end: LOGIN BOX -->
    </div>
</div>
<!-- end: LOGIN -->

@endsection

@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/login.js')}}"></script>
    <script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
	</script>
@endsection

@section('additional_js')
@endsection
