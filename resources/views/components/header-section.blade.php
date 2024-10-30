@props(['href' => 'categories', 'tag' => 'a', 'buttonName' => 'Back'])

<div {{ $attributes->merge([ 'class' => 'bg-gray-100 rounded-md dark:bg-gray-800' ]) }}>
    <h4 class="font-bold text-xl py-6 px-4 dark:text-gray-200">
        {{ $slot }}
        <x-button tag="{{ $tag }}" class="float-end" href="{{ url($href) }}">{{ $buttonName }}</x-button>
    </h4>
</div>