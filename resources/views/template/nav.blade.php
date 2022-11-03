<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>NK<span>&nbsp;KAFE</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/">Home</a></li>
                {{-- <li><a href="#about">About</a></li> --}}
                <li><a href="{{ route('menu.index') }}">Menu</a></li>
                <li><a href="{{ route('meja.index') }}">Meja</a></li>
                {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li> --}}
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="dropdown">
                        <a id="navbarDropdown" class="" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="{{ route('riwayat-transaksi.index') }}" class=" dropdown-item">Riwayat transaksi</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li><a href="{{ route('cart') }}"><i class="bi bi-basket"></i>
                    <span>&nbsp;{{ count((array) session('cart')) }}</span>
                </a></li>
            </ul>
        </nav><!-- .navbar -->

        {{-- <a class="btn-book-a-table" href="#book-a-table">Book a Table</a> --}}
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
