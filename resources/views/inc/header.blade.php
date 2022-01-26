@section('header')

<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('home') }}" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link px-2 link-dark">Contactus</a></li>
        @can('edit-messages')
        <li><a href="{{ route('contact-messages') }}" class="nav-link px-2 link-dark">Admin Panel</a></li>
        @endcan
    </ul>

    @if (Auth::check())
    <div class="col-md-3 text-end">
        <span>{{ Auth::user()->name }}</span>
        <a href="{{ route('user.private') }}"  class="btn btn-primary">User page</a>
        <a href="{{ route('user.logout') }}" class="btn btn-outline-primary me-2">Logout</a>
    </div>
    @else
    <div class="col-md-3 text-end">
        <a href="{{ route('user.login') }}" class="btn btn-outline-primary me-2">Login</a>
        <a href="{{ route('user.registration') }}"  class="btn btn-primary">Registration</a>
    </div>
    @endif
    
</header>