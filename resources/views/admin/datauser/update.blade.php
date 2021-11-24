@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Detail '. $user->name) }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="row">
                            <h5 class="col-md-4 text-md-left">{{ __('Nama') }}</h5>

                            <div class="col-md-6">
                                <p class="text-left">{{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <h5 class="col-md-4 text-md-left">{{ __('Email') }}</h5>

                            <div class="col-md-6">
                                <p class="text-left">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <h5 class="col-md-4 text-md-left">{{ __('Jenis Kelamin') }}</h5>

                            <div class="col-md-6">
                                @if ($user->gender != NULL)
                                <p class="text-left">{{ $user->gender }}</p>
                                @else
                                <p class="text-left">Tidak Diketahui!</p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <h5 class="col-md-4 text-md-left">{{ __('WhatsApp') }}</h5>

                            <div class="col-md-6">
                                @if ($user->phone != NULL)
                                <p class="text-left">{{ $user->phone }}</p>
                                @else
                                <p class="text-left">Tidak Diketahui!</p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <h5 class="col-md-4 text-md-left">{{ __('Sisa Saldo') }}</h5>

                            <div class="col-md-6">
                                <p class="text-left">{{ __('Rp.').number_format($user->saldo,2,',','.') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <h5 class="col-md-4 text-md-left">{{ __('Jumlah Top Up Saldo') }}</h5>

                            <div class="col-md-6">
                                <p class="text-left">{{ __('Rp.').number_format($rsaldo,2,',','.') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <h5 class="col-md-4 text-md-left">{{ __('Alamat') }}</h5>

                            <div class="col-md-6">
                                @if ($user->address != NULL)
                                <p class="text-left">{{ $user->address }}</p>
                                @else
                                <p class="text-left">Tidak Diketahui!</p>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Top Up Saldo '. $user->name) }}</div>

                {{-- <div class="card-body">
                    <form method="POST" action="{{ route('admin.outlet.update', $user->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="saldo" class="col-md-4 col-form-label text-md-right">{{ __('Saldo') }}</label>

                            <div class="col-md-6">
                                <input id="saldo" type="number" class="form-control" name="saldoPlus" min="0" value="{{ old('saldoPlus') }}" autocomplete="saldoPlus" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Ingin Menambahkan Saldo?')">
                                    {{ __('Update') }}
                                </button>
                                <button type="reset" class="btn btn-default">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <h3 class="text-secondary mb-3 ml-3"><u>Tabel Riwayat Pengisian Saldo</u></h3>
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Saldo Sebelum</th>
                                <th>Saldo Sesudah</th>
                                <th>Saldo Total</th>
                                <th>Tanggal</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rs as $riwayat)
                                <tr>
                                    <th>{{ $loop->iteration + $rs->firstItem() - 1 . '.' }}</th>
                                    <td>{{ __('Rp.').number_format($riwayat->saldoAfter,2,',','.') }}</td>
                                    <td>{{ __('Rp.').number_format($riwayat->saldoPlus,2,',','.') }}</td>
                                    <td>{{ __('Rp.').number_format($riwayat->saldoNow,2,',','.') }}</td>
                                    <td>{{ $riwayat->created_at }}</td>
                                    {{-- <td>
                                        <form action="{{ route('admin.riwayat.destroy', $riwayat->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Yakin?')"
                                                class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="6" class="text-danger text-center">Data Kosong!</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="ml-4 mb-4">
                        {{ $rs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
