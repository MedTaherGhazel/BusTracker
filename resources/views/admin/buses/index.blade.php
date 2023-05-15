<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('manage roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Add Bus Form --}}
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div
                                class="block max-w-md rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] ">
                                <form action="{{ route('admin.buses') }}">
                                    @csrf
                                    @method('post')
                                    <div class="grid grid-cols-2 gap-4">
                                        <!--Bus id input-->
                                        <div class="relative mb-6" data-te-input-wrapper-init>
                                            <input type="number"
                                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="busid"~ name="busid" placeholder="busid" required />
                                            <label for="busid"
                                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none black">Bus
                                                ID
                                            </label>
                                        </div>

                                        <div class="relative mb-6" data-te-input-wrapper-init>
                                            <input type="text"
                                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="brand" name="brand" placeholder="brand" required />
                                            <label for="brand"
                                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark">Brand
                                                name
                                            </label>
                                        </div>

                                        <button type="submit"
                                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button">Add bus</button>


                                    </div>
                                </form>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                </div>

                            </div>
                            {{-- Show all bus form --}}
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                                <div class="block w-full overflow-x-auto">
                                    <table class="items-center bg-transparent w-full border-collapse ">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Bus id
                                                </th>
                                                <th
                                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Brand
                                                </th>

                                                <th
                                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    State
                                                </th>
                                                <th
                                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($buses as $bus)
                                                <tr>
                                                    <th
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                                        {{ $bus->id }}
                                                    </th>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                                        {{ $bus->brand }}
                                                    </td>

                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        @if ($bus->dispo == 0)
                                                            <i class="fas fa-arrow-up text-emerald-500 mr-4">Dispo</i>
                                                        @else
                                                            <i class="fas fa-arrow-down text-red-500 mr-4">Not Dispo</i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="static ...">
                                                            <!-- Static parent -->
                                                            <div class="inline-block ">
                                                                <button {{ route('admin.buses.edit', $bus->id) }}
                                                                    class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                                    type="button" x-data=""
                                                                    x-on:click.prevent="$dispatch('open-modal', 'update-modal')">{{ __('Edit') }}

                                                                </button>
                                                            </div>
                                                            <!-- Static parent -->
                                                            <div class="inline-block">
                                                                <form
                                                                    action="{{ route('admin.buses.destroy', [$bus->id]) }}"
                                                                    onsubmit=return x onclick="deleteConfirm(event)"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="bg-indigo-500 text-black active:bg-indigo-600 text-xs font-bold uppercase px-2 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                                        type="button">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    <x-modal name="update-modal" class="background color:white">
                                        <div class="flex w-full h-full p-4 bg-white rounded-lg shadow-lg ">
                                            <div class="p-6">
                                                <h2 class="text-lg font-medium text-gray-900 ">
                                                    {{ __('Update bus information') }}
                                                </h2>

                                                {{-- Update bus info --}}
                                                <div
                                                    class="block max-w-md rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] ">
                                                    <form action="{{ route('admin.buses') }}">
                                                        @csrf
                                                        @method('put')
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <!--Bus id input-->
                                                            <div class="relative mb-6" data-te-input-wrapper-init>
                                                                <label for="busid">Bus ID</label>
                                                                <input type="number" value="{{ $bus->id }}"
                                                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                                    id="busid"~ name="busid"
                                                                    placeholder="busid" />
                                                            </div>

                                                            <div class="relative mb-6" data-te-input-wrapper-init>
                                                                <label for="brand">Brand name
                                                                </label>
                                                                <input type="text"
                                                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                                    id="brand" name="brand" placeholder="brand"
                                                                    required />
                                                                <div
                                                                    class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                                                </div>

                                                            </div>

                                                            <div class="mt-6 flex justify-end">
                                                            </div>

                                                            <div class="static ...">
                                                                <!-- Static parent -->
                                                                <div class="inline-block ">
                                                                    <button type="submit"
                                                                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                                        type="button">Add bus</button>
                                                                </div>
                                                                <!-- Static parent -->
                                                                <div class="inline-block">
                                                                    <button x-on:click="$dispatch('close')"
                                                                        class="bg-indigo-500 text-red active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                                                        {{ __('Cancel') }}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>


                                                </div>
                                                </form>
                                    </x-modal>
                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-admin-layout>
