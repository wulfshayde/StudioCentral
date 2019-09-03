@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7">
                        <h1 class="text-white">{{ __('Welcome to StudioCentral') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('Connecting Artists and Studios.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
