@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="col-md-12">
      <div class="card no-border">
        <div class="card-header">
          {{$escort->first_name}} {{$escort->last_name}}
        </div>
        <div class="card-body">
          <form action="{{route('escort.update', $escort->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" value="{{$escort->first_name}}" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" value="{{$escort->last_name}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Age</label>
                  <input type="number" name="age" value="{{$escort->age}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Birthday</label>
                  <input type="date" name="birthday" value="{{$escort->birthday}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Gender</label>
                  <input type="text" name="gender" value="{{$escort->gender}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" name="country" value="{{$escort->country}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>State / Province / City</label>
                  <input type="text" name="state" value="{{$escort->state}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nationality</label>
                  <input type="text" name="nationality" value="{{$escort->nationality}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Height</label>
                  <input type="number" name="height" value="{{$escort->height}}" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Weight</label>
                  <input type="number" name="weight" value="{{$escort->weight}}" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <label>Size</label>
                <div class="form-row">
                  <div class="col-md-4">
                    <input type="number" name="breast" value="{{$escort->breast}}" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <input type="number" name="waist" value="{{$escort->waist}}" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <input type="number" name="hip" value="{{$escort->hip}}" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Eyes Color</label>
                  <input type="text" name="eye_color" value="{{$escort->eye_color}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Hair Color</label>
                  <input type="text" name="hair_color" value="{{$escort->hair_color}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>phone</label>
                  <input type="text" name="phone" value="{{$escort->phone}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Service</label>
                  <input type="text" name="service" value="{{$escort->service}}" class="form-control">
                </div>
              </div>
              <div class="col-md-8">
                <label>About me</label>
                <textarea name="description" rows="3" class="form-control">{{$escort->description}}</textarea>
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col-md-4 offset-md-1">
                <div class="custom-file">
                  {{-- <input type="file" class="custom-file-input" name="photo_1">
                  <label class="custom-file-label">Foto de perfil</label> --}}
                  <label>Foto de perfíl</label>
                  <input type="file" class="form-control-file" name="photo_1">
                </div>

              </div>
              <div class="col-md-4 offset-md-2">
                <label>Fotos adicional</label>
                <input type="file" class="form-control-file" name="photo_2">
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col-md-4">
                <label>Fotos adicional</label>
                <input type="file" class="form-control-file" name="photo_3">
              </div>
              <div class="col-md-4">
                <label>Fotos adicional</label>
                <input type="file" class="form-control-file" name="photo_4">
              </div>
              <div class="col-md-4">
                <label>Fotos adicional</label>
                <input type="file" class="form-control-file" name="photo_5">
              </div>
            </div>
            <div class="col-md-12 text-center mt-5">
              <button type="submit" class="btn btn-outline-primary" name="button">Aceptar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
