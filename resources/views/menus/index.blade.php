<x-guest-layout>
<!-- Categories Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu</h5>
                <h1 class="mb-5">Všechny naše pokrmy</h1>
            </div>
            <div class="row g-4">
                @foreach($menus as $menu)
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid rounded" src="/storage/{{ $menu->image }}" alt="" style="width: 80px; height: 80px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column text-start ps-4">
                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                    <span>{{ $menu->name }}</span>
                                    <span class="text-primary">{{ $menu->price }} Kč</span>
                                </h5>
                                <small class="fst-italic">{{ $menu->description }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<!-- Categories End -->
</x-guest-layout>