@extends('layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Data Riwayat Transaksi</h5>
                            </div>
                            @if ($name == null && $saldo == null)
                                <div class="col-sm-6">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success col-lg-2 mb-1 mr-1">
                                            {{ __('Print') }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-6">
                                    <form action="{{ $link }}" method="get" target="_blank">
                                        <input type="hidden" value="{{ $name }}" name="name">
                                        <input type="hidden" value="{{ $saldo }}" name="saldo">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-success col-lg-2 mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Print Data Ini?')">
                                                {{ __('Print') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">

                        <form method="GET" action="{{ route('operator.riwayat.filter') }}">
                            @csrf

                            <div class="row ml-auto">

                                <div class="col-lg-2">
                                    <input id="name" type="text" class="form-control" name="name" min="0" value="{{ $name }}" autocomplete="name" placeholder="Nama" autofocus>
                                </div>

                                <div class="col-lg-2">
                                    <input id="saldo" type="number" class="form-control" name="saldo" min="0" value="{{ $saldo }}" autocomplete="saldo" placeholder="Saldo" autofocus>
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
                                        <th>ID</th>
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
                                            <td>{{ $key->id }}</td>
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