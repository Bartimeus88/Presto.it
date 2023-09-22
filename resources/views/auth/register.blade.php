<x-layout>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <h2 class=" text-center pt-5">Registrati</h2>
                </div>
            </div>
        </div>
    </header>

    {{-- form register --}}
    {{-- <section class="section-padding section-bg">
        <div class="container content-center">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <h3 class="mb-4 pb-2">Non essere timido!</h3>
                </div>

                <div class="col-lg-6 col-12">
                    <form action="/register" method="post" class="custom-form contact-form" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name">

                                    <label class="form-label" for="name">Nome e cognome</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Name">

                                    <label class="form-label" for="email">email</label>
                                </div>
                            </div>

                            {{-- <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" id="name" class="form-control" placeholder="Name" required="">

                                    <label for="floatingInput">Subject</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Tell me about the project"></textarea>

                                    <label for="floatingTextarea">Tell me about the project</label>
                                </div>
                            </div> --}}

    {{-- <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Name">

                                    <label class="form-label" for="password">password</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Name">

                                    <label class="form-label" for="password_confirmation">conferma password</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 ms-auto mb-5">
                                <button type="submit" class="form-control">Register</button>
                            </div>

                            <div class="row">
                            <div class="col-12 col-md-6 d-flex align-items-stretch">
                                <a class="btn btn-primary btn-lg btn-block btn-login mb-3 " style="background-color: #DB4437"
                                href="{{route('google.redirect')}}" role="button">
                                <i class="fa-brands fa-google me-2"></i>Registrati con Google
                            </a>
                            </div>
                            

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            @endif


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="container-fluid mb-5 bg-grey">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <section>
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6 ">
                        <img src="{{ URL::to('/') }}/images/undraw_mobile_payments_re_7udl.svg"
                            class="img-fluid" alt="Phone image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="/register" method="post" class="custom-form contact-form" role="form">
                            @csrf
                            <!-- Name and surname input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Nome" />
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" />
                            </div>

                            <!-- Confirm password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password_confirmation">Conferma password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Conferma password" />
                            </div>

                            <div class="d-flex justify-content-around align-items-center mb-4">
                               
                                <a href="{{ route('auth.forgot-password') }}">Password dimenticata ?</a>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block col-12">Registrati</button>


                            <p class="text-center fw-bold mx-3 my-4 text-muted">OR</p>


                            <di class="row justify-content-center">
                                <div class="col-12 col-md-6 d-flex align-items-stretch justify-content-center">
                                    <a class="btn btn-primary btn-lg btn-block btn-login  "
                                        style="background-color: #DB4437" href="{{ route('google.redirect') }}"
                                        role="button">
                                        <i class="fa-brands fa-google me-2"></i>{{__('ui.continue_with_google')}}
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-stretch justify-content-center">
                                    <a class="btn btn-primary btn-lg btn-block btn-login " style="background-color:#2b3137"
                                        href="{{ route('github.redirect') }}" role="button">
                                        <i class="fa-brands fa-github me-2"></i>Continua con Github
                                    </a>
                                </div>
                            </di>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            @endif



                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>








</x-layout>
