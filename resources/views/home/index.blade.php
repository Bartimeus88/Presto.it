<x-layout>


    {{-- hero (if you are autenticate , you can create announcement) --}}
    <div class="main_slider" style="background-image: url('')">
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
                            <div class="red_button shop_now_button"><a href="/login">{{ __('ui.login') }}</a></div>
                            <div class="red_button shop_now_button"><a href="/register">{{ __('ui.register') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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





    <!-- INTESTAZIONE CATEGORIE -->
    <section class="page-section " id="category">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('ui.categories') }}</h2>
                <h3 class="section-subheading text-muted mt-5mb-5">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <!-- FOREACH CON LE CATEGORIE -->
            <div class="row align-items-start shadow p-5">
                @foreach ($categories as $category)
                    <div class=" col-12 col-lg-4 col-sm-6 mb-4">
                        <!-- categorie-->
                        <div class="category-item shadow">
                            <a class="category-link" data-bs-toggle="modal" href="#categoryModal{{ $category->id }}">
                                <div class="category-hover">
                                    <div class="category-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <!-- contenitore dell'icona della categoria -->
                                <div class="p-5 fs-1 text-center text-body">
                                    <!-- aggiunto contenitore per dare più padding -->
                                    <div class="p-5">
                                        <!-- icona -->
                                        {!! $category->icon !!}

                                    </div>


                                </div>
                            </a>
                            <div class="category-caption bg-transparent shadow">
                                <div class="category-caption-heading">
                                    <!-- cambia nome categoria in base alla lingua impostata -->
                                    @if (session('locale') == 'it')
                                        {{ $category->name }}
                                    @elseif(session('locale') == 'fr')
                                        {{ $category->fr }}
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
                                            {{ $category->name }}
                                        </li>
                                    </ul>
                                    <!-- link per visualizzare dettaglio categoria -->
                                    <button class="btn btn-primary btn-xl text-uppercase"
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

    {{-- last announcements  --}}
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Ultimi annunci</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid"
                        data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <!-- Product 1 -->
                        @foreach ($announcements as $announcement)
                            <div class="product-item men">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): 'https://picsum.photos/200' }}"
                                            alt="">
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div
                                        class="product_price product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center text-center">
                                        <span>{{ $announcement->price }}</span></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a
                                                href="{{ route('categoryShow', ['category' => $announcement->category]) }}">Categoria:
                                                {{ $announcement->category->name }}</a></h6>
                                        <div class="text-truncate">Titolo. {{ $announcement->title }}</div>
                                        <div class="text-truncate">Descrizione: {{ $announcement->description }}</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a
                                        href="{{ route('announcements.show', $announcement->id) }}">Visualizza</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- lavora con noi --}}
    <div class="container my-5 py-5">
        <div class="row">
            <div class="card col-12 shadow py-5">
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
