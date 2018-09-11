@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="row">
          <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_1) }}" alt="" class="img-fluid">
        </div>
      </div>
      <div class="col-md-7 p-0">
        <div class="card">
          <div class="card-header bg-primary p-5 no-border position-relative">
            <h4 class="text-white">{{ $escort->first_name }} {{ $escort->last_name }} <span class="text-danger">{{ $escort->age }}</span></h4>
            <a href="{{route('escort.edit', $escort->id)}}" class="text-white text-uppercase position-absolute button-absolute"><span class="fas fa-pencil-alt"></span>e</a>
          </div>
          <div class="card-body no-border no-padding pt-5">
            <div class="row">
              <div class="col-md-12">
                <h5 class="text-uppercase text-danger text-center">{{$escort->service}}</h5>
                @guest
                  <h6 class="text-uppercase text-center"><a href="{{ route('login') }}" class="nav-link"> <span class="text-uppercase text-danger"><u class="font-weight-bold">Sign in</u></span></a> for see the contact number</h6>
                  @else
                    <h6 class="text-uppercase text-center"><i class="fas fa-phone-square"></i> {{$escort->phone}}</h6>
                @endguest
              </div>
              <div class="col-md-6 mt-3">
                <p class="text-center text-dark"><i class="fas fa-female"></i>, <i class="fas fa-globe"></i> <strong class="font-weight-bold text-capitalize">{{$escort->country}}, {{$escort->state}}</strong></p>
                <p class="text-center text-dark"><i class="far fa-eye"></i> <strong>{{$escort->eye_color}}</strong></p>
                <p class="text-center text-dark"><strong>Hair Color {{$escort->hair_color}}</strong></p>
              </div>
              <div class="col-md-6 mt-3">
                <p class="text-center text-dark"><strong>{{$escort->height}} <span class="text-danger">cm</span> </strong></p>
                <p class="text-center text-dark"><strong>{{$escort->weight}} <span class="text-danger">Kg</span> </strong></p>
                <p class="text-center text-dark"><strong>{{$escort->breast}} - <span class="text-danger">{{$escort->waist}}</span> - {{$escort->hip}}</strong></p>
              </div>
            </div>
            <div class="row">
              @guest
                <div class="col flex-photos pt-3 pb-2">
                  @foreach ($escort->multimedias as $multimedia)
                    <img src="{{ asset("/storage/images/{$multimedia->path}") }}" class="profile-photo" alt="">
                  @endforeach
                </div>
                @else
                  <div class="col flex-photos pt-5 pb-2">
                    @foreach ($escort->multimedias as $multimedia)
                      <img src="{{ asset("/storage/images/{$multimedia->path}") }}" class="profile-photo" alt="">
                    @endforeach
                  </div>
              @endguest
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 p-0">
        <p name="name" rows="3" cols="100" class="bg-primary text-white p-5">
          <strong class="small text-danger text-uppercase font-weight-bold">About me</strong> <br>
          {{$escort->description}}
        </p>
      </div>
    </div>
  </div>

@endsection
