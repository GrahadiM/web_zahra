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
                        Update Status
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('operator.request-saldo.update',$attr->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select class="select2-selection form-control theSelect" name="status">
                                        <option value="{{ $attr->status }}" class="">{{ $attr->status }}</option>
                                        @if ($attr->status == 'sukses')
                                        <option value="pending" class="">pending</option>
                                        @else
                                        <option value="sukses" class="">sukses</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Status
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