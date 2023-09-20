<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="display-1 text-center">
                {{__('ui.our_announcements')}}
                </h2>
            </div>
        </div>
    </div>
    <!-- Container annunci -->
    <div class="container my-5">
        <div class="row">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-lg-4">
                    <!-- Card -->
                    <div class="card shadow-lg my-4">
                        <!-- immagine dell'annuncio -->
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/400/300'}}" class="card-img-top" alt="{{ $announcement->title }}">
                        <div class="card-body">
                            <!-- titolo e corpo dell'annuncio -->
                            <h5 class="card-title">{{__('ui.title')}} : {{ $announcement->title }}</h5>
                            <p class="card-text text-truncate">{{__('ui.description')}} : {{ $announcement->description }}</p>
                            <p class="card-text">{{__('ui.price')}} : {{ $announcement->price }} €</p>
                            <a href="{{ route('announcements.show', $announcement->id) }}"
                                class="btn btn-primary">{{__('ui.view')}}</a>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="card-link btn btn-success shadow">{{__('ui.category')}}:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">{{__('ui.published_on')}}: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
             <!-- Nel caso in cui non ci siano annunci -->
            @empty
                <div class="col-12">
                    <p class="h1 text-center">{{__('ui.no_announcements')}}</p>
                    <p class="h2 text-center">{{__('ui.article_create')}} : <a class="btn btn-primary shadow"
                            href="{{ route('announcements.create') }}">{{__('ui.new_announcement')}}</a></p>
                </div>
            @endforelse
            <!-- Paginazione per gli annunci -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                    </div>{{ $announcements->links() }}
                </div>
            </div>

        </div>
    </div>

    {{-- codice inserito da Gellart --}}
    {{--<x-navbar />

    <section id="page-header">

        <h2 class="text-dark">Ecco</h2>
        <h2 class="text-dark">I</h2>
        <h2 class="text-dark">Nostri annunci</h2>
    </section>


    <section id="product1" class="section-p1">
        <div class="pro-container">
            @foreach ($announcements as $announcement)
                <div class="pro" onclick="window.location.href='sproduct.html'>
       <img src="{{!announcement->images()->get()->isEmpty()?Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" alt="">
                    <div class="des">
                        <span>adidas</span>
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
                        <button type="button" class="btn btn-primary"><a class="text-white "
                                href="{{ $announcement->category->name }}">Categorie</a></button>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            @endforeach
        </div>
    </section>

--}}

</x-layout>
