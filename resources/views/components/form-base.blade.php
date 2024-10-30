<form {{$attributes->merge(['class' => 'p-4 shadow dark:bg-gray-800 mt-2 mx-auto rounded-md', 'method' => 'POST'])}}>
    {{$slot}}
</form>