@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tabel Riwayat Pengisian Saldo '. $user->name) }}</div>
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
                                @forelse ($rs as $key)
                                    <tr>
                                        <th>{{ $loop->iteration + $rs->firstItem() - 1 . '.' }}</th>
                                        <td>{{ __('Rp.').number_format($key->saldoAfter,2,',','.') }}</td>
                                        <td>{{ __('Rp.').number_format($key->saldoPlus,2,',','.') }}</td>
                                        <td>{{ __('Rp.').number_format($key->saldoNow,2,',','.') }}</td>
                                        <td>{{ $key->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="6" class="text-danger text-center">Data Kosong!</th>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="1">{{ __('Total Transaksi :') }}</td>
                                    <td colspan="1">{{ $total.__(' x') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="1">{{ __('Total Top Up :') }}</td>
                                    <td colspan="1">{{ __('Rp.').number_format($total_topup,2,',','.') }}</td>
                                </tr>
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
