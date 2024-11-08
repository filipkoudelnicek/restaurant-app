<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Vytvořit rezervaci</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Jméno a příjmení
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefonní číslo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Datum rezervace
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stůl
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Počet hostů
                        </th>
                        <th scope="col" class="px-6 py-3">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $reservation->first_name }} {{ $reservation->last_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $reservation->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $reservation->phone_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $reservation->reservation_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $reservation->table->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $reservation->number_of_guests }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2 flex justify-end">
                                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Upravit</a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                          method="POST"
                                          action="{{ route( 'admin.reservations.destroy', $reservation->id) }}"
                                          onsubmit="return confirm('Jste si jistí?');">
                                        @csrf
                                        @method(('DELETE'))
                                        <button type="submit">Smazat</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
