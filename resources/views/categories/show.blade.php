<x-guest-layout>
    <!-- Categories Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">{{ $category->name }}</h5>
                <h1 class="mb-5">Výpis jídel z kategorie</h1>
            </div>
            <div class="row g-4">
                
            @foreach($category->menus as $menu)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="categories-item text-center rounded">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="/storage/{{ $menu->image }}" alt="">
                        </div>
                        <h5 class="mb-0">{{ $menu->name }}</h5>
                        <small>{{ $menu->description }}</small>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </div>
    <!-- Categories End -->
</x-guest-layout>