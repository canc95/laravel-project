@extends('layouts.app')
@section('content')

  <div class="container">
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="{{'#add'}}"><i class="fas fa-plus"></i> Nuovo</button>
    <table class="table table-striped table-hover table-bordered mt-3">
      <thead>
        <tr>
          <th class="text-center">Nome</th>
          <th class="text-center">Posta Elettronica</th>
          <th class="text-center">Role</th>
          <th class="text-center">Opzioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td class="text-center">{{$user->first_name}} {{$user->last_name}}</td>
            <td class="text-center">{{$user->email}}</td>
            <td class="text-center text-capitalize">{{str_replace('-', ' ',$user->getRoleNames()[0])}}</td>
            <td class="text-center">
              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="{{'#edit' . $user->id}}"><i class="far fa-edit"></i></button>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="{{'#delete' . $user->id}}"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-5 pagination justify-content-center">
      {!! $users->render()!!}
    </div>
    {{-- Modal edit --}}
    @foreach ($users as $user)
      <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modificare {{$user->user_first_name}} {{$user->last_name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" name="first_name" pattern="[a-zA-Z]+" required value="{{$user->first_name}}">
                </div>
                <div class="form-group">
                  <label>Cognome</label>
                  <input type="text" class="form-control" name="last_name" pattern="[a-zA-Z]+" required value="{{$user->last_name}}">
                </div>
                <div class="form-group">
                  <label>Posta Elettronica</label>
                  <input type="email" name="email" value="{{$user->email}}" required class="form-control">
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role" required>
                    <option
                    @if ($user->getRoleNames()[0] == 'ospite')
                      {{"selected"}}
                    @endif
                    value="ospite"
                    >
                    Ospite
                  </option>
                    <option
                      @if ($user->getRoleNames()[0] == 'escorta')
                        {{"selected"}}
                      @endif
                      value="escorta"
                    >
                      Escorta
                    </option>
                    <option
                      @if ($user->getRoleNames()[0] == 'amministratore')
                        {{"selected"}}
                      @endif
                      value="amministratore"
                    >
                      Amministratore
                    </option>
                  </select>
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
      @foreach ($users as $user)
        <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Elimina {{$user->user_first_name}} {{$user->last_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>Sei sicuro di voler eliminare {{$user->name}}</p>
                  <div class="form-group text-center">
                    <a href="{{route('user.delete', $user->id)}}" class="btn btn-outline-primary btn-block">Delete</a>
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
            <h5 class="modal-title">Nuovo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('user.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="first_name" pattern="[a-zA-Z]+" required>
              </div>
              <div class="form-group">
                <label>Cognome</label>
                <input type="text" class="form-control" name="last_name" pattern="[a-zA-Z]+" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <div class="form-group">
                <label>Posta Elettronica</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Ruolo</label>
                <select class="form-control" name="role" required>
                  <option disabled selected>Selezionare</option>
                  <option value="ospite">Ospite</option>
                  <option value="escorta">Escorta</option>
                  <option value="amministratore">Amministratore</option>
                </select>
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
