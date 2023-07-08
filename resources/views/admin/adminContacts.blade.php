<x-app-layout>
    @include('layouts.adminNavigation')
    @if(isset($status))
        <x-status-success>
            {{$status}}
        </x-status-success>
    @endif
    @if($all_contacts->isEmpty())
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            No contact yet!
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        @foreach($all_contacts as $contact)
            <div class="w-full flex flex-row sm:justify-center mb-8">
                {{-- Div de récap --}}
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mr-4">
                    <h2 class="text-lg font-medium text-gray-900 mb-6">
                        Check information:
                    </h2>
                    <div class="py-2">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="max-w-xl">
                                <div
                                    class="flex justify-between px-4 py-3 bg-white border-b-2 border-indigo-400 overflow-hidden sm:rounded-lg">
                                    <div class="mt-4">
                                        <label class="underline">ID:</label>
                                        <x-input-label>{{ $contact['id']  }}</x-input-label>
                                    </div>
                                    <div class="mt-4">
                                        <label class="underline">Lastname:</label>
                                        <x-input-label>{{ $contact['lastname']  }}</x-input-label>
                                    </div>
                                    <div class="mt-4">
                                        <label class="underline">Firstname:</label>
                                        <x-input-label>{{ $contact['firstname']  }}</x-input-label>
                                    </div>
                                </div>

                                <div
                                    class="flex justify-between mt-6 px-4 py-2 bg-white border-b-2 border-indigo-400 overflow-hidden sm:rounded-lg">
                                    <div class="mt-4">
                                        <label class="underline">Email:</label>
                                        <x-input-label>{{ $contact['email']  }}</x-input-label>
                                    </div>
                                    <div class="mt-4">
                                        <label class="underline">Phone number:</label>
                                        <x-input-label>{{ $contact['phone']  }}</x-input-label>
                                    </div>
                                </div>

                                <div
                                    class="flex justify-between mt-10 px-4 py-2 bg-white border-b-2 border-indigo-400 overflow-hidden sm:rounded-lg">
                                    <div class="mt-4">
                                        <label class="underline">Address:</label>
                                        <x-input-label>{{ $contact['address']  }}</x-input-label>
                                    </div>
                                    <div class="mt-4">
                                        <label class="underline">Zip code:</label>
                                        <x-input-label>{{ $contact['code_postal']  }}</x-input-label>
                                    </div>
                                    <div class="mt-4">
                                        <label class="underline">City:</label>
                                        <x-input-label>{{ $contact['city']  }}</x-input-label>
                                    </div>
                                </div>
                                <div
                                    class="mt-10 px-4 py-2 bg-white border-b-2 border-indigo-400 overflow-hidden sm:rounded-lg">
                                    <label class="underline">Commentary:</label>
                                    <div>{!! nl2br($contact['commentary']) !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Div de modification --}}
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900 mb-6">
                        Edit information:
                    </h2>
                    <div class="py-2">
                        <form method="POST" action="/admin/{{$contact['id']}}">
                            @csrf
                            @method('PATCH')
                            <div class="flex justify-between">
                                <div class="mt-4">
                                    <x-input-label>Lastname :</x-input-label>
                                    <x-text-input value="{{$contact['lastname']}}" type="text"
                                                  name="lastname"
                                                  class="@error('lastname') is-invalid @enderror"></x-text-input>
                                    @error('lastname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <x-input-label>Firstname :</x-input-label>
                                    <x-text-input value="{{$contact['firstname']}}" type="text"
                                                  name="firstname"
                                                  class="@error('firstname') is-invalid @enderror"></x-text-input>
                                    @error('firstname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="mt-4">
                                    <x-input-label>Email :</x-input-label>
                                    <x-text-input value="{{$contact['email']}}" type="email" name="email"
                                                  class="@error('email') is-invalid @enderror"></x-text-input>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <x-input-label>Phone number :</x-input-label>
                                    <x-text-input value="{{$contact['phone']}}" type="text" name="phone"
                                                 class="@error('phone') is-invalid @enderror"></x-text-input>
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <div class="mt-4">
                                    <x-input-label>Address :</x-input-label>
                                    <x-text-input value="{{$contact['address']}}" type="text" name="address"
                                                  class="@error('address') is-invalid @enderror"></x-text-input>
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <x-input-label>Zip code :</x-input-label>
                                    <x-text-input value="{{$contact['code_postal']}}" type="text"
                                                  name="postalCode"
                                                  class="@error('postalCode') is-invalid @enderror"></x-text-input>
                                    @error('postalCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-4">
                                <x-input-label>City :</x-input-label>
                                <x-text-input value="{{$contact['city']}}" type="text" name="city"
                                              class="w-full @error('city') is-invalid @enderror"></x-text-input>
                                @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-input-label>Commentary:</x-input-label>
                                <x-text-area name="commentary"
                                             wrap="soft"
                                             class="w-full @error('commentary') is-invalid @enderror"
                                >{!! str_replace('<br />', "\n", $contact['commentary']) !!}</x-text-area>
                            </div>

                            <div class="mt-4">
                                @error('commentary')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <x-secondary-button type="submit" value="envoyer">Send</x-secondary-button>
                            <x-a-delete-button class="mt-6" href="/deleteContact/{{$contact['id']}}">Delete
                            </x-a-delete-button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
