<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PPOB') }}</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{URL::asset('images')}}/icon1.png" />

    <!-- Scripts -->
    <script src="{{ URL::asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

</head>
<body onload="window.print();">
    <div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center">Data Riwayat Transaksi</div>

                            <div class="card-body">
                                <div class="table-responsive mt-3">
                                    <table class="table table-light table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Saldo</th>
                                                <th>Total Transaksi</th>
                                                <th>Total Top Up</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $key)
                                                <tr>
                                                    <th>{{ $loop->iteration + $users->firstItem() - 1 . '.' }}</th>
                                                    <td>{{ $key->id }}</td>
                                                    <td>{{ $key->name }}</td>
                                                    <td>{{ __('Rp.').number_format($key->saldo,2,',','.') }}</td>
                                                    <td>{{ $key->total.__(' x') }}</td>
                                                    <td>{{ __('Rp.').number_format($key->total_topup,2,',','.') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="6" class="text-danger text-center">Data Kosong!</th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
