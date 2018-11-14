@extends('layouts.app')
@section('content')

  <div class="container">
    <h1 class="text-center">Pubblicità</h1>
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="{{'#addAdvertising'}}"><i class="fas fa-plus"></i> Nuovo</button>
    <table class="table table-striped table-hover table-bordered" style="width:100">
      <thead>
        <tr>
          <th class="text-center">Foto</th>
          <th class="text-center">Collegamento</th>
          <th class="text-center">Opzioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($advertisings as $advertising)
          <tr>
            <td class="text-center">
              <img src="{{asset('storage/advertisings/photos'. $advertising->photo)}}" width="80px" height="100px" class="img-thumbnail" alt="">
            </td>
            <td class="text-center">{{$advertising->link}}</td>
            <td class="text-center">
              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="{{'#edit' . $advertising->id}}"><i class="far fa-edit"></i></button>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="{{'#delete' . $advertising->id}}"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- Modal edit --}}
    @foreach ($advertisings as $advertising)
      <div class="modal fade" id="edit{{$advertising->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modificare pubblicità</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('advertising.update', $advertising->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="name" value="{{$advertising->name}}" class="form-control" required oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                  <select class="form-control" name="escort_id">
                    <option selected disabled>Selezionare...</option>
                    @foreach ($escorts as $escort)
                      <option value="{{$escort->id}}">{{$escort->first_name}} {{$escort->last_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Collegamento</label>
                  <input type="text" name="link" class="form-control" value="{{$advertising->link}}" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control-file" name="photo">
                </div>
                <div class="form-group">
                  <input type="submit" value="Accettare" class="btn btn-primary btn-block">
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    @endforeach
      {{-- End Modal edit --}}
      {{-- Modal delete --}}
      @foreach ($advertisings as $advertising)
        <div class="modal fade" id="delete{{$advertising->id}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Elimina {{$advertising->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <img src="{{asset('storage/advertisings/photos'. $advertising->photo)}}" class="img-fluid" alt="">
                  <div class="form-group text-center">
                    <a href="{{route('advertising.delete', $advertising->id)}}" class="btn btn-outline-primary btn-block">Delete</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      @endforeach
        {{-- End Modal delete --}}
        {{-- Modal add --}}
    <div class="modal fade" id="addAdvertising" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nuovo pubblicità</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('advertising.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" required oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
              </div>
              <div class="form-group">
                <select class="form-control" name="escort_id">
                  <option selected disabled>Selezionare...</option>
                  @foreach ($escorts as $escort)
                    <option value="{{$escort->id}}">{{$escort->first_name}} {{$escort->last_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Collegamento</label>
                <input type="text" name="link" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="photo">
              </div>
              <div class="form-group">
                <input type="submit" value="Accettare" class="btn btn-primary btn-block">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End Modal add --}}
  </div>

@endsection
