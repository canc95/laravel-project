@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="col-md-12">
      <div class="card no-border">
        <div class="card-header">
          Complete your profile
        </div>
        <div class="card-body no-padding">
          <form action="{{route('escort.store', $plan->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <input type="hidden" name="plan_id" value="{{$plan->id}}">
              <div class="col-md-12">
                <p class="text-center font-weight-bold text-uppercase">Personal information</p>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">First Name</span>
                  </div>
                  <input type="text" aria-label="First name" pattern="[a-zA-Z]+" min="2" class="form-control" name="first_name" required>
                  <div class="input-group-append">
                    <span class="input-group-text">Last Name</span>
                  </div>
                  <input type="text" aria-label="Last name" pattern="[a-zA-Z]+" min="2" class="form-control" name="last_name" required>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Passport</label>
                  <input type="text" name="passport" class="form-control" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Birthday</label>
                  <input type="date" name="birthday" max="2000-12-31" value="2000-12-31" class="form-control" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="gender" required>
                    <option disabled selected>Select...</option>
                    <option>Female</option>
                    <option>Male</option>
                    <option>Transexual</option>
                    <option>Other</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>phone</label>
                  <input type="text" name="phone" class="form-control" required>
                </div>
              </div>
            </div>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">Where are you from?</p>
            <country-state></country-state>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">About your body</p>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Weight</label>
                  <input type="number" name="weight" pattern= "[0-9]" max="150" min="30" class="form-control" required>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-row">
                  <div class="col-md-4">
                    <label>Breast</label>
                    <input type="number" name="breast" pattern= "[0-9]" max="100" min="20" class="form-control" required>
                  </div>
                  <div class="col-md-4">
                    <label>Waist</label>
                    <input type="number" name="waist" pattern= "[0-9]" max="100" min="20" class="form-control" required>
                  </div>
                  <div class="col-md-4">
                    <label>Hip</label>
                    <input type="number" name="hip" pattern= "[0-9]" max="100" min="20" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Height</label>
                  <input type="number" name="height" pattern= "[0-9]" max="250" min="100" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Eyes Color</label>
                  <input type="text" name="eye_color" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select class="form-control" name="hair_color" required>
                    <option selected disabled>Hair Color</option>
                    <option>Black</option>
                    <option>Blonde</option>
                    <option>Brown</option>
                    <option>Redhead</option>
                    <option>Others</option>
                  </select>
                </div>
              </div>
            </div>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">About you</p>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Service</label>
                  <input type="text" name="service" pattern="[a-zA-Z]+" class="form-control" required>
                </div>
              </div>
              <div class="col-md-8">
                <label>About me</label>
                <textarea name="description" rows="3" style="resize:none;" class="form-control" required></textarea>
              </div>
            </div>
            <hr>
            <p class="text-center font-weight-bold text-uppercase">Photos</p>
            <div class="form-row mt-3">
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="photo_1">
                  <label class="custom-file-label">Profile Photo</label>
                </div>
              </div>
              <div class="col-md-6">
                <input type="file" class="custom-file-input" name="photos_extras[]" multiple>
                <label class="custom-file-label">Aditional Photos</label>
              </div>
              <input type="hidden" name="status" value="0">
            </div>
            <div class="col-md-12 text-center mt-5">
              <button type="submit" class="btn btn-outline-primary btn-block" name="button">Aceptar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
