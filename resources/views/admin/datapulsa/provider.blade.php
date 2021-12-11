@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header">Ubah Provider</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="kode_provider" class="col-md-3 col-form-label text-md-right">{{ __('Kode Provider') }}</label>

                                    <div class="col-md-9">
                                        <input id="kode_provider" type="number" class="form-control" name="kode_provider" min="0" value="{{ $provider->kode_provider }}" autocomplete="kode_provider" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama_provider" class="col-md-3 col-form-label text-md-right">{{ __('Nama Provider') }}</label>

                                    <div class="col-md-9">
                                        <input id="nama_provider" type="text" class="form-control" name="nama_provider" value="{{ $provider->nama_provider }}" autocomplete="nama_provider" autofocus>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection