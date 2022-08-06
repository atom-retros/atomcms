@if(session()->has('message'))
    <div class="w-full p-2 text-center bg-red-600 text-white rounded mb-3">
        {{ session()->get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="w-full p-2 bg-red-600 text-white rounded mb-3 text-center">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

@if(session()->has('success'))
    <div class="w-full p-2 text-center bg-green-600 text-white rounded mb-3">
        {{ session()->get('success') }}
    </div>
@endif