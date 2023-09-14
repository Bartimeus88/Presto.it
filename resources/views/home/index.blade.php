<x-layout>


    {{-- <h1 class="display-1 text-center my-5">Presto.it</h1> --}}



    {{-- hero --}}
    {{-- <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">Presto.it</h1>

                    <h6 class="text-center">platform for creatives around the world</h6>

                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5 d-none" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1">

                            </span>

                            <input name="keyword" type="search" class="form-control" id="keyword"
                                placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                            <button type="submit" class="form-control">Search</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section> --}}


    @if (session()->has('access.denied'))
        <div class="container">
            <div class="my-5 flex flex-row justify-center my2 alert alert-danger">
                {{ session('access.denied') }}
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="container">
            <div class="my-5 flex flex-row justify-center my2 alert alert-success">
                {{ session('message') }}
            </div>
        </div>
    @endif


    {{-- sezione hero contenente bottone che porta alla creazione annuncio --}}
     
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <!-- L'annuncio viene visualizzato solo dagli utenti loggati -->
                 @if(auth()->check())
                    <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('announcements.create') }}">Crea il tuo
                    annuncio</a>
                 @endif
            </div>
        </header>
  

        {{-- categorie annunci --}}
        <section class="page-section bg-light" id="category">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Categorie</h2>
            <h3 class="section-subheading text-muted mt-5mb-5">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row align-items-start">
            @foreach ($categories as $category)
                <div class=" col-12 col-lg-4 col-sm-6 mb-4">
                    <!-- categorie-->
                    <div class="category-item">
                        <a class="category-link" data-bs-toggle="modal" href="#categoryModal{{ $category->id }}">
                            <div class="category-hover">
                                <div class="category-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/3374197/pexels-photo-3374197.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="..." />
                        </a>
                        <div class="category-caption">
                            <div class="category-caption-heading">{{ $category->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- modale categorie --}}
@foreach ($categories as $category)
    <div class="category-modal modal fade" id="categoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- label per chiusura modale -->
                <label for="chiudi-modale{{ $category->id }}"><div class="close-modal"><i class="fa-solid fa-x" style="color: #050505;"></i></div></label>
                <!-- body modale -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <h2 class="text-uppercase">{{ $category->name }}</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg"
                                    alt="..." />
                                <p> Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Categoria:</strong>
                                        {{ $category->name }}
                                    </li>
                                </ul>
                                <!-- link per visualizzare dettaglio categoria -->
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="categoryModal{{ $category->id }}"
                                type="button">
                                    <a class="text-white" href="{{ route('categoryShow', compact('category')) }}">Visualizza</a>
                                </button>
                                <!-- Bottone di chiusura modale con display none (la label x viene utilizzata per chiudere la modale) -->
                                <button class="btn btn-primary btn-xl text-uppercase d-none" data-bs-dismiss="modal" type="button" id="chiudi-modale{{ $category->id }}"></button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

    {{-- nuovi ultimi  annunci (ragazzi non chiedetemi perchè li ho chiamati product) --}}
    <section id="product1" class="section-p1">
        <h2>Ultimi annunci</h2>
        <p>Dai una occhiata!!</p>
        <div class="pro-container">
            @foreach ($announcements as $announcement)
                <div class="pro">
                    <img src="https://images.pexels.com/photos/1080884/pexels-photo-1080884.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="">
                    <div class="des">
                        <h5>{{ $announcement->title }}</h5>
                        <p class="text-truncate">{{ $announcement->description }}</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>{{ $announcement->price }}</h4>
                        <button type="button" class="btn btn-primary"><a class="text-white"
                                href="{{ route('announcements.show', $announcement->id) }}">Visualizza</a></button>
                                <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="card-link btn btn-success shadow">Categoria:
                                {{ $announcement->category->name }}</a>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            @endforeach
        </div>
    </section>


    {{-- lavora con noi --}}
    <div class="container my-5 py-5">
        <div class="row">
            <div class="card col-12 shadow py-5">
                <div class="col-12 card-body text-center">
                    <h2 class="display-2 col-12 card-title">LAVORA CON NOI</h2>
                    <p class="card-text col-12 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="{{ route('request.revisor') }}" class="btn btn-lg btn-primary">DIVENTA REVISORE</a>
                </div>
            </div>
        </div>
    </div>

    <!-- contattaci-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center p-5">
                <h2 class="section-heading text-uppercase ">Contattaci</h2>
                <h3 class="section-subheading mb-2 text-white">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <form id="contactForm">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Your Name *"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email-->
                            <input class="form-control" id="email" type="email" placeholder="Your Email *"
                                data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                required.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit success message-->
                <!---->
                <!-- This is what your users will see when the form-->
                <!-- has successfully submitted-->
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Form submission successful!</div>
                        To activate this form, sign up at
                        <br />
                        <a
                            href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                </div>
                <!-- Submit error message-->
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>
                <!-- Submit Button-->
                <div class="text-center "><button class="btn btn-primary btn-xl text-uppercase disabled"
                        id="submitButton" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>





</x-layout>
