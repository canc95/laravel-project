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
            <h5 class="text-white">{{ $escort->first_name }} {{ $escort->last_name }} <span class="text-danger">{{ $escort->age }}</span></h5>
            <a href="{{route('escort.edit', $escort->id)}}" class="text-white text-uppercase position-absolute button-absolute"><span class="fas fa-pencil-alt"></span>e</a>
            {{-- <span class="text-primary text-uppercase">
              <strong>
                {{$escort->first_name}} {{$escort->last_name}}
              </strong>
            </span>
            <span class="text-danger">
              ({{$escort->age}})
            </span> --}}
          </div>
          <div class="card-body no-border">
            {{-- <div class="text-right mb-0">
              <a href="{{route('escort.edit', $escort->id)}}"><i class="fas fa-pencil-alt"></i> Edit</a>
            </div> --}}
            <div class="row">
              <div class="col-md-3 pt-5 pb-4">
                <div class="form-row ml-3"><label><strong>Gender:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Age:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Country:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Nationality:</strong></label></div>
                <div class="form-row ml-3"><label><strong>State / Province:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Hair Color:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Eyes Color:</strong></label></div>
              </div>
              <div class="col-md-3 pt-5 pb-4">
                <div class="form-row ml-3"><label>{{$escort->gender}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->age}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->country}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->nationality}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->state}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->hair_color}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->eye_color}}</label></div>
              </div>
              <div class="col-md-2 pt-5 pb-4">
                <div class="form-row ml-3"><label><strong>Height:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Weight:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Size:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Phone:</strong></label></div>
                <div class="form-row ml-3"><label><strong>Service:</strong></label></div>
              </div>
              <div class="col-md-4 pt-5 pb-4">
                <div class="form-row ml-3"><label>{{$escort->height}} cm</label></div>
                <div class="form-row ml-3"><label>{{$escort->weight}} Kg</label></div>
                <div class="form-row ml-3"><label>{{$escort->breast}}/{{$escort->waist}}/{{$escort->hip}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->phone}}</label></div>
                <div class="form-row ml-3"><label>{{$escort->service}}</label></div>
              </div>
            </div>
            <div class="row">
              <div class="col flex-photos">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_2) }}" class="profile-photo">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_3) }}" class="profile-photo">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_4) }}" class="profile-photo">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_5) }}" class="profile-photo">
              </div>
            </div>
            {{-- <div class="row">
              <div class="col-md-3 mt-3">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_2) }}" alt="" class="img-fluid">
              </div>
              <div class="col-md-3 mt-3">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_3) }}" alt="" class="img-fluid">
              </div>
              <div class="col-md-3 mt-3">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_4) }}" alt="" class="img-fluid">
              </div>
              <div class="col-md-3 mt-3">
                <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_5) }}" alt="" class="img-fluid">
              </div>
            </div> --}}
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
