@extends('layouts.app')
@section('content')

  <div class="container">
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="{{'#add'}}"><i class="fas fa-plus"></i> Nuovo</button>
    <table class="table table-striped table-hover table-bordered mt-3">
      <thead>
        <tr>
          <th class="text-center">Continente</th>
          <th class="text-center">Paesi</th>
          <th class="text-center">Opzioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($countries as $country)
          <tr>
            <td class="text-center">{{$country->continent_name}}</td>
            <td class="text-center">{{$country->country_name}}</td>
            <td class="text-center">
              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="{{'#edit' . $country->id}}"><i class="far fa-edit"></i></button>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="{{'#delete' . $country->id}}"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-5 pagination justify-content-center">
      {!! $countries->render()!!}
    </div>
    {{-- Modal edit --}}
    @foreach ($countries as $country)
      <div class="modal fade" id="edit{{$country->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modificare {{$country->country_name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('country.update', $country->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Continent</label>
                  <select class="form-control" name="continent_name" required oninvalid="this.setCustomValidity('Seleziona un oggetto')" oninput="this.setCustomValidity('')">
                    <option selected disabled>Selezionare...</option>
                    <option>Africa</option>
                    <option>Asia</option>
                    <option>Europa</option>
                    <option>Nord America</option>
                    <option>Sud America</option>
                    <option>Oceania</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Paese Nome</label>
                  <input type="text" name="country_name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" value="{{$country->country_name}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')">
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
      @foreach ($countries as $country)
        <div class="modal fade" id="delete{{$country->id}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Elimina {{$country->country_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>Sei sicuro di voler eliminare {{$country->country_name}}</p>
                  <div class="form-group text-center">
                    <a href="{{route('country.delete', $country->id)}}" class="btn btn-outline-primary btn-block">Eliminare</a>
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
            <h5 class="modal-title">Nuovo Paese</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('country.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Continent</label>
                <select class="form-control" name="continent_name" required oninvalid="this.setCustomValidity('Seleziona un oggetto')" oninput="this.setCustomValidity('')">
                  <option selected disabled>Select...</option>
                  <option>Africa</option>
                  <option>Asia</option>
                  <option>Europe</option>
                  <option>Nord America</option>
                  <option>Sud America</option>
                  <option>Oceania</option>
                </select>
              </div>
              <div class="form-group">
                <label>Paese Nome</label>
                <input type="text" name="country_name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" required class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
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
