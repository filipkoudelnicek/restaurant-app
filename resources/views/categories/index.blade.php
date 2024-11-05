<x-guest-layout>
<!-- Categories Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Kategorie</h5>
                <h1 class="mb-5">Všechny naše kategorie</h1>
            </div>
            <div class="row g-4">
                
            @foreach($categories as $category)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="categories-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="/storage/{{ $category->image }}" alt="">
                        </div>
                        <h5 class="mb-0">{{ $category->name }}</h5>
                        <small>{{ $category->description }}</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href="{{ route('categories.show', $category->id) }}">Zobrazit kategorii</a>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </div>
    <!-- Categories End -->
</x-guest-layout>