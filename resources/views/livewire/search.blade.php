<div>
    @livewireStyles
    @vite('resources/css/app.css')


    {{-- Load Navbar --}}
    @livewire('navbar')

    <div class="bg-white pt-20 pr-3 pb-2 pl-3">
        <div class="pt-0 pr-3 pb-0 pl-3 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-5 lg:px-12">
            <div class="bg-white rounded-xl sm:p-10">
                <div class="grid lg:gap-x-10 lg:grid-cols-12 lg:gap-y-8 grid-cols-1">
                    <div class="hidden lg:col-span-5 lg:block">
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1035&amp;q=80"
                            class="btn- rounded-2xl w-full h-full object-cover" />
                    </div>
                    <div class="pt-8 pr-8 pb-8 pl-8 lg:col-span-7">
                        <p class="text-gray-900 text-left font-extrabold leading-snug tracking-tight mb-4 md:text-4xl">
                            Flights</p>
                        <div>
                            <div class="grid grid-cols-2 gap-4"></div>
                        </div>
                        <div>

                            {{-- Check if there are any errors --}}
                            {{-- @isset($errors)
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endisset --}}

                            {{-- Form for flight search --}}
                            <form action="{{ route('findflight.find') }}" method="post">@csrf
                                <div class="w-full mt-3 mr-auto mb-3 ml-auto">
                                    <label class="block text-sm font-medium text-gray-700">Departure Airport *</label>
                                    <div class="mt-1 mr-0 mb-0 ml-0">
                                        <input name="departure_airport" placeholder="Ex: YUL" type="text" required
                                            class="border focus:ring-indigo-500 focus:border-indigo-500
                                sm:text-sm w-full block h-10 border-gray-300 shadow-sm rounded-md px-3" />
                                    </div>
                                </div>
                                <div class="w-full mt-0 mr-auto mb-3 ml-auto">
                                    <label class="block text-sm font-medium text-gray-700">Arrival Airport *</label>
                                    <div class="mt-1 mr-0 mb-0 ml-0">
                                        <input name="arrival_airport" placeholder="Ex: YVR" type="text" required
                                            class="border focus:ring-indigo-500 focus:border-indigo-500
                                sm:text-sm w-full block h-10 border-gray-300 shadow-sm rounded-md px-3" />
                                    </div>
                                </div>
                                <div class="w-full mt-0 mr-auto mb-4 ml-auto">
                                    <label class="block text-sm font-medium text-gray-700">Departure Date</label>
                                    <div class="mt-1 mr-0 mb-0 ml-0">
                                        <input name="departure_date" placeholder="Ex: 14-06-2023" type="text"
                                            class="border focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm w-full block h-10 border-gray-300 shadow-sm rounded-md px-3" />
                                    </div>
                                </div>
                                <div class="w-full mt-0 mr-auto mb-4 ml-auto">
                                    <label class="block text-sm font-medium text-gray-700">Arrival Date</label>
                                    <div class="mt-1 mr-0 mb-0 ml-0">
                                        <input name="arrival_date" placeholder="Ex: 24-06-2023" type="text"
                                            class="border focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm w-full block h-10 border-gray-300 shadow-sm rounded-md px-3" />
                                    </div>
                                </div>
                                <div class="w-full mt-0 mr-auto mb-4 ml-auto">
                                    <label class="block text-sm font-medium text-gray-700">Trip type *</label>
                                    <div class="mt-1 mr-0 mb-0 ml-0">
                                        <input name="trip_type"
                                            placeholder="Ex: &quot;one-way&quot; or &quot;round-trip&quot;"
                                            type="text" required
                                            class="border
                                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm w-full block h-10 border-gray-300 shadow-sm
                                rounded-md px-3" />
                                    </div>
                                </div>
                                <div class="w-full mt-0 mr-auto mb-4 ml-auto"></div>
                                <div>
                                    <button
                                        class="hover:bg-gray-600 rounded-md text-xl pt-3 pr-3 pb-3 pl-3 bg-gray-800 font-semibold text-white
                            w-full text-center"><a
                                            href="">Submit</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        @if (empty($response->items))
            <h2
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 md:text-2xl lg:text-3xl dark:text-black">
                No flights were found!</h2>
        @endif
    </div>

    {{-- Table to show the relevant data --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-40">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Airline IATA
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Flight Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Departure Airport
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Departure Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Arrival Airport
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Arrival Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @isset($response)
                    @foreach ($response as $flight)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $flight->iata }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $flight->number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $flight->departure_airport }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $flight->departure_time }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $flight->arrival_airport }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $flight->arrival_time }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $flight->price }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <br>
                                <a href="#"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>

    @livewireScripts
</div>
