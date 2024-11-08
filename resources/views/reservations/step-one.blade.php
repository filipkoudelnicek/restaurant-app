<x-guest-layout>
    <!-- Categories Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            </div>
        </div>
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Rezervace</h5>
                        <h1 class="text-white mb-4">Zarezervujte si stůl online</h1>
                        <form method="POST" action="{{ route('reservations.store.step.one') }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Jméno</label>
                                <div class="mt-1">
                                    <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name ?? '' }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('first_name') border-red-400 @enderror" />
                                </div>
                                @error('first_name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Příjmení</label>
                                <div class="mt-1">
                                    <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name ?? '' }}"class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('last_name') border-red-400 @enderror" />
                                </div>
                                @error('last_name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input type="email" id="email" name="email" value="{{ $reservation->email ?? '' }}"class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-400 @enderror" />
                                </div>
                                @error('email')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Telefonní číslo</label>
                                <div class="mt-1">
                                    <input type="text" id="phone_number" name="phone_number" value="{{ $reservation->phone_number ?? '' }}"class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('phone_number') border-red-400 @enderror" />
                                </div>
                                @error('phone_number')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <label for="reservation_date" class="block text-sm font-medium text-gray-700">Datum rezervace</label>
                                <div class="mt-1">
                                    <input type="datetime-local" id="reservation_date" name="reservation_date" min=" {{ $min_date->format('Y-m-d\TH:i:s') }}" max=" {{ $max_date->format('Y-m-d\TH:i:s') }}" value="{{ $reservation ?? '' }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('reservation_date') border-red-400 @enderror" />
                                </div>
                                @error('reservation_date')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <label for="number_of_guests" class="block text-sm font-medium text-gray-700">Počet lidí</label>
                                <div class="mt-1">
                                    <input type="number" id="number_of_guests" name="number_of_guests" value="{{ $reservation->number_of_guests ?? '' }}"class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('number_of_guests') border-red-400 @enderror" />
                                </div>
                                @error('number_of_guests')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-6 p-4">
                                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Další</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->
</x-guest-layout>
