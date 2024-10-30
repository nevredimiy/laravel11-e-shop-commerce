@props(['status' => 'status'])

@session($status)
        <div class=" text-cyan-800 bg-cyan-200 border border-cyan-300 py-3 px-5 mb-4 rounded-md mr-4">
            {{ $value }}
        </div>
    @endsession