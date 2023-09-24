<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-dark"> Benvenuto {{ auth()->user()->name }} </h1c>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <h1 class="text-center">I tuoi annunci verificati</h1>
            @foreach ($announcements as $announcement)
                <div class="col-12 col-lg-4">
                    <div class="card shadow-lg my-4">
                        <div class="image_with_badge_container">
                        <img src="{{$announcement->images()->first()->getUrl(400, 300)}}" class="card-img-top" alt="...">
                        @if ($announcement->is_accepted == 1)
                        <span class="badge text-bg-success px-3 py-2 badge-on-image">VERIFICATO</span>
                        @elseif($announcement->is_accepted == NULL)
                        <span class="badge text-bg-warning px-3 py-2 badge-on-image">DA VERIFICARE</span>
                        @else
                        <span class="badge text-bg-danger">RIFIUTATO</span>
                        @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Titolo : {{ $announcement->title }}</h5>
                            <p class="card-text text-truncate">Descrizione : {{ $announcement->description }}</p>
                            <p class="card-text">Prezzo : {{ $announcement->price }} €</p>
                            <a href="{{ route('announcements.show', $announcement->id) }}"
                                class="btn btn-primary">Visualizza</a>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="card-link btn btn-success shadow">Categoria:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                            <div class="col-12 row justify-content-center">
                                <div class="col-6">
                                    <a class="text-center" href="{{route('announcements.edit', [$announcement->id])}}">Modifica</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{route('announcements.destroy', [$announcement->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="elimina">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

        </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="text-center">
                <h1 class="section-heading text-uppercase mt-5 text-dark">{{ __('ui.last_announcements') }}</h1>
                <h1 class="section-subheading text-muted mt-3 pb-5 mb-5 fs-6">
                </h1>
            </div>

            <div class="bg0 m-t-23 p-b-140">
                <div class="container text-center">
                    <div class="row  align-items-start">
                        @foreach ($announcements as $announcement)
                            <div class="col col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">

                                <!-- Block2 -->
                                <div class="block2 mb-2 align-items-start">
                                    <div class="image_with_badge_container">
                                        <img src="{{ $announcement->images()->first()->getUrl(400, 300) }}"
                                            class="card-img-top" alt="...">
                                        @if ($announcement->is_accepted == 1)
                                            <span
                                                class="badge text-bg-success px-3 py-2 badge-on-image">VERIFICATO</span>
                                        @elseif($announcement->is_accepted == null)
                                            <span class="badge text-bg-warning px-3 py-2 badge-on-image">DA
                                                VERIFICARE</span>
                                        @else
                                            <span class="badge text-bg-danger">RIFIUTATO</span>
                                        @endif
                                    </div>
                                    <div class="block2-pic hov-img0">
                                        <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(400, 300): 'https://picsum.photos/200' }}"
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
    </div> --}}

</x-layout>
