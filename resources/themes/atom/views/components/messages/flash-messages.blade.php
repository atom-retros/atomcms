@if (session()->has('message'))
    <script>
        Toast.fire({
            icon: 'error',
            title: '{{ session()->get('message') }}'
        })
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            Toast.fire({
                icon: 'error',
                title: '{{ $error }}'
            })
        </script>
    @endforeach
@endif

@if ($errors->login)
    @foreach ($errors->login->all() as $error)
        <script>
            Toast.fire({
                icon: 'error',
                title: '{{ $error }}'
            })
        </script>
    @endforeach
@endif

@if (session()->has('success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session()->get('success') }}'
        })
    </script>
@endif