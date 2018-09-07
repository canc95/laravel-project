@extends('layouts.app')
@section('content')

  <div class="container">
    <form action="{{route('escort.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="images[]" multiple>
          <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="button">Aceptar</button>
    </form>
  </div>

@endsection
