@extends('layouts.header')
@section('content')

    <section class="bg-light">
        <div class="container">
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="col-md-12">
                    <h2 style="text-align: center;">Evento</h2>

                    {!! Form::model($event , ['action' => 'App\Http\Controllers\EventsController@store']) !!}
                    @include('front.events.fields')
                    {!! Form::close() !!}
                </div>
            </div>
    </section>
    <input type="hidden" value="{{ url('/') }}" id="baseUrl" />
    @include('layouts.loading')

@endsection
