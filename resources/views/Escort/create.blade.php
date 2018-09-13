@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="col-md-12">
      <div class="card no-border">
        <div class="card-header">
          Complete your Profile
        </div>
        <div class="card-body">
          <form action="{{route('escort.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Age</label>
                  <input type="number" name="age" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Birthday</label>
                  <input type="date" name="birthday" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="gender">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Transexual">Transexual</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" name="country" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>State / Province / City</label>
                  <input type="text" name="state" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nationality</label>
                  <input type="text" name="nationality" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Height</label>
                  <input type="number" name="height" class="form-control" placeholder="cm">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Weight</label>
                  <input type="number" name="weight"  class="form-control" placeholder="Kg">
                </div>
              </div>
              <div class="col-md-6">
                <label>Size</label>
                <div class="form-row">
                  <div class="col-md-4">
                    <input type="number" name="breast" class="form-control" placeholder="Breast">
                  </div>
                  <div class="col-md-4">
                    <input type="number" name="waist" class="form-control" placeholder="Waist">
                  </div>
                  <div class="col-md-4">
                    <input type="number" name="hip" class="form-control" placeholder="Hip">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Eyes Color</label>
                  <input type="text" name="eye_color" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Hair Color</label>
                  <input type="text" name="hair_color" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>phone</label>
                  <input type="text" name="phone" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Service</label>
                  <input type="text" name="service" class="form-control">
                </div>
              </div>
              <div class="col-md-8">
                <label>About me</label>
                <textarea name="description" rows="3" style="resize:none;" class="form-control"></textarea>
                <input type="hidden" name="status" value="1">
              </div>
            </div>
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
            </div>
            <div class="form-row mt-3">
            </div>
            <div class="col-md-12 text-center mt-5">
              <button type="submit" class="btn btn-outline-primary" name="button">Aceptar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
