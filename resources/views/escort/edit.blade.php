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
            <input type="hidden" name="status" value="1">
            <div class="form-row">
              <div class="col-md-12">
                <p class="text-center font-weight-bold text-uppercase">Informazione personale</p>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Nome</span>
                  </div>
                  <input type="text" aria-label="First name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" min="2" class="form-control" name="first_name" value="{{$escort->first_name}}" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                  <div class="input-group-append">
                    <span class="input-group-text">Cognome</span>
                  </div>
                  <input type="text" aria-label="Last name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" min="2" class="form-control" name="last_name" value="{{$escort->last_name}}" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Passaporto</label>
                  <input type="text" name="passport" value="{{$escort->passport}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Compleanno</label>
                  <input type="date" name="birthday" max="2000-12-31" value="{{$escort->birthday}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Genere</label>
                  <select class="form-control" name="gender">
                    <option @if ($escort->gender == "Femmina")
                          {{"selected"}}
                        @endif>
                        Femmina
                      </option>
                      <option @if ($escort->gender == "Maschio")
                          {{"selected"}}
                        @endif>
                        Maschio
                      </option>
                      <option @if ($escort->gender == "Transessuale")
                        {{"selected"}}
                      @endif>
                      Transessuale
                    </option>
                    <option @if ($escort->gender == "Altro")
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
                  <input type="text" name="phone" value="{{$escort->phone}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
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
                  <input type="number" name="weight" pattern= "[0-9]" max="150" min="30" value="{{$escort->weight}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-row">
                  <div class="col-md-4">
                    <label>Seno</label>
                    <input type="number" name="breast" pattern= "[0-9]" max="100" min="30" value="{{$escort->breast}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="col-md-4">
                    <label>Vita</label>
                    <input type="number" name="waist" pattern= "[0-9]" max="100" min="30" value="{{$escort->waist}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="col-md-4">
                    <label>Anca</label>
                    <input type="number" name="hip" pattern= "[0-9]" max="100" min="30" value="{{$escort->hip}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Altezza</label>
                  <input type="number" name="height" pattern= "[0-9]" min="130" max="250" value="{{$escort->height}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Colore degli occhi</label>
                  <input type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" name="eye_color" value="{{$escort->eye_color}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Colore dei capelli</label>
                  <select class="form-control" name="hair_color" required>
                    <option selected disabled>Colore dei capelli</option>
                    <option
                    @if ($escort->hair_color == 'Nero')
                      {{'Selected'}}
                    @endif
                    value="Nero"
                    >
                      Nero</option>
                    <option
                    @if ($escort->hair_color == 'Bionda')
                      {{'Selected'}}
                    @endif
                    value="Bionda"
                    >
                    Bionda</option>
                    <option
                    @if ($escort->hair_color == 'Marrone')
                      {{'Selected'}}
                    @endif
                    value="Marrone"
                    >
                    Marrone</option>
                    <option
                    @if ($escort->hair_color == 'Testa Rossa')
                      {{'Selected'}}
                    @endif
                    value="Testa Rossa"
                    >
                    Testa Rossa</option>
                    <option
                    @if ($escort->hair_color == 'Altri')
                      {{'Selected'}}
                    @endif
                    value="Altri"
                    >
                    Altri</option>
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
                  <input type="text" name="service" value="{{$escort->service}}" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="col-md-8">
                <label>A proposito di me</label>
                <textarea name="description" rows="3" style="resize:none;" class="form-control" oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">{{$escort->description}}</textarea>
              </div>
            </div>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">Fotografie</p>
            <div class="form-group mt-3">
              <div class="col-md-12">
                <div class="custom-file">
                  <label class="img-refer">
                    <input type="file" id="profile_photo" class="custom-file-input" name="photo_1">
                  </label>
                  <label class="custom-file-label" id="profilePhoto" for="profile_photo">Foto profilo</label>
                </div>
              </div>
              <input type="hidden" name="status" value="2">
            </div>
            <div class="form-row mt-5">
              <div class="col-md-3">
                <label class="img-refer2">
                  <input type="file" id="photo_2" class="custom-file-input" name="photo_2" accept="image/jpg, image/jpeg, image/png">
                </label>
                <label class="custom-file-label" id="fotoAditional2" for="photo_2">Foto aggiuntive</label>
              </div>
              <div class="col-md-3">
                <label class="img-refer3">
                  <input type="file" id="photo_3" class="custom-file-input" name="photo_3" accept="image/jpg, image/jpeg, image/png">
                </label>
                <label class="custom-file-label" id="fotoAditional3" for="photo_3">Foto aggiuntive</label>
              </div>
              <div class="col-md-3">
                <label class="img-refer4">
                  <input type="file" id="photo_4" class="custom-file-input" name="photo_4" accept="image/jpg, image/jpeg, image/png">
                </label>
                <label class="custom-file-label" id="fotoAditional4" for="photo_4">Foto aggiuntive</label>
              </div>
              <div class="col-md-3">
                <label class="img-refer5">
                  <input type="file" id="photo_5" class="custom-file-input" name="photo_5" accept="image/jpg, image/jpeg, image/png">
                </label>
                <label class="custom-file-label" id="fotoAditional5" for="photo_5">Foto aggiuntive</label>
              </div>
            </div>
            <div class="col-md-12 text-center mt-5">
              <button type="submit" class="btn btn-outline-primary btn-block" name="button">Accettare</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $(".img-refer").on('change', function() {
        $("#profilePhoto").text($('#profile_photo').val().replace(/C:\\fakepath\\/i, ''));
      });
      $(".img-refer2").on('change', function() {
        $("#fotoAditional2").text($('#photo_2').val().replace(/C:\\fakepath\\/i, ''));
      });
      $(".img-refer3").on('change', function() {
        $("#fotoAditional3").text($('#photo_3').val().replace(/C:\\fakepath\\/i, ''));
      });
      $(".img-refer4").on('change', function() {
        $("#fotoAditional4").text($('#photo_4').val().replace(/C:\\fakepath\\/i, ''));
      });
      $(".img-refer5").on('change', function() {
        $("#fotoAditional5").text($('#photo_5').val().replace(/C:\\fakepath\\/i, ''));
      });
    });
    </script>
  </div>

@endsection
