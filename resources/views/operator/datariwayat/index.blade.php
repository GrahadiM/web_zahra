@extends('layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Riwayat Saldo</div>

                    <div class="card-body">

                        <form method="POST" action="">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4">
                                    <select class="select2-selection form-control theSelect" name="gender">
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty
                                            <option value="">{{ __('Tidak ditemukan!') }}</option>
                                        @endforelse
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-primary col-lg-2 mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Mencari Data Ini?')">Cari User</button>
                            </div>

                        </form>

                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Saldo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $users->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->name }}</td>
                                            <td>{{ __('Rp.').number_format($key->saldo,2,',','.') }}</td>
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