@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Riwayat Outlet</div>

                    <div class="card-body">
                        
                        <form method="GET" action="{{ route('operator.saldo.filter') }}">
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
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Saldo</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $users->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->id }}</td>
                                            <td>{{ $key->name }}</td>
                                            <td>{{ $key->email }}</td>
                                            <td>
                                                @if ($key->phone != NULL)
                                                {{ $key->phone }}
                                                @else
                                                    Tidak diketahui!
                                                @endif
                                            </td>
                                            <td>{{ __('Rp.').number_format($key->saldo,2,',','.') }}</td>
                                            <td><span class="badge badge-danger">DILINDUNGI</span></td>
                                            <td>
                                                <form action="{{ route('operator.saldo.destroy', $key->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('operator.saldo.edit',$key->id) }}" class="btn btn-sm btn-warning mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Melihat Data Ini?')">Lihat</a>
                                                    @if ($key->phone != NULL)
                                                    <a href="https://wa.me/{{ $key->phone }}" target="_blank" class="btn btn-sm btn-success mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Menelpon?')">Hubungi</a>
                                                    @endif
                                                    {{-- <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                                        class="btn btn-sm btn-danger">Hapus
                                                    </button> --}}
                                                </form>
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