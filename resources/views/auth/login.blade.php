@extends("layouts.auth")

@section("content")
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="/register" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login</h2>
                    <form method="POST" action="/login" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="your-email"><i class="zmdi zmdi-email material-icons-email"></i></label>
                            <input type="email" name="email" id="your-email" value="{{old("email")}}" placeholder="Your Email"/>
                        </div>
                        @error("email")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password"/>
                        </div>
                        @error("password")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group">
                            <input type="checkbox" name="rememberMe" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
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
@endsection
