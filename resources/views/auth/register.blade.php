@include('components.partials.header')


    <main class="aurora-main justify-center">

        <div class="form-container">

            <form class="form-card" action="{{ route('register.store') }}" method="POST">
                @csrf


                <div class="form-header">
                    <h1 class="form-title font-semibold"> Sign Up </h1>
                </div>


                <div class="form-main">

                    <div class="form-group">

                        <input class="form-input @error('name') border-danger @enderror" type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="off" placeholder=" ">
                        <label class="form-label @error('name') text-danger @enderror" for="name"> Name </label>

                        @error('name')

                            <div class="d-block invalid-feedback">
                                 <p class="font-size-1 text-danger"> {{ $message }} </p>
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <input class="form-input @error('email') border-danger @enderror" type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="off" placeholder=" ">
                        <label class="form-label @error('email') text-danger @enderror" for="email"> E-Mail </label>

                        @error('email')

                            <div class="d-block invalid-feedback">
                                 <p class="font-size-1 text-danger"> {{ $message }} </p>
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <input class="form-input @error('password') border-danger @enderror" type="password" name="password" id="password" placeholder=" ">
                        <label class="form-label @error('password') text-danger @enderror" for="password"> Password </label>

                        @error('password')

                            <div class="d-block invalid-feedback">
                                 <p class="font-size-1 text-danger"> {{ $message }} </p>
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <div class="form-checkbox">

                            <input class="form-input checkbox @error('terms') danger-outlined @enderror" type="checkbox" name="terms" id="terms">
                            <label for="terms checkbox @error('terms') text-danger @enderror"> Accept <a class="font-semibold" href="#"> Terms of Use </a> </label>

                        </div>

                            @error('terms')

                                <div class="d-block invalid-feedback">
                                    <p class="font-size-1 text-danger"> {{ $message }} </p>
                                </div>

                            @enderror

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


@include('components.partials.footer')