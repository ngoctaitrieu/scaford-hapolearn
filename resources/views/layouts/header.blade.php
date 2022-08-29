<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="logo-container">
            <a class="navbar-brand" href="/">
                <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="HapoLearn Logo">
            </a>
            <div class="navbar-icons">
                <div class="navbar-icon">

                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100">
                <li class="nav-item {{ (Request::route()->getName() == 'home') ? 'active' : '' }}">
                    <a class="nav-link" href="/">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ ((Request::route()->getName() == 'courses.index') || (Request::route()->getName() == 'courses.show')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('courses.index') }}">ALL COURSES</a>
                </li>
                <li class="nav-item {{ (Request::route()->getName() == 'profiles.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profiles.index') }}">PROFILE</a>
                </li>
                <li class="nav-item {{ ((Request::route()->getName() == 'login') || (Request::route()->getName() == 'register')) ? 'active' : '' }}">
                    @if(Auth::check())
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link logout-btn">
                                LOGOUT
                            </button>
                        </form>
                    @else
                        <a class="nav-link" href="{{ route('login') }}" aria-haspopup="true" aria-expanded="false">
                            LOGIN/REGISTER
                        </a>
                    @endif
                </li>
                <div class="language-container">
                    <a class="language-link" href="">
                        <img class="language-img" src="@if(app()->getLocale() == 'vi') {{ asset('images/vn.png') }} @else {{ asset('images/en.png') }} @endif" alt="VN">
                        <span>@if(app()->getLocale() == 'vi') TIẾNG VIỆT @else TIẾNG ANH @endif</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </a>

                    <ul class="language-list">
                        <li class="language-item">
                            <a class="language-link" href="{{ route('home.lang', ['en']) }}">
                                <img class="language-img" src="{{ asset('images/en.png') }}" alt="">
                                <span>TIẾNG ANH</span>
                            </a>
                        </li>
                        <li class="language-item">
                            <a class="language-link" href="{{ route('home.lang', ['vi']) }}">
                                <img class="language-img" src="{{ asset('images/vn.png') }}" alt="VN">
                                <span>TIẾNG VIỆT</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>
</header>
