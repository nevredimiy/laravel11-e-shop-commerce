<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary px-4 py-1 dark:text-gray-200 dark:border dark:border-gray-400 dark:rounded dark:hover:text-gray-400 dark:hover:border-gray-400']) }}>
    {{ $slot }}
</button>
