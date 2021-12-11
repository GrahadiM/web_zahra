@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
                <div class="card">
                    <div class="card-header">Data Paket</div>

                    <div class="card-body">
                        {{-- <div class="mb-3">
                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="nama_paket" class="col-md-3 col-form-label text-md-right">{{ __('Nama Paket') }}</label>

                                    <div class="col-md-7">
                                        <input id="nama_paket" type="text" class="form-control" name="nama_paket" min="0" value="{{ old('nama_paket') }}" autocomplete="nama_paket" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama_provider" class="col-md-3 col-form-label text-md-right">{{ __('Nama Provider') }}</label>

                                    <div class="col-md-7">
                                        <input id="nama_provider" type="text" class="form-control" name="nama_provider" min="0" value="{{ old('nama_provider') }}" autocomplete="nama_provider" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fixed_price" class="col-md-3 col-form-label text-md-right">{{ __('Harga') }}</label>

                                    <div class="col-md-7">
                                        <input id="fixed_price" type="number" class="form-control" name="fixed_price" min="0" value="{{ old('fixed_price') }}" autocomplete="fixed_price" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-7 offset-md-3">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Ingin Menambahkan Data?')">
                                            {{ __('Create') }}
                                        </button>
                                        <button type="reset" class="btn btn-default">
                                            {{ __('Reset') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Token PLN</th>
                                        <th>Daya</th>
                                        <th>Harga</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($paket_pln as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $paket_pln->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->paket_pln }}</td>
                                            <td>{{ $key->daya }}</td>
                                            <td>{{ __('Rp.').number_format($key->fixed_price,2,',','.') }}</td>
                                            {{-- <td>
                                                <form action="{{ route('admin.data-pln.destroy', $key->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ url('/admin/data-pln/'.$key->id) }}" class="btn btn-sm btn-warning mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Ini?')">Ubah</a>
                                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                                        class="btn btn-sm btn-danger">Hapus
                                                    </button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="5" class="text-danger text-center">Data Kosong!</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $paket_pln->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-5">
                <div class="card">
                    <div class="card-header">Data Transaksi PLN</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Customer</th>
                                        <th>Daya</th>
                                        <th>Paket PLN</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($last_transaction as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $last_transaction->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->nama }}</td>
                                            <td>{{ $key->batas_daya }}</td>
                                            <td>{{ $key->paket_pln }}</td>
                                            <td>{{ __('Rp.').number_format($key->price,2,',','.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="5" class="text-danger text-center">Data Kosong!</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $last_transaction->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection