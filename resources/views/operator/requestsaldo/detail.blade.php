@extends('layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <!-- Edit Profile -->
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        Request Saldo
                    </div>

                    <div class="card-body">
                        <form method="" action="" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $attr->user->name }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nominal" class="col-md-4 col-form-label text-md-right">{{ __('Nominal') }}</label>

                                <div class="col-md-6">
                                    <input id="nominal" type="number" value="{{ $attr->nominal }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <input id="status" type="text" value="{{ $attr->status }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bukti" class="col-md-4 col-form-label text-md-right">{{ __('Upload Bukti Pembayaran') }}</label>
                                
                                <div class="col-md-6">
                                    <a href="{{ asset('images/bukti/'.$attr->bukti) }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('images/bukti/'.$attr->bukti) }}" alt="bukti" width="150px" height="150px">
                                    </a>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('operator.request-saldo.index') }}" class="btn btn-danger">
                                        Kembali
                                    </a>
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