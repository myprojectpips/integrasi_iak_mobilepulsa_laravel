@extends('index')
@section('title', __('Integration Laravel - Mobilepulsa | E-Money'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mx-auto">
            <div class="card col-sm-3 shadow-sm p-0 m-2">
                <div class="card-body text-center">
                    <img src="{{ asset('asset/img/dana.png') }}" alt="DANA" class="w-75">
                </div>
                <div class="card-footer">
                    <a href="/emoney/dana" class="btn btn-primary w-100">View ></a>
                </div>
            </div>

            <div class="card col-sm-3 shadow-sm p-0 m-2">
                <div class="card-body text-center p-5">
                    <img src="{{ asset('asset/img/ovo.png') }}" alt="DANA" class="w-75">
                </div>
                <div class="card-footer">
                    <a href="/emoney/ovo" class="btn btn-primary w-100">View ></a>
                </div>
            </div>
            <div class="card col-sm-3 shadow-sm p-0 m-2">
                <div class="card-body text-center p-5">
                    <img src="{{ asset('asset/img/shopeepay.png') }}" alt="DANA" class="w-75">
                </div>
                <div class="card-footer">
                    <a href="/emoney/shopee-pay" class="btn btn-primary w-100">View ></a>
                </div>
            </div>
            <div class="card col-sm-3 shadow-sm p-0 m-2">
                <div class="card-body text-center p-5">
                    <img src="{{ asset('asset/img/gopay.png') }}" alt="DANA" class="w-75">
                </div>
                <div class="card-footer">
                    <a href="/emoney/gopay" class="btn btn-primary w-100">View ></a>
                </div>
            </div>
            <div class="card col-sm-3 shadow-sm p-0 m-2">
                <div class="card-body text-center p-5">
                    <img src="{{ asset('asset/img/linkaja.png') }}" alt="DANA" class="w-75">
                </div>
                <div class="card-footer">
                    <a href="/emoney/linkaja" class="btn btn-primary w-100">View ></a>
                </div>
            </div>
    </div>
</div>
@endsection

@section('script')
    
@endsection

@section('modal')
    
@endsection