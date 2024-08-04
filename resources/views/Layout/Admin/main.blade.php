@include('Layout.Admin.head')
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('Layout.Admin.aside')
<main class="main-content position-relative border-radius-lg ">
    @include('Layout.Admin.nav')
    @yield('content')
    @include('Layout.Admin.footer')
</main>
@include('Layout.Admin.fixed')
@include('Layout.Admin.script')
