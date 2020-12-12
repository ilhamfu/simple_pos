<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="antialiased bg-gray-200 p-2">

    <div class="container flex flex-col mx-auto">
        <h1 class="text-3xl font-bold tracking-widest self-center">Simple POS</h1>

        <div class="flex flex-row justify-between">
            <div class="flex flex-row space-x-1">
                <a class="nav-item w-24 {{ Route::is("product")?"active":"" }} " href="{{route("product")}}">Produk</a>
                
                <a class="nav-item w-24 {{ Route::is("transaction")?"active":"" }}"
                    href="{{route("transaction")}}">Transaksi</a>

            </div>
            {{-- @if (Route::is("product") ||Route::is("product.create") )
            <a class="nav-item w-36 {{Route::is("product.create")?"active":""}}"
                href="{{route("product.create")}}">Produk Baru</a>
            @endif --}}
            @if (Route::is("transaction") ||Route::is("transaction.create") )
            <a class="nav-item w-36 {{Route::is("transaction.create")?"active":""}}"
                href="{{route("transaction.create")}}">Transaksi Baru</a>
            @endif

        </div>

        {{$slot}}
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    @livewireScripts
</body>

</html>