@extends('layouts.app')
@section('content')

  <div class="container">

    <div class="row">

      <div class="col-md-2">
        <div class="row">
          <div class="col-md-12">
            <div class="card no-border mt-1">
              <img class="img-fluid" src="{{asset('/image/test6.jpg')}}" alt="Foto">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-3">
              <img class="img-fluid" src="{{asset('/image/test6.jpg')}}" alt="Foto">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-3">
              <img class="img-fluid" src="{{asset('/image/test6.jpg')}}" alt="Foto">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-3">
              <img class="img-fluid" src="{{asset('/image/test6.jpg')}}" alt="Foto">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-3">
              <img class="img-fluid" src="{{asset('/image/test6.jpg')}}" alt="Foto">
            </div>
          </div><div class="col-md-12">
            <div class="card no-border mt-3">
              <img class="img-fluid" src="{{asset('/image/test6.jpg')}}" alt="Foto">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10">
          <form action="{{ route('escort.index') }}" method="GET">
              <div class="row">
                  <div class="col">
                    <select class="form-control" name="age">
                      <option selected disabled>Age</option>
                      <option value="DESC">Descendent</option>
                      <option value="ASC">Ascendent</option>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control" name="gender">
                      <option selected disabled>Gender</option>
                      <option value="Female">Female</option>
                      <option value="Male">Male</option>
                      <option value="Transexual">Transexual</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control" name="height">
                      <option selected disabled>Height</option>
                      <option value="140,149">1,40 - 1,49</option>
                      <option value="150,159">1,50 - 1,59</option>
                      <option value="160,169">1,60 - 1,69</option>
                      <option value="170,179">1,70 - 1,79</option>
                      <option value="180,189">1,80 - 1,89</option>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control" name="eye_color">
                      <option selected disabled>Eyes Color</option>
                      <option value="Green">Green</option>
                      <option value="Blue">Blue</option>
                      <option value="Black">Black</option>
                      <option value="Brown">Brown</option>
                      <option value="Yellow">Yellow</option>
                    </select>
                  </div>
                  <div class="col">
                      <input type="submit" class="btn btn-block btn-primary" value="Search"/>
                  </div>
              </div>
          </form>
        <div class="row">
          @foreach ($escorts as $escort)

            <div class="col-md-4 mt-3">
              <div class="card no-border">
                <div class="card-body no-padding">
                  <a href="{{route('escort.show', $escort->id)}}">
                    <img class="card-img-top img-fluid" src="{{ asset('/storage/escorts/photos/'. $escort->photo_1) }}" alt="Imagen perfil del escort">
                    <div class="profile-hovered text-center ">
                      <h3 class="text-white">{{$escort->first_name}}</h3>
                      <h4 class="text-white">{{$escort->state->name}}</h4>
                      <h5 class="text-danger">{{$escort->age}} {{$escort->gender}}</h5>
                    </div>
                  </div>
                  </a>
                <div class="card-footer">
                  <h3 class="text-center">
                    <a href="{{route('escort.show', $escort->id)}}">
                      {{$escort->first_name}} {{$escort->last_name}}
                    </a>
                  </h3>
                </div>
              </div>
            </div>

          @endforeach
        </div>
        <div class="mt-5 pagination justify-content-center">
          {!! $escorts->render()!!}
        </div>
      </div>
    </div>
  </div>

@endsection
