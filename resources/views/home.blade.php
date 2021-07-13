@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register Berhasil!</div>
                <div class="card-body">
                    Silahkan Login untuk melanjutkan.
                    <a href="{{ route('login')}}"><i class="fa fa-back-arrow"></i> Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
