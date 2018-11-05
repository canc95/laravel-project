@extends('layouts.app')
@section('content')

  <div class="container">
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="{{'#add'}}"><i class="fas fa-plus"></i> Nuovo</button>
    <table class="table table-striped table-hover table-bordered mt-3">
      <thead>
        <tr>
          <th class="text-center">Paese</th>
          <th class="text-center">Stato</th>
          <th class="text-center">Opzioni</th>
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
              <h5 class="modal-title">Modificare {{$state->state_name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('state.update', $state->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Paese</label>
                  <select class="form-control" name="country_id" required oninvalid="this.setCustomValidity('Seleziona un oggetto')" oninput="this.setCustomValidity('')">
                    <option selected disabled>Selezionare...</option>
                    @foreach ($countries as $country)
                      <option value="{{$country->id}}">
                        {{$country->country_name}}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Stato</label>
                  <input type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" name="name" value="{{$state->name}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group text-center">
                  <input type="submit" class="btn btn-outline-primary" value="Accettare">
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
                <h5 class="modal-title">Elimina {{$state->state_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>Sei sicuro di voler eliminare {{$state->name}}</p>
                  <div class="form-group text-center">
                    <a href="{{route('state.delete', $state->id)}}" class="btn btn-outline-primary btn-block">Eliminare</a>
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
            <h5 class="modal-title">Nuovo {{$state->state_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('state.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id" required oninvalid="this.setCustomValidity('Seleziona un oggetto')" oninput="this.setCustomValidity('')">
                  <option selected disabled>Selezionare...</option>
                  @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Stato</label>
                <input type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" name="name" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
              </div>
              <div class="form-group text-center">
                <input type="submit" class="btn btn-outline-primary" value="Accettare">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End Modal add --}}
  </div>

@endsection
