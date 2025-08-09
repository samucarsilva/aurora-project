
    <header class="aurora-header">

        <nav class="aurora-navbar">

            <div class="aurora-logo">

                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/aurora/aurora-logo-white.png') }}" alt="The Brand Logo">
                </a>

            </div>

            @if(!in_array($page ?? null,
                    ['register', 'login', 'forgot-password', 'reset-password']))

                <div class="aurora-menu">

                    <div class="menu-icon" id="menu-icon">
                        <span class="bi bi-list">  </span>
                    </div>

                    <ul class="navbar-menu" id="navbar-menu">

                        <li class="navbar-item">
                            <a href="{{ route('about') }}"> About </a>
                        </li>

                        <li class="navbar-item">
                            <a href="{{ route('home') }}"> Home </a>
                        </li>

                        <li class="navbar-item">
                            <a href="{{ route('courses') }}"> Courses </a>
                        </li>

                        <li class="navbar-item">
                            <a href="{{ route('login') }}"> Login </a>
                        </li>

                        <li class="navbar-item">
                            <a href="{{ route('register') }}"> Register </a>
                        </li>

                    </ul>

                </div>

            @endif

        </nav>

    </header>
