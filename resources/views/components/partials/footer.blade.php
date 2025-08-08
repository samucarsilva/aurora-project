
    <footer class="aurora-footer">

        <div class="footer-container">

            <div class="footer-main">

                <div class="footer-center">

                    <nav>

                        <ul class="footer-menu">

                            <li class="footer-item">
                                <a href="{{ route('about') }}"> About </a>
                            </li>

                            <li class="footer-item">
                                <a href="{{ route('home') }}"> Home </a>
                            </li>

                            <li class="footer-item">
                                <a href="{{ route('courses') }}"> Courses </a>
                            </li>

                            <li class="footer-item">
                                <a href="{{ route('login') }}"> Login </a>
                            </li>

                            <li class="footer-item">
                                <a href="{{ route('register') }}"> Register </a>
                            </li>

                        </ul>

                    </nav>

                </div>

                <div class="footer-right">

                    <div class="footer-icons">
                        <a href="https://github.com/ApenasAlguem007/aurora-platform" target="_blank">
                            <span class="bi bi-github"> </span>
                        </a>
                    </div>

                </div>

            </div>


            <div class="footer-bottom">

                <div class="copyright-section">
                    <p> Copyright &copy; {{ date('Y') }} Aurora Platform. All Rights Reserved. </p>
                </div>

                <div class="verify-certificate">
                    <a href="#"> Verify Certificate </a>
                </div>

            </div>

        </div>

    </footer>
