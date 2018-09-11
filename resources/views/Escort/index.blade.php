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
        <filter-escort></filter-escort>
        <div class="row">
          @foreach ($escorts as $escort)

            <div class="col-md-4 mt-3">
              <div class="card no-border">
                <div class="card-body no-padding">
                  <img class="card-img-top img-fluid" src="{{ asset('/storage/escorts/photos/'. $escort->photo_1) }}" alt="Imagen perfil del escort">
                </div>
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
