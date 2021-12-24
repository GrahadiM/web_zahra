@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header">Ubah Harga</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <form method="POST" action="{{ route('admin.data-pulsa.updateprice', $pulsa_nominal->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="nominal" class="col-md-3 col-form-label text-md-right">{{ __('Nominal') }}</label>

                                    <div class="col-md-9">
                                        <input id="nominal" type="number" class="form-control" name="nominal" min="0" value="{{ $pulsa_nominal->nominal }}" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fixed_price" class="col-md-3 col-form-label text-md-right">{{ __('Harga') }}</label>

                                    <div class="col-md-9">
                                        <input id="fixed_price" type="number" class="form-control" name="fixed_price" min="0" value="{{ $pulsa_nominal->fixed_price }}" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-9 offset-md-3">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data?')">
                                            {{ __('Create') }}
                                        </button>
                                        <button type="reset" class="btn btn-default">
                                            {{ __('Reset') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection