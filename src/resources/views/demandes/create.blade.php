@extends('govpay::layouts.app')

@section('content')

<div class="col-md-8 mx-auto">

    @if(isset($response) AND $response->status()==200)
        <div class="alert alert-success mt-5">{{ $response->body() }}</div>
    @elseif(isset($response))
        <div class="alert alert-danger mt-5">{{ $response->body() }}</div>
    @elseif(isset($errorMessage))
        <div class="alert alert-danger mt-5">{{ $errorMessage }}</div>
    @else
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Soumettre une nouvelle demande</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('demandes.store') }}" method="POST" id="contactForm" name="contactForm" class="">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            @include('govpay::demandes._form')
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value=" Valider" class="btn btn-primary btn-block ">
                                <div class="submitting"></div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        @endif

</div>

@endsection
