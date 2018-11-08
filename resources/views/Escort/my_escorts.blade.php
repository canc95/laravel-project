@extends('layouts.app')
@section('content')
  <div class="container">
    <h1 class="text-center">Mis Escorts</h1>
      <div class="row">
        @foreach ($escorts as $escort)
            <div class="col-md-4 mt-3">
              <div class="card no-border">
                <div class="card-body no-padding">
                  <a href="{{route('escort.show', $escort->id)}}">
                    <img class="card-img-top img-index" src="{{asset('storage/escorts/photos/'. $escort->photo_1)}}" width="286px" height="430px" alt="">
                    <div class="profile-hovered text-center">
                      <h3 class="text-white">{{$escort->first_name}}</h3>
                      <h4 class="text-white">{{$escort->service}}</h4>
                      <h5 class="text-danger">{{$escort->age}}</h5>
                    </div>
                  </a>
                </div>
                <div class="card-footer">
                  <h3 class="text-center">
                    {{$escort->first_name}} {{$escort->last_name}}
                  </h3>
                </div>
              </div>
            </div>
        @endforeach
      </div>
  </div>
@endsection
