<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="AtomhK - Housekeeping for Atom CMS">
    <meta name="author" content="Object Retros">
    <meta name="keyword" content="Atom HK, Atom Housekeeping, Habbo HK, Habbo housekeeping, habbo, retros">
    <title>{{ setting('hotel_name') }} - @stack('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/housekeeping/style.css') }}" rel="stylesheet">
</head>
<body>
<x-housekeeping.navigation />

<div class="wrapper d-flex flex-column min-vh-100 bg-light bg-opacity-50 dark:bg-transparent">
    <x-housekeeping.header />

    <main class="body flex-grow-1 px-3">
        <div class="container-lg">
            {{ $slot }}
        </div>
    </main>
</div>
<script src="{{ asset('assets/js/housekeeping/coreui.bundle.min.js') }}"></script>

@stack('javascript')
</body>
</html>
