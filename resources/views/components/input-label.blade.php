@props(['value'])

<label {{ $attributes->merge(['class' => 'fw-medium fs-5 text-secondary dark:text-gray-200' ]) }}>
    {{ $value ?? $slot }}
</label>
