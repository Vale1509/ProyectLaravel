<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adopcion canina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>

  
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid p-3 mb-2 bg-success text-white">
      <a class="navbar-brand" href="{{route('m.index')}}">Menu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="navbar-nav ">
            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('p.index')}}">Perros</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('a.index')}}">Adoptantes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('v.index')}}">Voluntarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('d.index')}}">Donaciones</a>
          </li>
      </ul>
      </div>
    </div>
  </nav>

    

      @yield('contenido')
      


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

