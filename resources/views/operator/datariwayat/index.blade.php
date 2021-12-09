@extends('layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Riwayat Transaksi</div>

                    <div class="card-body">

                        <form method="GET" action="{{ route('operator.riwayat.filter') }}">
                            @csrf

                            <div class="row ml-auto">

                                <div class="col-lg-3">
                                    <input id="name" type="text" class="form-control" name="name" min="0" value="{{ old('name') }}" autocomplete="name" placeholder="Nama" autofocus>
                                </div>

                                <div class="col-lg-3">
                                    <input id="saldo" type="number" class="form-control" name="saldo" min="0" value="{{ old('saldo') }}" autocomplete="saldo" placeholder="Saldo" autofocus>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary col-lg-2 mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Mencari Data Ini?')">
                                    {{ __('Search') }}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger col-lg-2 mb-1 mr-1">
                                    {{ __('Reset') }}
                                </button>

                            </div>

                        </form>

                        <div class="table-responsive mt-3">
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Saldo</th>
                                        <th>Total Transaksi</th>
                                        <th>Total Top Up</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $users->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->name }}</td>
                                            <td>{{ __('Rp.').number_format($key->saldo,2,',','.') }}</td>
                                            <td>{{ $key->total.__(' x') }}</td>
                                            <td>{{ __('Rp.').number_format($key->total_topup,2,',','.') }}</td>
                                            <td>
                                                <a href="{{ route('operator.riwayat.edit',$key->id) }}" class="btn btn-sm btn-primary mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Melihat Data Ini?')">Lihat</a>
                                            </td>
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
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
		$(".theSelect").select2();
	</script>
@endpush