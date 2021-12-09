@extends('layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pengajuan Saldo</div>

                    <div class="card-body">

                        <form method="GET" action="{{ route('operator.request-saldo.filter') }}">
                            @csrf

                            <div class="row ml-auto">

                                <div class="col-lg-3">
                                    <select class="select2-selection form-control theSelect" name="user_id">
                                        <option value="" selected disabled>{{ __('Pilih Nama Outlet') }}</option>
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty
                                            <option value="">{{ __('Tidak ditemukan!') }}</option>
                                        @endforelse
                                    </select>
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
                                        <th>Nominal</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($attrs as $key)
                                        <tr>
                                            <th>{{ $loop->iteration + $attrs->firstItem() - 1 . '.' }}</th>
                                            <td>{{ $key->user->name }}</td>
                                            <td>{{ __('Rp.').number_format($key->nominal,2,',','.') }}</td>
                                            <td>
                                                <a href="{{ asset('images/bukti/'.$key->bukti) }}" target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ asset('images/bukti/'.$key->bukti) }}" alt="bukti" width="150px" height="150px">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('operator.request-saldo.edit',$key->id) }}" target="_blank" onclick="return confirm('Apakah Anda Yakin Ingin Merubah Status Ini?')" class="btn btn-md @if ($key->status == 'sukses') btn-success @elseif ($key->status == 'pending') btn-warning @else btn-danger @endif text-dark" style="font-weight:bold;">{{ ucwords($key->status) }}</a>
                                            </td>
                                            <td>{{ $key->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('operator.request-saldo.show',$key->id) }}" class="btn btn-md btn-primary mb-1 mr-1" onclick="return confirm('Apakah Anda Yakin Ingin Melihat Data Ini?')">Lihat</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="6" class="text-danger text-center">Data Kosong!</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $attrs->links() }}
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