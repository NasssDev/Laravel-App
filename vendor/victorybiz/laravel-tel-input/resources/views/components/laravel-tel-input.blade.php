{{-- Hidden phone input --}}
<input
  type="hidden"
  {{ $attributes->wire('model') }}
  id="{{ $id }}"
  name="{{ $name }}"
  @if ($attributes->has('value'))
    value="{{ $attributes->get('value') }}"
  @endif
  autocomplete="off"
>
{{-- Tel input --}}
<span wire:ignore>
  <input
    type="tel"
    class="iti--laravel-tel-input block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm {{ $attributes->get('class') }}"
    data-phone-input-id="{{ $id }}"
    data-phone-input-name="{{ $name }}"
    data-phone-input="#{{ $id }}"
    @if ($attributes->has('value'))
      value="{{ $attributes->get('value') }}"
    @endif
    @if ($attributes->has('phone-country-input'))
      data-phone-country-input="{{ $attributes->get('phone-country-input') }}"
    @endif
    @if ($attributes->has('placeholder'))
      placeholder="{{ $attributes->get('placeholder') }}"
    @endif
    @if ($attributes->has('required'))
      required
    @endif
    @if ($attributes->has('disabled'))
    disabled
    @endif
    autocomplete="off"
  >
</span>
