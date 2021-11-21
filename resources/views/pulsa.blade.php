@extends('layouts.frontend')
@section('asset')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets')}}/css/select2.min.css">
    <style>
        #badge{
            background-color: rgb(218, 243, 103)
        }
    </style>
@endsection
@section('title', 'Pulsa')
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center border-0 mt-2">
                    <h5 class="text-dark font-weight-bold display-4">Isi Ulang Pulsa</h5>
                </div>
                <form class="form" id="form_purchase">@csrf
                    <div class="card-body">

                    <div class="form-group row m-0">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input type="number" minlength="10" min="0" max="999999999999999999" id="phone_number" class="form-control required" name="phone_number" pattern="[0-9]{20}-[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="08..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="provider">Provider</label>
                                    <select class="select2 form-control country" required data-validation-required-message="Country Wajib diisi" name="provider" id="provider">
                                        <option value="" disabled selected>Select Provider</option>
                                        @foreach($providers as $v)
                                        <option value="{{$v->id}}">{{$v->nama_provider}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-dark font-weight-bold display-5">Transaksi Terakhir</h5><br>
                        <div class="row">
                            @foreach ($last_transaction as $each)
                            <div class="col-lg-4">
                                <label class="option bg-secondary">
                                    <span class="option-label">
                                        <span class="option-head">
                                        <span class="option-title">
                                            {{ $each->nomor_hp }}
                                        </span>
                                        <span class="option-focus">
                                            {{$each->nama_provider}}
                                        </span>
                                        </span>
                                        <span class="option-body">
                                            Rp {{$each->nominal }}
                                        </span>
                                    </span>
                                </label>
                            </div>
                            @endforeach

                        </div>
                        <hr>
                        <h5 class="text-dark font-weight-bold display-5">Pilih Pulsa</h5><br>
                        <div class="row">
                            @foreach ($pulsa_nominal as $each)
                            <div class="col-lg-4">
                                <label class="option" id="badge">
                                    <span class="option-control">
                                        <span class="radio radio-bold radio-brand"></span>
                                        <input type="radio" name="nominal" value="{{ $each->id }}" required/>
                                        <span></span>
                                        </span>
                                    </span>
                                    <span class="option-label">
                                        <span class="option-head">
                                        <span class="option-title">
                                            {{ number_format($each->nominal) }}
                                        </span>
                                        {{-- <span class="option-focus">
                                        Free
                                        </span> --}}
                                        </span>
                                        <span class="option-body">
                                            Harga : Rp {{ number_format($each->fixed_price, 0) }}
                                        </span>
                                    </span>
                                </label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    </div>

                    <div class="card-footer">
                    <button type="submit" id="btn_purchase" class="btn btn-success mr-2 float-right">Beli Sekarang!</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#form_purchase").submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                Swal.fire({
                    title: "Apakah Kamu yakin Untuk Mengisi Ulang Pulsa?",
                    text: "",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Isi Ulang Sekarang"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({ //line 28
                            type: 'POST',
                            url: '/pulsa_post',
                            dataType: 'json',
                            data: new FormData($("#form_purchase")[0]),
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                document.getElementById("form_purchase").reset();
                                if (data.code == 200) {
                                    Swal.fire(
                                        "Berhasil!",
                                        `${data.message}`,
                                        "success"
                                    ).then(function(){
                                        window.location.reload();

                                    });
                                } else {
                                    Swal.fire(
                                        "Gagal!",
                                        `${data.message}`,
                                        "error"
                                    )
                                }
                            }
                        });

                    }
                });

            });
        });
    </script>
@endsection
