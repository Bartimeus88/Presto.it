<x-layout>
    <x-navbar />

    {{-- <h1 class="display-1 text-center my-5">Presto.it</h1> --}}



    {{-- hero --}}
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
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
    </section>


    @if(session()->has('access.denied'))
                <div class="container">
                    <div class="my-5 flex flex-row justify-center my2 alert alert-danger">
                    {{session('access.denied')}}
                    </div>
                </div>    
                  @endif  
                  @if(session()->has('message'))
                  <div class="container">
                    <div class="my-5 flex flex-row justify-center my2 alert alert-success">
                    {{session('message')}}
                    </div>
            </div>    
                  @endif                

    @if (auth()->check())
        <div class="container my-5">
            <div class="row">
                <div class="card">
                    <div class="card-body my-5">
                        <div class="col-12 text-center display-4 mb-4">
                            Crea il tuo annuncio
                        </div>
                        <div class="col-12 text-center">
                            <a class="btn shadow-lg btn-primary px-2 py-2"
                                href="{{ route('announcements.create') }}">Crea
                                il tuo annuncio personalizzato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="container">
        <div class="row">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">Last announcements</h1>
                    </div>

                </div>
            </div>
            @foreach ($announcements as $announcement)
                <div class="col-12 col-lg-4">
                    <div class="card shadow-lg my-4">
                        <img src="http://picsum.photos/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Titolo : {{ $announcement->title }}</h5>
                            <p class="card-text text-truncate">Descrizione : {{ $announcement->description }}</p>
                            <p class="card-text mb-2">Prezzo : {{ $announcement->price }} €</p>
                            <a href="{{ route('announcements.show', $announcement->id) }}"
                                class="btn btn-primary">Visualizza</a>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="mb-2 card-link btn btn-success shadow">Categoria:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- {{-- categories --}}
    <section class="explore-section section-padding d-none" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="mb-4">Categories</h1>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="design-tab" data-bs-toggle="tab"
                            data-bs-target="#design-tab-pane" type="button" role="tab"
                            aria-controls="design-tab-pane" aria-selected="true">Motori</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="marketing-tab" data-bs-toggle="tab"
                            data-bs-target="#marketing-tab-pane" type="button" role="tab"
                            aria-controls="marketing-tab-pane" aria-selected="false">Informtica</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="finance-tab" data-bs-toggle="tab"
                            data-bs-target="#finance-tab-pane" type="button" role="tab"
                            aria-controls="finance-tab-pane" aria-selected="false">Elettrodomestici</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane"
                            type="button" role="tab" aria-controls="music-tab-pane"
                            aria-selected="false">Music</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="education-tab" data-bs-toggle="tab"
                            data-bs-target="#education-tab-pane" type="button" role="tab"
                            aria-controls="education-tab-pane" aria-selected="false">Education</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel"
                            aria-labelledby="design-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Web Design</h5>

                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>

                                                <span class="badge bg-design rounded-pill ms-auto">14</span>
                                            </div>

                                            <img src="images/topics/undraw_Remote_design_team_re_urdx.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Graphic</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-design rounded-pill ms-auto">75</span>
                                            </div>

                                            <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Logo Design</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-design rounded-pill ms-auto">100</span>
                                            </div>

                                            <img src="images/topics/colleagues-working-cozy-office-medium-shot.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel"
                            aria-labelledby="marketing-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Advertising</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-advertising rounded-pill ms-auto">30</span>
                                            </div>

                                            <img src="images/topics/undraw_online_ad_re_ol62.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Video Content</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-advertising rounded-pill ms-auto">65</span>
                                            </div>

                                            <img src="images/topics/undraw_Group_video_re_btu7.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Viral Tweet</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-advertising rounded-pill ms-auto">50</span>
                                            </div>

                                            <img src="images/topics/undraw_viral_tweet_gndb.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="finance-tab-pane" role="tabpanel"
                            aria-labelledby="finance-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Investment</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-finance rounded-pill ms-auto">30</span>
                                            </div>

                                            <img src="images/topics/undraw_Finance_re_gnv2.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="custom-block custom-block-overlay">
                                        <div class="d-flex flex-column h-100">
                                            <img src="images/businesswoman-using-tablet-analysis-graph-company-finance-strategy-statistics-success-concept-planning-future-office-room.jpg"
                                                class="custom-block-image img-fluid" alt="">

                                            <div class="custom-block-overlay-text d-flex">
                                                <div>
                                                    <h5 class="text-white mb-2">Finance</h5>

                                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur
                                                        adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                                        nam omnis</p>

                                                    <a href="topics-detail.html"
                                                        class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                                </div>

                                                <span class="badge bg-finance rounded-pill ms-auto">25</span>
                                            </div>

                                            <div class="social-share d-flex">
                                                <p class="text-white me-4">Share:</p>

                                                <ul class="social-icon">
                                                    <li class="social-icon-item">
                                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                                    </li>

                                                    <li class="social-icon-item">
                                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                                    </li>

                                                    <li class="social-icon-item">
                                                        <a href="#" class="social-icon-link bi-pinterest"></a>
                                                    </li>
                                                </ul>

                                                <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                            </div>

                                            <div class="section-overlay"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="music-tab-pane" role="tabpanel" aria-labelledby="music-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Composing Song</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-music rounded-pill ms-auto">45</span>
                                            </div>

                                            <img src="images/topics/undraw_Compose_music_re_wpiw.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Online Music</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-music rounded-pill ms-auto">45</span>
                                            </div>

                                            <img src="images/topics/undraw_happy_music_g6wc.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Podcast</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-music rounded-pill ms-auto">20</span>
                                            </div>

                                            <img src="images/topics/undraw_Podcast_audience_re_4i5q.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="education-tab-pane" role="tabpanel"
                            aria-labelledby="education-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Graduation</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-education rounded-pill ms-auto">80</span>
                                            </div>

                                            <img src="images/topics/undraw_Graduation_re_gthn.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.html">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Educator</h5>

                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>

                                                <span class="badge bg-education rounded-pill ms-auto">75</span>
                                            </div>

                                            <img src="images/topics/undraw_Educator_re_ju47.png"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section> -->

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="display-2 col-12">LAVORA CON NOI</h2>
                <a href="{{route('become.revisor')}}" class="btn btn-lg btn-primary">CLICCA QUI</a>
            </div>
        </div>
    </div>

    <x-footer/>
    
</x-layout>
