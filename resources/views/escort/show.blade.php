@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="row">
          <img src="{{ asset('storage/escorts/photos/'. $escort->photo_1) }}" alt="{{$escort->first_name}}-{{$escort->last_name}}" class="img-fluid">
        </div>
      </div>
      <div class="col-md-7 p-0">
        <div class="card">
          <div class="card-header bg-primary p-5 no-border position-relative">
            <h4 class="text-white">{{ $escort->first_name }} {{ $escort->last_name }} <span class="text-danger">{{ $escort->age }}</span></h4>
            @guest
              @else
                @if (Auth::user()->id == $escort->user_id)
                  @can ('edit-escort')
                    <a href="{{route('escort.edit', $escort->id)}}" class="text-white text-uppercase position-absolute button-absolute"><span class="fas fa-pencil-alt"></span></a>
                  @endcan
                @endif
            @endguest
          </div>
          <div class="card-body no-border no-padding pt-4">
            <div class="row">
              <div class="col-md-12">
                <h5 class="text-uppercase text-danger text-center">{{$escort->service}}</h5>
                <h6 class="text-uppercase text-center mt-3"><i class="fas fa-phone-square"></i> {{$escort->phone}}</h6>
              </div>
              <div class="col-md-6 mt-3">
                <p class="text-center text-dark">
                  @if ($escort->gender == 'Femmina' || $escort->gender == 'Female')
                    <i class="fas fa-venus"></i>, <i class="fas fa-globe"></i> <strong class="font-weight-bold text-capitalize">{{$escort->state->country->country_name}}, {{$escort->state->name}}, {{$escort->nationality}}</strong>
                  @elseif ($escort->gender == 'Maschio' || $escort->gender == 'Male')
                    <i class="fas fa-mars"></i>, <i class="fas fa-globe"></i> <strong class="font-weight-bold text-capitalize">{{$escort->state->country->country_name}}, {{$escort->state->name}}, {{$escort->nationality}}</strong>
                  @elseif ($escort->gender == 'Transessuale' || $escort->gender == 'Transexual')
                    <i class="fas fa-transgender"></i>, <i class="fas fa-globe"></i> <strong class="font-weight-bold text-capitalize">{{$escort->state->country->country_name}}, {{$escort->state->name}}, {{$escort->nationality}}</strong>
                    @else
                      <i class="fas fa-transgender-alt"></i>, <i class="fas fa-globe"></i> <strong class="font-weight-bold text-capitalize">{{$escort->state->country->country_name}}, {{$escort->state->name}}, {{$escort->nationality}}</strong>
                  @endif
                </p>
                <p class="text-center text-dark"><i class="far fa-eye"></i> <strong>{{$escort->eye_color}}</strong></p>
                <p class="text-center text-dark"><strong>Colore dei capelli {{$escort->hair_color}}</strong></p>
              </div>
              <div class="col-md-6 mt-3">
                <p class="text-center text-dark"><strong>{{$escort->height}} <span class="text-danger">cm</span> </strong></p>
                <p class="text-center text-dark"><strong>{{$escort->weight}} <span class="text-danger">Kg</span> </strong></p>
                <p class="text-center text-dark"><strong>{{$escort->breast}} - <span class="text-danger">{{$escort->waist}}</span> - {{$escort->hip}}</strong></p>
              </div>
            </div>
            <div class="row">
              @guest
                <div class="col flex-photos pt-1 pb-2">
                  <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_2) }}" onclick="openModal();currentSlide(1)" class="profile-photo" alt="">
                  <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_3) }}" onclick="openModal();currentSlide(2)" class="profile-photo" alt="">
                  <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_4) }}" onclick="openModal();currentSlide(3)" class="profile-photo" alt="">
                  <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_5) }}" onclick="openModal();currentSlide(4)" class="profile-photo" alt="">
                </div>
                @else
                  <div class="col flex-photos pt-5 pb-2">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_2) }}" onclick="openModal();currentSlide(1)" class="profile-photo" alt="">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_3) }}" onclick="openModal();currentSlide(2)" class="profile-photo" alt="">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_4) }}" onclick="openModal();currentSlide(3)" class="profile-photo" alt="">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_5) }}" onclick="openModal();currentSlide(4)" class="profile-photo" alt="">
                  </div>
              @endguest
            </div>
            <div id="photoModal" class="modalPhoto">
              <span class="close-photo cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content-photo">
                  <div class="mySlides">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_2) }}">
                  </div>
                  <div class="mySlides">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_3) }}">
                  </div>
                  <div class="mySlides">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_4) }}">
                  </div>
                  <div class="mySlides">
                    <img src="{{ asset('/storage/escorts/photos/'. $escort->photo_5) }}">
                  </div>
                  <!-- Next/previous controls -->
                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 p-0">
        <p name="name" rows="3" cols="100" class="bg-primary text-white p-5">
          <strong class="small text-danger text-uppercase font-weight-bold">A proposito di me</strong> <br>
          {{$escort->description}}
        </p>
      </div>
    </div>
  </div>
  <script>
  // Open the Modal
  function openModal() {
    document.getElementById('photoModal').style.display = "block";
  }

  // Close the Modal
  function closeModal() {
    document.getElementById('photoModal').style.display = "none";
  }

  var slideIndex = 1;
  showSlides(slideIndex);

  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
  </script>
@endsection
