@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header">Data Paket</div>

                    <div class="card-body">
                        {{-- <div class="mb-3">
                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="nominal" class="col-md-3 col-form-label text-md-right">{{ __('Nominal') }}</label>

                                    <div class="col-md-9">
                                        <input id="nominal" type="number" class="form-control" name="nominal" min="0" value="{{ old('nominal') }}" autocomplete="nominal" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fixed_price" class="col-md-3 col-form-label text-md-right">{{ __('Harga') }}</label>

                                    <div class="col-md-9">
                                        <input id="fixed_price" type="number" class="form-control" name="fixed_price" min="0" value="{{ old('fixed_price') }}" autocomplete="fixed_price" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-9 offset-md-3">
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
                                        <th>Nominal</th>
                                        <th>Harga</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pulsa_nominal as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $pulsa_nominal->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->nominal }}</td>
                                            <td>{{ __('Rp.').number_format($key->fixed_price,2,',','.') }}</td>
                                            {{-- <td>
                                                <form action="{{ route('admin.data-pulsa.destroy', $key->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ url('/admin/data-pulsa/harga/'.$key->id) }}" class="btn btn-sm btn-warning mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Ini?')">Ubah</a>
                                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                                        class="btn btn-sm btn-danger">Hapus
                                                    </button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="4" class="text-danger text-center">Data Kosong!</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $pulsa_nominal->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header">Data Provider</div>

                    <div class="card-body">
                        {{-- <div class="mb-3">
                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="kode_provider" class="col-md-3 col-form-label text-md-right">{{ __('Kode Provider') }}</label>

                                    <div class="col-md-9">
                                        <input id="kode_provider" type="number" class="form-control" name="kode_provider" min="0" value="{{ old('kode_provider') }}" autocomplete="kode_provider" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama_provider" class="col-md-3 col-form-label text-md-right">{{ __('Nama Provider') }}</label>

                                    <div class="col-md-9">
                                        <input id="nama_provider" type="text" class="form-control" name="nama_provider" value="{{ old('nama_provider') }}" autocomplete="nama_provider" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-9 offset-md-3">
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
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($providers as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $providers->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->kode_provider }}</td>
                                            <td>{{ $key->nama_provider }}</td>
                                            {{-- <td>
                                                <form action="{{ route('admin.data-pulsa.destroy', $key->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ url('/admin/data-pulsa/provider/'.$key->id) }}" class="btn btn-sm btn-warning mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Ini?')">Ubah</a>
                                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                                        class="btn btn-sm btn-danger">Hapus
                                                    </button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="4" class="text-danger text-center">Data Kosong!</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $providers->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-5">
                <div class="card">
                    <div class="card-header">Data Transaksi Pulsa</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nomer Hp</th>
                                        <th>Provider</th>
                                        <th>Nominal</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($last_transaction as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $last_transaction->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->nomor_hp }}</td>
                                            <td>{{ $key->nama_provider }}</td>
                                            <td>{{ $key->nominal }}</td>
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