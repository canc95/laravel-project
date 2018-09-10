@extends('layouts.app')
@section('content')

  <div class="container">
    <a href="#" class="btn btn-primary btn-block mb-4">New</a>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th class="text-center">Name</th>
          <th class="text-center">Price</th>
          <th class="text-center">Duration</th>
          <th class="text-center">Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($plans as $plan)
          <tr>
            <td class="text-center">{{$plan->name}}</td>
            <td class="text-center">{{$plan->price}}</td>
            <td class="text-center">{{$plan->duration}}</td>
            <td class="text-center">
              <a href="#">E</a>
              <a href="#">E</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
