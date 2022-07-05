<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from laravel.pixelstrap.com/viho/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 03:45:45 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
        <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app" />
        <meta name="author" content="pixelstrap" />
        <link rel="icon" href="{{asset('assets/images/logo/ico.png')}}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{asset('assets/images/logo/ico.png')}}" type="image/x-icon" />
        <title>Register
 | Talents Mapping
</title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.gstatic.com/" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
<!-- Font Awesome-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}" />
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}" />
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}" />
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}" />
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather-icon.css')}}" />
<!-- Plugins css start-->
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}" />
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
<link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen" />
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}" />
    </head>
    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
        <!-- error page start //-->
            <section>
	    <div class="container-fluid p-0">
	        <div class="row m-0">
	            <div class="col-12 p-0">
	                <div class="login-card">
                        <form class="theme-form login-form" method="POST" action="{{ route('user.storeAdmin') }}">
                        @csrf
	                        <h4>Create your account</h4>
	                        <h6>Enter your personal details to create account</h6>
	                        <div class="form-group">
	                            <label>Nama</label>
	                            <div class="small-group">
	                                <div class="input-group">
	                                    <span class="input-group-text"><i class="icon-user"></i></span>
	                                    <input class="form-control @error('nama_depan') is-invalid @enderror" name="nama_depan" value="{{old('nama_depan')}}" type="text" required="" placeholder="Nama Depan" />
                                    @error('nama_depan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                                </div>
	                                <div class="input-group">
	                                    <span class="input-group-text"><i class="icon-user"></i></span>
	                                    <input class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" value="{{old('nama_belakang')}}" type="text" required="" placeholder="Nama Belakang" />
                                    @error('nama_belakang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Telepon</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icofont icofont-iphone"></i></span>
	                                <input class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{old('telepon')}}" type="text" required="" placeholder="Telepon" />
                                    @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Alamat</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icofont icofont-home"></i></span>
	                                <input class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat')}}" type="text" required="" placeholder="Alamat" />
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Instansi</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icofont icofont-building-alt"></i></span>
	                                <input class="form-control @error('instansi') is-invalid @enderror" name="instansi" value="{{old('instansi')}}" type="text" required="" placeholder="Asal Instansi" />
                                    @error('instansi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Email Address</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-email"></i></span>
	                                <input class="form-control @error('email') is-invalid @enderror" type="email" required="" name="email" value="{{ old('email') }}" placeholder="Test@gmail.com" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********" />
	                                <div class="show-hide"><span class="show"> </span></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
	                        </div>
	                        <p>Already have an account?<a class="ms-2" href="{{route('login')}}">Sign in</a></p>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	
    
        <!-- error page end //-->
        <!-- latest jquery-->
        <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<script src="{{asset('assets/js/icons/icons-notify.js')}}"></script>
<script src="{{asset('assets/js/icons/icon-clipart.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/config.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<!-- Plugin used-->
<script>
    $(document).ready(function () {
        $('form').submit(function () {
            $('.btn_submit', this).attr('disabled', 'disabled');
        });
    })
</script>
    </body>

<!-- Mirrored from laravel.pixelstrap.com/viho/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 03:45:45 GMT -->
</html>



