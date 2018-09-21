@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center">
            Select a plan
          </h1>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($plans as $plan)
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h2 class="text-center text-uppercase">
                      {{$plan->name}}
                    </h2>
                  </div>
                  <div class="card-body text-muted">
                    <p class="text-center">
                      {{$plan->description}}
                    </p>
                    <div class="form-row">
                      <div class="col-md-6 text-center">
                        <h3 class="font-weight-bold">
                          $ {{$plan->price}}
                        </h3>
                      </div>
                      <div class="col-md-6 text-center">
                        <h3 class="font-weight-bold">
                          {{$plan->duration}} days
                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <a href="{{route('escort.create', $plan->id)}}" class="btn btn-outline-primary btn-block">Select</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
