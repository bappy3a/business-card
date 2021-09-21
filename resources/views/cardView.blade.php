@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $card->first_name }}  {{ $card->last_name }} </div>

                <div class="card-body">
                    {!! QrCode::size(150)->generate(route('card.username',$card->user_name)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection