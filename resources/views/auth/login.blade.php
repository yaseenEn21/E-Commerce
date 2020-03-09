<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

                <!-- Sing in  Form -->
                <section class="sign-in">
                    <div class="container">
                        <div class="signin-content">
                            <div class="signin-image">
                                <figure><img src="img/signin-image.jpg" alt="sing up image"></figure>
                                <a href="{{route('register')}}" class="signup-image-link">Create an account</a>
                            </div>
        
                            <div class="signin-form">
                                <h2 class="form-title">Sign up</h2>
                                <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="your_email"><i class="zmdi zmdi-account material-icons-email"></i></label>
            
                                        <div class="col-md-6">
                                            <input id="email"  placeholder="Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>            
                                        <div class="col-md-6">
                                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                            @error('password')
                                                <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>            
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="agree-term" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="remember" class="label-agree-term"><span><span></span></span>{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
                                    </div>
            
                                   
                                    <div class="form-group form-button">
                                        <input style="margin-right:12px;" type="submit" name="signin" id="signin" class="form-submit" value=" {{ __('Login') }}"/>
                                        @if (Route::has('password.request'))
                                                <a style="display: inline;" class="signup-image-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                    </div>
                                </form>
                                <div class="social-login">
                                    <span class="social-label">Or login with</span>
                                    <ul class="socials">
                                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>