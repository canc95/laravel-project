@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="row">
          <div class="col-md-12">
            @foreach ($advertisings as $advertising)
                @if ($advertising->link == '')
                  <div class="card no-border mt-1">
                    <a href="{{route('escort.show', $advertising->escort_id)}}">
                      <img src="{{asset('storage/advertisings/photos/' . $advertising->photo)}}" class="img-fluid" alt="">
                    </a>
                  </div>
                  @else
                    <div class="card no-border mt-1">
                      <a href="{{$advertising->link}}" target="_blank">
                        <img src="{{asset('storage/advertisings/photos/' . $advertising->photo)}}" class="img-fluid" alt="">
                      </a>
                    </div>
                @endif
            @endforeach
          </div>
        </div>
      </div>
      <index></index>
    </div>
  </div>

@endsection
