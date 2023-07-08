<div class="py-2 ">
    <h2 class="text-lg font-medium text-gray-900 mb-6">
        Contact Form :
    </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="max-w-xl">
            <form method="POST" action="{{route('contactStore.post')}}">
                @csrf
                <div class="mt-4">
                    <x-input-label>Lastname :</x-input-label>
                    <x-text-input type="text" name="lastname" value="{{old('lastname')}}"
                                  class="block mt-1 w-full @error('lastname')  @enderror"></x-text-input>
                    @error('lastname')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-input-label>Firstname :</x-input-label>
                    <x-text-input type="text" name="firstname" value="{{old('firstname')}}"
                                  class="block mt-1 w-full @error('firstname')  @enderror"></x-text-input>
                    @error('firstname')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-input-label>Email :</x-input-label>
                    <x-text-input type="email" name="email" id="email" value="{{old('email')}}"
                                  class="block mt-1 w-full @error('email')  @enderror"></x-text-input>
                    <span id="spEmail" class="text-red-500" style="display: none"><small> The email must respect at least this format "x@x.xx".</small></span>
                    @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-input-label>Phone number :</x-input-label>

                    <x-text-input type="text" name="phone" id="phone" value="{{old('phone')}}"
                                  class="block mt-1 w-full @error('phone')  @enderror"></x-text-input>
                    <input type="hidden" name="phoneHiddenInput" id="phoneHiddenInput"/>
                    <span id="spPhone" class="text-red-500"
                          style="display: none;"></span>
                </div>
                @error('phone'||'phoneHiddenInput')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <x-input-label>Address :</x-input-label>
            <x-text-input type="text" name="address" value="{{old('address')}}"
                          id="address" class="block mt-1 w-full @error('address')  @enderror"></x-text-input>
            <div id="selection" style="display: none;" class="data"></div>
            @error('address')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-4">
            <x-input-label>Zip code :</x-input-label>
            <x-text-input type="text" name="postalCode" value="{{old('postalCode')}}"
                          id="postalCode" class="block mt-1 w-full @error('postalCode')  @enderror"></x-text-input>
            @error('postalCode')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <x-input-label>City :</x-input-label>
            <x-text-input type="text" name="city" value="{{old('city')}}"
                          id="city" class="block mt-1 w-full @error('city')  @enderror"></x-text-input>
            @error('city')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <x-input-label>Commentary:</x-input-label>
            <x-text-area name="commentary"
                         class="block mt-1 w-full @error('commentary')  @enderror">{{old('commentary')}}</x-text-area>
            @error('commentary')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-secondary-button type="submit" value="envoyer">Send</x-secondary-button>
        </div>
        </form>
    </div>
</div>
</div>
