@extends('layouts.app')
@section('content')

  <div class="container">
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="{{'#add'}}"><i class="fas fa-plus"></i> New</button>
    <table class="table table-striped table-hover table-bordered mt-3">
      <thead>
        <tr>
          <th class="text-center">Continent</th>
          <th class="text-center">Country</th>
          <th class="text-center">Options</th>
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
              <h5 class="modal-title">Edit {{$country->country_name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('country.update', $country->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Continent</label>
                  <select class="form-control" name="continent_name">
                    <option selected disabled>Select...</option>
                    <option>Africa</option>
                    <option>Asia</option>
                    <option>Europe</option>
                    <option>North America</option>
                    <option>South America</option>
                    <option>Oceania</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Country Name</label>
                  <input type="text" name="country_name" value="{{$country->country_name}}" class="form-control">
                </div>
                <div class="form-group text-center">
                  <input type="submit" class="btn btn-outline-primary" value="Aceptar">
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
                <h5 class="modal-title">Delete {{$country->country_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>Are you sure want delete {{$country->country_name}}</p>
                  <div class="form-group text-center">
                    <a href="{{route('country.delete', $country->id)}}" class="btn btn-outline-primary btn-block"></a>
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
            <h5 class="modal-title">Edit {{$country->country_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('country.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Continent</label>
                <select class="form-control" name="continent_name">
                  <option selected disabled>Select...</option>
                  <option>Africa</option>
                  <option>Asia</option>
                  <option>Europe</option>
                  <option>North America</option>
                  <option>South America</option>
                  <option>Oceania</option>
                </select>
              </div>
              <div class="form-group">
                <label>Country Name</label>
                <input type="text" name="country_name" class="form-control">
              </div>
              <div class="form-group text-center">
                <input type="submit" class="btn btn-outline-primary" value="Aceptar">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End Modal add --}}
  </div>

@endsection
