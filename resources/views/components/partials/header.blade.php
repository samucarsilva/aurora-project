
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

                            @guest

                                <li class="navbar-item">
                                    <a href="{{ route('login.create') }}"> Login </a>
                                </li>

                                <li class="navbar-item">
                                    <a href="{{ route('register.create') }}"> Register </a>
                                </li>
                            
                            @endguest

                        @auth

                            <li class="dropdown-container">
                    
                                <a id="user-menu-toggle" role="button" aria-label="Open User Menu">
                                    <img class="profile-thumbnail" src="{{ Auth::user()->profile_picture_url }}" alt="User Profile Picture.">
                                </a>
                                
                                <ul class="dropdown-menu" id="user-menu">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['user' => Auth::user()->username]) }}">
                                            <span class="bi bi-layout-wtf">  </span> Dashboard
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.edit') }}">
                                            <span class="bi bi-person-circle">  </span> Edit Profile
                                        </a>
                                    </li>

                                        <hr class="dropdown-divider">

                                    <li>

                                        <form method="POST" action="{{ route('logout') }}" class="d-block">
                                            @csrf

                                            <button type="submit" class="dropdown-item w-100 text-start">
                                                Logout
                                            </button>

                                        </form>

                                    </li>

                                </ul>

                            </li>

                        @endauth

                    </ul>

                </div>

            @endif

        </nav>

    </header>
