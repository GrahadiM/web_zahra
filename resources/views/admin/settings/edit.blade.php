@extends('layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <!-- Setting Website -->
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        Setting Website
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting-website.update') }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="app_name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Website') }}</label>

                                <div class="col-md-6">
                                    <input id="app_name" type="text" class="form-control" name="app_name" value="{{ old('name', $setting->app_name) }}" autocomplete="app_name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="footer_name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Footer') }}</label>

                                <div class="col-md-6">
                                    <input id="footer_name" type="text" class="form-control" name="footer_name" value="{{ old('name', $setting->footer_name) }}" autocomplete="footer_name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
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