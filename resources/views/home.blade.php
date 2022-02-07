@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('You are logged in!') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/mainpage">
                            <input class="btn btn-outline-info my-2 my-sm-0" type="submit" value="Procceed to main page" />
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
