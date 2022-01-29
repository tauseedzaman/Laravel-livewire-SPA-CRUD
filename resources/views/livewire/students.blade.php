<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    @if (session()->has('message'))
        <p class="ml-3 p-6 bg-lime-300 text-black shadow text-center shadow-md border-red-50">{{ session('message') }}
        </p>
    @endif
    @if ($show_form)
        <div class="mx-4 p-6">
            <x-jet-validation-errors
                class="mb-4border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />

            <form wire:submit.prevent="save_student()">
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" wire:model.lazy="name" class="block mt-1 w-full" type="text" name="name"
                        required autofocus autocomplete="name" placeholder="Enter Student Name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input wire:model.lazy="email" id="email" placeholder="Enter Student Email"
                        class="block mt-1 w-full" type="email" name="email" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('School') }}" />
                    <select wire:model.lazy="school" name="school" id="school"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option selected>-- Select School --</option>
                        @foreach ($schools as $school)
                            <option value="{{ $school->name }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-jet-button type="submit" class="block  w-24 text-center mx-auto">
                        <p class="text-center">Save</p>
                    </x-jet-button>
                </div>
            </form>
        </div>
    @else
        <a href="#" class="bg-green-600 text-black shadow p-4">
            <br>
            <x-jet-button wire:click="toggle_form()" class="ml-4 bg-green-700">
                Add Record
            </x-jet-button>
        </a>
        <h1 class="text-center py-5 shadow">Students management system</h1>
        <table class="table w-full ">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>School</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="text-center">
                        <td scope="row">{{ $loop->index }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->school }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Button group">
                                <x-jet-button wire:click="edit({{ $student->id }})" class="ml-4 bg-green-700">
                                    <?xml version="1.0" encoding="UTF-8"?>
                                    <svg class="w-5 h-5 px-0 bg-yellow-700" fill="yellow"
                                        xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="512"
                                        height="512">
                                        <path
                                            d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z" />
                                        <path
                                            d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z" />
                                    </svg>
                                </x-jet-button>

                                <x-jet-button wire:click="destroy({{ $student->id }})" class="ml-4 bg-green-700">
                                    <?xml version="1.0" encoding="UTF-8"?>
                                    <svg class="w-5 h-5" fill="red" xmlns="http://www.w3.org/2000/svg"
                                        id="Outline" viewBox="0 0 24 24" width="512" height="512">
                                        <path
                                            d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z" />
                                        <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z" />
                                        <path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                    </svg>
                                </x-jet-button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="p-3 mx-4">
            {{ $students->links() }}
        </div>
    @endif

</div>
