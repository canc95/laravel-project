@extends('layouts.app')
@section('content')

  <div class="container">
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th class="text-center">Name</th>
          <th class="text-center">Age</th>
          <th class="text-center">Status</th>
          <th class="text-center">Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($escorts as $escort)
          <tr>
            <td class="text-center">{{$escort->first_name}} {{$escort->last_name}}</td>
            <td class="text-center">{{$escort->age}}</td>
            <td class="text-center">@if ($escort->status == '1')
              {{ 'Pending' }}
            @elseif ($escort->estatus == '2')
              {{ 'Active' }}
              @else
                {{ 'Disabled' }}
            @endif</td>
            <td class="text-center">
              <a href="#">E</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-5 pagination justify-content-center">
      {!! $escorts->render()!!}
    </div>
  </div>

@endsection
