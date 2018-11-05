<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'ESCORTMODEL.XXX') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{asset('/image/title-icon.ico')}}">
</head>
<body>
  <img src="{{asset('/image/nav-brand-logo.png')}}" class="img-fluid p-3">
  <div class="container mt-5">
    <div class="card text-center">
      <div class="card-header"><h1>Hai almeno 18 anni?</h1></div>
      <div class="card-body">
        <h2 class="text-center">ADULTI SOLO ESCLUSIONE DI RESPONSABILITÀ</h2>
        <ul class="text-justify">
          <li>EscortModel.xxx contiene materiale di natura adulta relativo ai servizi di intrattenimento per adulti.</li>
          <li>Prima di procedere è necessario leggere, comprendere e accettare le seguenti dichiarazioni riguardanti EscortModel.xxx e il materiale all'interno.</li>
          <li>Accettando le seguenti dichiarazioni e inserendo questo sito Web per adulti, confermi e acconsenti che:</li>
          <ul>
            <li>Sei maggiorenne, come definito dal paese o dallo stato da cui accedi a questo sito web, per visualizzare materiale sessualmente esplicito e pornografico.</li>
            <li>Stai accedendo a questo sito web da un paese o stato in cui è legale accedere a siti Web per adulti o visualizzare materiale sessualmente esplicito o pornografico.</li>
            <li>Non sei offeso dalla nudità, dalle immagini sessuali o da qualsiasi attività sessuale adulta.</li>
            <li>Non permetterete a nessun minore o altra persona per chi è illegale, di accedere o visualizzare il materiale che esiste all'interno di questo sito.</li>
            <li>Non utilizzerai il materiale su questo sito web al di fuori delle autorizzazioni menzionate all'interno.</li>
          </ul>
          <li>Questo sito Web utilizza i cookie e consente loro di essere memorizzati sul tuo computer.</li>
          <li>Hai letto sia i nostri termini d'uso completi che il nostro disclaimer e accetti di essere vincolato da loro.</li>
        </ul>
      </div>
      <div class="card-footer">
        <a href="{{route('escort.index')}}" class="btn btn-outline-primary">Sì, lo sono</a>
        <a href="https://www.google.com/" class="btn btn-outline-primary">No, io non sono</a>
      </div>
    </div>
  </div>
</body>
</html>
