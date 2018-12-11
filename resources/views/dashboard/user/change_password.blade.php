@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          Cambia la password
        </div>
        <div class="card-body">
          <form action="{{route('changePass', Auth::user()->id)}}" method="post">
            @csrf
            <div class="form-group">
              <label>Password attuale</label>
              <input type="password" name="currentPassword" class="form-control" required>
              @if (session('error-checked'))
                  <div class="alert alert-danger" role="alert">
                      {{ session('error-checked') }}
                  </div>
              @endif
            </div>
            <div class="form-group">
              <label>Password attuale</label>
              <input type="password" name="newPassword" class="form-control {{ $errors->has('newPassword') ? ' is-invalid' : '' }}" required>
              @if ($errors->has('newPassword'))
                  <div class="alert alert-danger" role="alert">
                      <strong>{{ $errors->first('newPassword') }}</strong>
                  </div>
              @endif
            </div>
            <div class="form-group">
              <label>Password attuale</label>
              <input type="password" name="newPassword_confirmation" class="form-control" required>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registrare') }}
                    </button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
