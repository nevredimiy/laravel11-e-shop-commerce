@props(['tag' => 'button'])


@if ($tag == 'button')
    <button {{ $attributes->merge(['class' => 'block px-3 py-2 rounded bg-slate-800 text-gray-400 hover:text-gray-50 transition font-bold text-sm dark:border dark:border-gray-200']) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => 'block px-3 py-2 rounded bg-slate-800 text-gray-400 hover:text-gray-50 transition font-bold text-sm dark:border dark:border-gray-200']) }}>
        {{ $slot }}
    </a>
@endif
