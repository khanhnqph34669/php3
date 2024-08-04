<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="px-5 py-5 p-lg-0">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
                        <div class="text-center mb-12">
                            <span class="d-inline-block d-lg-block h1 mb-lg-6 me-3">🎉</span>
                            <h1 class="ls-tight font-bolder h2">Create your account</h1>
                            <p class="mt-2">Let's get started!</p>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{route('auth.register')}}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="fullname">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="name" placeholder="Your full name">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            </div>
                            
                            <div class="mb-5">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your email address">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            </div>
                           
                            <div class="mb-5">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="new-password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            </div>
                            

                            <div class="mb-5">
                                <label class="form-label" for="password-confirm">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                                @if ($errors->has('password_comfirmed'))
                                <span class="text-danger">{{ $errors->first('password_comfirmed') }}</span>
                            @endif
                            </div>
                            <div class="mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms">
                                    <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-100">Register</button>
                            </div>
                        </form>
                        <div class="text-center mt-8">
                            <p class="text-sm">Already have an account? <a href="{{route('auth.LoadLoginform')}}" class="text-primary">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
