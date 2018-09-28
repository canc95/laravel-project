@extends('layouts.app')
@section('content')

  <div class="container">
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="{{'#addPlan'}}"><i class="fas fa-plus"></i> New</button>
    <table class="table table-striped table-hover table-bordered" style="width:100">
      <thead>
        <tr>
          <th class="text-center">Name</th>
          <th class="text-center">Price</th>
          <th class="text-center">Duration</th>
          <th class="text-center">Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($plans as $plan)
          <tr>
            <td class="text-center">{{$plan->name}}</td>
            <td class="text-center">{{$plan->price}}</td>
            <td class="text-center">{{$plan->duration}}</td>
            <td class="text-center">
              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="{{'#edit' . $plan->id}}"><i class="far fa-edit"></i></button>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="{{'#delete' . $plan->id}}"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- Modal edit --}}
    @foreach ($plans as $plan)
      <div class="modal fade" id="edit{{$plan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit {{$plan->plan_name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('plan.update', $plan->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Plan Name</label>
                  <input type="text" name="name" pattern="[a-zA-Z]+" class="form-control" value="{{$plan->name}}">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" name="price" pattern="[0-9]" value="{{$plan->price}}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Duration</label>
                  <input type="number" pattern="[0-9]" name="duration" class="form-control" value="{{$plan->duration}}">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" rows="5" class="form-control" required>{{$plan->description}}</textarea>
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
      @foreach ($plans as $plan)
        <div class="modal fade" id="delete{{$plan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete {{$plan->name}} plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>Are you sure want delete {{$plan->name}} plan</p>
                  <div class="form-group text-center">
                    <a href="{{route('plan.delete', $plan->id)}}" class="btn btn-outline-primary btn-block">Delete</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      @endforeach
        {{-- End Modal delete --}}
        {{-- Modal add --}}
    <div class="modal fade" id="addPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New Plan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('plan.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required pattern="[a-zA-Z]+">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" pattern="[0-9]" required class="form-control">
              </div>
              <div class="form-group">
                <label>Duration</label>
                <input type="number" name="duration" pattern="[0-9]" required class="form-control">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="5" class="form-control" required></textarea>
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
