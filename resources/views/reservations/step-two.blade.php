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
                        <form method="POST" action="{{ route('reservations.store.step.two') }}">
                            @csrf
                            <div class="sm:col-span-6 pt-5">
                                <label for="table_id" class="block text-sm font-medium text-gray-700">Stůl</label>
                                <div class="mt-1">
                                    <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1 @error('table_id') border-red-400 @enderror">
                                        @foreach($tables as $table)
                                            <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->name }} ({{ $table->number_of_guests }} lidi)</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('table_id')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-6 p-4">
                                <a href="{{ route('reservations.step.one') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Zpět</a>
                                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Vytvořit rezervaci</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->
</x-guest-layout>
