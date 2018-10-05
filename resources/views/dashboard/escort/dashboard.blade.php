@extends('layouts.app')
@section('content')

  <div class="container">
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th class="text-center">Nome</th>
          <th class="text-center">Eta</th>
          <th class="text-center">Status</th>
          <th class="text-center">Opzioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($escorts as $escort)
          <tr>
            <td class="text-center">{{$escort->first_name}} {{$escort->last_name}}</td>
            <td class="text-center">{{$escort->age}}</td>
            <td class="text-center">@if ($escort->status == 0)
              {{ 'Disabilitato' }}
            @elseif ($escort->estatus == 1)
              {{ 'Attivo' }}
            @elseif ($escort->status == 2)
              {{ 'in attesa di' }}
            @endif</td>
            <td class="text-center">
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="{{'#edit' . $escort->id}}"><i class="far fa-edit"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-5 pagination justify-content-center">
      {!! $escorts->render()!!}
    </div>
    {{-- Modal edit --}}
    @foreach ($escorts as $escort)
      <div class="modal fade" id="edit{{$escort->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modificare {{$escort->first_name}} {{$escort->last_name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('escort.admin_update', $escort->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Stato della richiesta</label>
                  <select class="form-control" name="status">
                    <option selected disabled>Select...</option>
                    <option value="0">Disabilitato</option>
                    <option value="1">Attivo</option>
                    <option value="2">In attesa di</option>
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
  </div>

@endsection
