<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forgot Password</title>
</head>

<body>

    <div class="px-5 py-5 p-lg-0">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
                        <div class="text-center mb-12">
                            <span class="d-inline-block d-lg-block h1 mb-lg-6 me-3">🔑</span>
                            <h1 class="ls-tight font-bolder h2">Forgot your password?</h1>
                            <p class="mt-2">Enter your email to receive a password reset link.</p>
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
                        <form method="post" action="{{route('auth.submitfogot')}}">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your email address" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                            </div>
                        </form>
                        <div class="text-center mt-8">
                            <p class="text-sm">Remembered your password? <a href="{{route('auth.LoadLoginform')}}" class="text-primary">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
