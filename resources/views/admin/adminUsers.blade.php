<x-app-layout>
    @include('layouts.adminNavigation')
    @if(isset($status))
        <x-status-success>
            {{$status}}
        </x-status-success>
    @endif
    @if($all_users->isEmpty() || ($all_users->count() === 1 && $all_users->first()->id === Auth::user()->id))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        No user yet! (except you)
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        @foreach($all_users as $user)
            @if(Auth::user()->id != $user->id)
                <div class="w-full flex flex-row sm:justify-center mb-8">
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <h2 class="text-lg font-medium text-gray-900 mb-6">
                            Edit user {{$user['name']}}:
                        </h2>
                        <div class="py-2">
                            <form method="POST" action="{{route('adminEditUser.patch')}}">
                                @csrf
                                @method('PATCH')
                                <div class="flex justify-between">
                                    <div class="mt-4">
                                        <x-input-label class="text-2xl"><span
                                                class="text-black">ID :</span> {{$user['id']}}</x-input-label>
                                        <input type="hidden" name="id" value="{{$user['id']}}"/>
                                    </div>
                                    <div class="mt-4">
                                        <x-input-label>Firstname :</x-input-label>
                                        <x-text-input value="{{$user['name']}}" type="text"
                                                      name="name"
                                                      class="@error('name') is-invalid @enderror"></x-text-input>
                                        @error('firstname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div class="mt-4">
                                        <x-input-label>Email :</x-input-label>
                                        <x-text-input value="{{$user['email']}}" type="email" name="email"
                                                      class="@error('email') is-invalid @enderror"></x-text-input>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mt-4">
                                        <x-input-label>is Admin :</x-input-label>
                                        <x-text-input value="{{$user['admin']}}" type="text" name="admin"
                                                      class="@error('admin') is-invalid @enderror"></x-text-input>
                                        @error('admin')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <x-secondary-button class="mt-6" type="submit" value="envoyer">Send
                                </x-secondary-button>
                                <x-a-delete-button class="mt-6" href="/deleteUser/{{$user['id']}}">Delete
                                </x-a-delete-button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</x-app-layout>
