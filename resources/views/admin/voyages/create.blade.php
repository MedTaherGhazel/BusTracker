<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Travel') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="min-h-screen md:p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <div class="bg-white rounded shadow-lg p-10 px-4 md:p-8 mb-10">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Personal Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <form action="{{ route('admin.voyages.store') }}" class="lg:col-span-1" method="POST">
                            @csrf
                            @method('post')
                            <div class="grid gap-4 gap-y-10 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">

                                    <label for=""><strong>Select Destination :</strong> </label>
                                    <select id="destination" name="destination" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required>

                                        <option value="Bizerte -> Iset Bizerte">Bizerte -> Iset Bizerte</option>
                                    </select>
                                </div>

                                <div class="md:col-span-5">
                                    <label for=""><strong>Select Driver :</strong> </label>
                                    <select type="" id="driver_id" name="driver_id" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required>
                                        <option disabled="disabled" selected="selected">Choose Driver</option>
                                        @foreach ($drivers as $driver)
                                        <option value="{{$driver->id}}">{{$driver->id}}-{{$driver->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="md:col-span-5">
                                    <label for=""><strong>Select Bus :</strong> </label>
                                    <select type="number" id="bus_id" name="bus_id" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required>

                                        <option disabled="disabled" selected="selected" @required(false)>Choose Bus</option>
                                        @foreach ($buses as $bus )

                                        <option value="{{$bus->id}}">{{$bus->id}}-{{$bus->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md:col-span-5">
                                    <label><Strong>Choose start time</Strong></label>
                                    <div class="col-lg-5">
                                        <div class="cs-form">
                                            <input id="heure_depart" name="heure_depart" type="time" class="form-control" value="10:05 AM" name="startTime"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button
                                            type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Voyage</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
