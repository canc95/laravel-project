@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="col-md-12">
      <div class="card no-border">
        <div class="card-header">
          {{$escort->first_name}} {{$escort->last_name}}
        </div>
        <div class="card-body no-padding">
          <form action="{{route('escort.update', $escort->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-12">
                <p class="text-center font-weight-bold text-uppercase">Informazione personale</p>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Nome</span>
                  </div>
                  <input type="text" aria-label="First name" pattern="[a-zA-Z]+" min="2" class="form-control" name="first_name" value="{{$escort->first_name}}">
                  <div class="input-group-append">
                    <span class="input-group-text">Cognome</span>
                  </div>
                  <input type="text" aria-label="Last name" pattern="[a-zA-Z]+" min="2" class="form-control" name="last_name" value="{{$escort->last_name}}">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Passaporto</label>
                  <input type="text" name="passport" value="{{$escort->passport}}" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Compleanno</label>
                  <input type="date" name="birthday" max="2000-12-31" value="{{$escort->birthday}}" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Genere</label>
                  <select class="form-control" name="gender">
                    <option @if ($escort->gender == "Female")
                          {{"selected"}}
                        @endif>
                        Femmina
                      </option>
                      <option @if ($escort->gender == "Male")
                          {{"selected"}}
                        @endif>
                        Maschio
                      </option>
                      <option @if ($escort->gender == "Transexual")
                        {{"selected"}}
                      @endif>
                      Transessuale
                    </option>
                    <option @if ($escort->gender == "Other")
                      {{"selected"}}
                    @endif>
                    Altro
                  </option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Il telefono</label>
                  <input type="text" name="phone" value="{{$escort->phone}}" class="form-control">
                </div>
              </div>
            </div>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">Di dove sei?</p>
            <country-state></country-state>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">A proposito del tuo corpo</p>
            <div class="form-row">

              <div class="col-md-4">
                <div class="form-group">
                  <label>Peso</label>
                  <input type="number" name="weight" pattern= "[0-9]" max="150" min="30" value="{{$escort->weight}}" class="form-control">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-row">
                  <div class="col-md-4">
                    <label>Seno</label>
                    <input type="number" name="breast" pattern= "[0-9]" max="100" min="30" value="{{$escort->breast}}" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label>Vita</label>
                    <input type="number" name="waist" pattern= "[0-9]" max="100" min="30" value="{{$escort->waist}}" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label>Anca</label>
                    <input type="number" name="hip" pattern= "[0-9]" max="100" min="30" value="{{$escort->hip}}" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Altezza</label>
                  <input type="number" name="height" pattern= "[0-9]" max="250" min="100" value="{{$escort->height}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Colore degli occhi</label>
                  <input type="text" name="eye_color" value="{{$escort->eye_color}}" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Colore dei capelli</label>
                  <select class="form-control" name="hair_color">
                    <option selected disabled>Colore dei capelli</option>
                    <option value="Black">Nero</option>
                    <option value="Blonde">Bionda</option>
                    <option value="Brown">Marrone</option>
                    <option value="Redhead">Testa Rossa</option>
                    <option value="Others">Altri</option>
                  </select>
                </div>
              </div>
            </div>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">A proposito di te</p>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Servizio</label>
                  <input type="text" name="service" value="{{$escort->service}}" class="form-control">
                </div>
              </div>
              <div class="col-md-8">
                <label>A proposito di me</label>
                <textarea name="description" rows="3" style="resize:none;" class="form-control">{{$escort->description}}</textarea>
              </div>
            </div>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">Fotografie</p>
            <div class="form-row mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="photo_1">
                  <label class="custom-file-label">Foto profilo</label>
                </div>

              </div>
              <div class="col-md-6">
                <input type="file" class="custom-file-input" name="photos_extras[]" multiple>
                <label class="custom-file-label">Foto aggiuntive</label>
              </div>
            </div>
            <div class="form-row mt-3">
            </div>
            <div class="col-md-12 text-center mt-5">
              <button type="submit" class="btn btn-outline-primary btn-block" name="button">Accettare</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
