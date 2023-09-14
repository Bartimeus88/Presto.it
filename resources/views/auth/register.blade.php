<x-layout>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <h2 class="text-white text-center">Registrati</h2>
                </div>
            </div>
        </div>
    </header>

    {{-- form register --}}
    <section class="section-padding section-bg">
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

                            <div class="col-lg-12 col-12">
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
    </section>








</x-layout>
