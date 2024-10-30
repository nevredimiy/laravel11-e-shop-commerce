<select {{ $attributes->merge([ 'class' => 'h-full rounded-md border bg-transparent py-1.5 pl-2 pr-7 text-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm dark:text-gray-200 dark:bg-gray-800' ]) }}>
   {{ $slot }}
</select>