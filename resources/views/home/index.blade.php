<x-layout>


    {{-- <div class="main_slider" style="background-image: url('https://images.pexels.com/photos/17117787/pexels-photo-17117787/free-photo-of-bianco-e-nero-paesaggio-uomo-persone.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>Bug.it</h6>
                        @if (auth()->check())
                            <h1 class="">Crea il tuo annuncio!!</h1>
                            <div class="red_button shop_now_button btn_crea_annuncio"><a
                                    href="{{ route('announcements.create') }}">{{ __('ui.article_create') }}</a></div>
                        @else
                            <h1>Accedi registrati o per creare il tuo annuncio!!</h1>
                            <div class="green_button shop_now_button bg-success"><a href="/login">{{ __('ui.login') }}</a></div>
                            <div class="green_button shop_now_button bg-succes"><a href="/register">{{ __('ui.register') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- Messaggio che compare dopo aver compilato il form contattaci -->
    <!-- Ina caso di successo: -->
    @if (session('successMessage'))
        <div class="container">
            <div class="my-5 flex flex-row justify-center my2 alert alert-success">
                {{ session('successMessage') }}
            </div>
        </div>
        <!-- nel caso in cui l'ivio non vada a buon fine -->
    @elseif(session('errorMessage'))
        <div class="container">
            <div class="my-5 flex flex-row justify-center my2 alert alert-danger">
                {{ session('errorMessage') }}
            </div>
        </div>
        <!-- nel caso in cui ci siano campi errati nel form -->
    @elseif ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




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
            @if (auth()->check())
                <a class="btn btn-success btn-xl text-uppercase"
                    href="{{ route('announcements.create') }}">{{ __('ui.create_your_announcement') }}</a>
            @endif
        </div>
    </header>

    <!-- INTESTAZIONE CATEGORIE -->
    <section class="page-section " id="category">
        <div class="container ">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('ui.categories') }}</h2>
                <h3 class="section-subheading text-muted mt-5mb-5">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <!-- FOREACH CON LE CATEGORIE -->
            <div class="row align-items-start shadow p-5">
                @foreach ($categories as $category)
                    <div class=" col-12 col-lg-4 col-sm-6 mb-4 ">
                        <!-- categorie-->
                        <div class="category-item shadow">
                            <a class="category-link" data-bs-toggle="modal" href="#categoryModal{{ $category->id }}">
                                <div class="category-hover">
                                    <div class="category-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <!-- contenitore dell'icona della categoria -->
                                <div class="p-5 fs-1 text-center text-body">
                                    <!-- aggiunto contenitore per dare più padding -->
                                    <div class="p-5 fer-icons">
                                        <!-- icona -->
                                        {!! $category->icon !!}

                                    </div>


                                </div>
                            </a>
                            <div class="category-caption bg-transparent shadow">
                                <div class="category-caption-heading text-truncate">
                                    <!-- cambia nome categoria in base alla lingua impostata -->
                                    <!-- quando parte la sessione se la lingua preferita del browser è italiano -->
                                    @if (session('locale') == null && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'it')
                                        {{ $category->name }}
                                        <!-- quando parte la sessione se la lingua preferita del browser è francese -->
                                    @elseif(session('locale') == null && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')
                                        {{ $category->fr }}
                                        <!-- quando l'utente seleziona l'italiano -->
                                    @elseif(session('locale') == 'it')
                                        {{ $category->name }}
                                        <!-- quando l'utente seleziona il francese -->
                                    @elseif(session('locale') == 'fr')
                                        {{ $category->fr }}
                                        <!-- in tutti gli altri casi -->
                                    @else
                                        {{ $category->en }}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- modale categorie --}}
    @foreach ($categories as $category)
        <div class="category-modal modal fade" id="categoryModal{{ $category->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- label per chiusura modale -->
                    <label for="chiudi-modale{{ $category->id }}">
                        <div class="close-modal"><i class="fa-solid fa-x" style="color: #050505;"></i></div>
                    </label>
                    <!-- body modale -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">{{ $category->name }}</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto"
                                        src="https://picsum.photos/id/237/200/300
                                "
                                        alt="..." />
                                    <p> Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt
                                        repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores
                                        repudiandae,
                                        nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>{{ __('ui.category') }}:</strong>
                                            <!-- cambia nome categoria in base alla lingua impostata -->
                                    <!-- quando parte la sessione se la lingua preferita del browser è italiano -->
                                    @if (session('locale') == null && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'it')
                                        {{ $category->name }}
                                        <!-- quando parte la sessione se la lingua preferita del browser è francese -->
                                    @elseif(session('locale') == null && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')
                                        {{ $category->fr }}
                                        <!-- quando l'utente seleziona l'italiano -->
                                    @elseif(session('locale') == 'it')
                                        {{ $category->name }}
                                        <!-- quando l'utente seleziona il francese -->
                                    @elseif(session('locale') == 'fr')
                                        {{ $category->fr }}
                                        <!-- in tutti gli altri casi -->
                                    @else
                                        {{ $category->en }}
                                    @endif
                                        </li>
                                    </ul>
                                    <!-- link per visualizzare dettaglio categoria -->
                                    <button class="btn btn-success btn-xl text-uppercase"
                                        data-bs-dismiss="categoryModal{{ $category->id }}" type="button">
                                        <a class="text-white"
                                            href="{{ route('categoryShow', compact('category')) }}">{{ __('ui.view') }}</a>
                                    </button>
                                    <!-- Bottone di chiusura modale con display none (la label x viene utilizzata per chiudere la modale) -->
                                    <button class="btn btn-primary btn-xl text-uppercase d-none" data-bs-dismiss="modal"
                                        type="button" id="chiudi-modale{{ $category->id }}"></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- nuovi ultimi  annunci (ragazzi non chiedetemi perchè li ho chiamati product) --}}
    {{-- <section id="product1" class="section-p1 shadow my-5 py-5">
        <h2>{{ __('ui.last_announcements') }}</h2>
        <p>{{ __('ui.take_a_look') }}!!</p>
        <div class="pro-container">
            @foreach ($announcements as $announcement)
                <div class="pro">
                    <img src="{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): 'https://picsum.photos/200' }}"
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
                                href="{{ route('announcements.show', $announcement->id) }}">{{ __('ui.view') }}</a></button>
                        <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                            class="card-link btn btn-success shadow">{{ __('ui.category') }}:
                            {{ $announcement->category->name }}</a>
                    </div>
                    {{-- <a href="#"><i class="fal fa-shopping-cart cart"></i></a> --}}
    {{-- </div>
            @endforeach
        </div>
    </section> --}}
    <!-- ULTIMI ANNUNCI -->
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h2 class="section-heading text-uppercase mt-5">{{ __('ui.last_announcements') }}</h2>
                <h3 class="section-subheading text-muted mt-3 pb-5 mb-5 fs-6">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>

            <div class="bg0 m-t-23 p-b-140">
                <div class="container text-center">
                    <div class="row  align-items-start">
                        @foreach ($announcements as $announcement)
                            <div class="col col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">

                                <!-- Block2 -->
                                <div class="block2 mb-2 align-items-start">
                                    <div class="block2-pic hov-img0">
                                        <img src="{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): 'https://picsum.photos/200' }}"
                                            alt="IMG-PRODUCT">

                                        <a href="{{ route('announcements.show', $announcement->id) }}"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            {{ __('ui.view') }}
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                 <!-- cambia nome categoria in base alla lingua impostata -->
                                    <!-- quando parte la sessione se la lingua preferita del browser è italiano -->
                                    @if (session('locale') == null && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'it')
                                        {{ $category->name }}
                                        <!-- quando parte la sessione se la lingua preferita del browser è francese -->
                                    @elseif(session('locale') == null && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')
                                        {{ $category->fr }}
                                        <!-- quando l'utente seleziona l'italiano -->
                                    @elseif(session('locale') == 'it')
                                        {{ $category->name }}
                                        <!-- quando l'utente seleziona il francese -->
                                    @elseif(session('locale') == 'fr')
                                        {{ $category->fr }}
                                        <!-- in tutti gli altri casi -->
                                    @else
                                        {{ $category->en }}
                                    @endif
                                            </a>

                                            <span class="stext-105 cl3">
                                            {{ __('ui.title') }}: {{ $announcement->title }}
                                            </span>
                                            <span class="stext-105 cl3">
                                            {{ __('ui.price') }} {{ $announcement->price }}
                                            </span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- lavora con noi --}}
    <div class="container my-5 py-5 ">
        <div class="row">
            <div class="card col-12 shadow py-5bg-success">
                <div class="col-12 card-body text-center">
                    <h2 class="display-2 col-12 card-title">{{ __('ui.work_with_us') }}</h2>
                    <p class="card-text col-12 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="{{ route('request.revisor') }}"
                        class="btn btn-lg btn-primary">{{ __('ui.become_a_reviewer') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- contattaci-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center p-5">
                <h2 class="section-heading text-uppercase ">{{ __('ui.contact_us') }}</h2>
                <h3 class="section-subheading mb-2 text-white">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <form method="POST" action="{{ route('contact.submit') }}" id="contactForm">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" name="name" id="name" type="text"
                                placeholder="Your Name *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email-->
                            <input class="form-control" name="email" id="email" type="email"
                                placeholder="Your Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" name="phone" id="phone" type="tel"
                                placeholder="Your Phone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                required.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" name="user_message" id="message" placeholder="Your Message *"
                                data-sb-validations="required"></textarea>
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
                <div class="text-center ">
                    <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>

    




</x-layout>
