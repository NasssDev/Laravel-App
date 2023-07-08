@auth
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact
            </h2>
        </x-slot>
        @if(session('confirm')||isset($status))
            <div class="py-12" id="notifDiv">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if(isset($status))
                        <div class="bg-green-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-green-600">
                                {{$status}}
                            </div>
                        </div>
                    @elseif(session('confirm'))
                        <div class="bg-indigo-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-indigo-600">
                                {{session('confirm')}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @include('formContact')
            </div>
        </div>
    </x-app-layout>
@else
    <x-guest-layout>
        @if(isset($status))
            <x-status-success>
                {{$status}}
            </x-status-success>
        @endif
        @include('formContact')
    </x-guest-layout>
@endauth
<script>
    const inputMail = document.querySelector('#email');
    const spEmail = document.querySelector('#spEmail');

    inputMail.addEventListener('input', () => {
        let regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let emailTested = regEx.test(email.value);

        if (emailTested) {
            spEmail.style.display = 'none';
            inputMail.classList.add("border-green-500", "focus:border-green-500", "focus:ring-green-500");
            inputMail.classList.remove("border-gray-500", "focus:border-gray-500", "focus:ring-gray-500", "border-red-500", "focus:border-red-500", "focus:ring-red-500");
        } else {
            spEmail.style.display = 'block';
            inputMail.classList.add("border-red-500", "focus:border-red-500", "focus:ring-red-500");
            inputMail.classList.remove("border-green-500", "focus:border-green-500", "focus:ring-green-500", "border-gray-500", "focus:border-gray-500", "focus:ring-gray-500");
        }
    });




</script>
