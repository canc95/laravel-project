@extends('layouts.app')
@section('content')

  <div class="container">
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="{{'#add'}}"><i class="fas fa-plus"></i> New</button>
    <table class="table table-striped table-hover table-bordered mt-3">
      <thead>
        <tr>
          <th class="text-center">Country</th>
          <th class="text-center">State</th>
          <th class="text-center">Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($states as $state)
          <tr>
            <td class="text-center">{{$state->country->country_name}}</td>
            <td class="text-center">{{$state->name}}</td>
            <td class="text-center">
              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="{{'#edit' . $state->id}}"><i class="far fa-edit"></i></button>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="{{'#delete' . $state->id}}"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-5 pagination justify-content-center">
      {!! $states->render()!!}
    </div>
    {{-- Modal edit --}}
    @foreach ($states as $state)
      <div class="modal fade" id="edit{{$state->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit {{$state->state_name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('state.update', $state->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control" name="country_id">
                    <option selected disabled>Select...</option>
                    @foreach ($countries as $country)
                      <option value="{{$country->id}}">
                        {{$country->country_name}}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>State</label>
                  <input type="text" name="name" value="{{$state->name}}" class="form-control">
                </div>
                <div class="form-group text-center">
                  <input type="submit" class="btn btn-outline-primary" value="Aceptar">
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    @endforeach
      {{-- End Modal edit --}}
      {{-- Modal delete --}}
      @foreach ($states as $state)
        <div class="modal fade" id="delete{{$state->id}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete {{$state->state_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>Are you sure want delete {{$state->name}}</p>
                  <div class="form-group text-center">
                    <a href="{{route('state.delete', $state->id)}}" class="btn btn-outline-primary btn-block">Delete</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      @endforeach
        {{-- End Modal delete --}}
        {{-- Modal add --}}
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit {{$state->state_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('state.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id">
                  <option selected disabled>Select...</option>
                  @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>State</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group text-center">
                <input type="submit" class="btn btn-outline-primary" value="Aceptar">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End Modal add --}}
  </div>

@endsection
