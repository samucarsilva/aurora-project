@include('components/partials.header')


    <main class="aurora-main justify-center">

        <div class="form-container">

            <form class="form-card" action="" method="POST">
                @csrf


                <div class="form-header">
                    <h1 class="form-title font-semibold"> Sign Up </h1>
                </div>


                <div class="form-main">

                    <div class="form-group">
                        <input class="form-input" type="text" name="name" id="name" autocomplete="off" placeholder=" ">
                        <label class="form-label" for="name"> Name </label>
                    </div>


                    <div class="form-group">
                        <input class="form-input" type="email" name="email" id="email" autocomplete="off" placeholder=" ">
                        <label class="form-label" for="email"> E-Mail </label>
                    </div>


                    <div class="form-group">
                        <input class="form-input" type="password" name="password" id="password" autocomplete="off" placeholder=" ">
                        <label class="form-label" for="password"> Password </label>
                    </div>


                    <div class="form-group">

                        <div class="form-checkbox">

                            <input class="form-input checkbox" type="checkbox" name="terms" id="terms">
                            <label for="terms"> Accept <a class="font-semibold" href="#"> Terms of Use </a> </label>

                        </div>

                    </div>

                </div>


                <div class="form-footer">

                    <div class="form-group">
                        <button class="button-primary" type="submit"> Register </button>
                    </div>

                    <div class="form-group">
                        <a class="button-link" href="#"> Sign In </a>
                    </div>

                </div>


            </form>

        </div>

    </main>


@include('components/partials.footer')