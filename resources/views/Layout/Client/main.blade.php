@include('Layout.Client.head')
<body>
@include('Layout.Client.header')
<main>
    @if (session('error'))
    <div class="alert alert-danger animate__animated animate__shakeX text-center">
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success animate__animated animate__shakeX text-center">
        {{ session('success') }}
    </div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning animate__animated animate__shakeX text-center">
        {{ session('warning') }}
    </div>
    @endif
    @yield('content')
</main>
@include('Layout.Client.footer')
@include('Layout.Client.script')
</body>
</html>