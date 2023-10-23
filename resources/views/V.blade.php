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
    @extends('m')

    @section('contenido')

    <h1 class="text-center p-3">Voluntarios</h1>
  

    <script>
        var res =function(){
            var not=confirm("¿Esta seguro de eliminar?");
            return not;
        }
    </script>
 <!-- Modal Añadir-->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalRegistar">Registrar Voluntarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('v.create') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="dui" class="form-label">Dui</label>
                        <input type="text" class="form-control" id="dui" name="dui" placeholder="########-#" maxlength="10">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="####-####" maxlength="10">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo">
                    </div>
                  
                     <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>
</div>
    <div class="p-5 table-responsive">

        <button class="btn btn-success" type="button" data-bs-toggle="modal"
            data-bs-target="#modalRegistrar">Añadir</button>

        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dui</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($voluntarios as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->dui}}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->correo }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalModificar{{$item->id}}"
                                class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('v.delete',$item->id)}}" onclick="return res()" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i></a>
                        </td>

                        <!-- Modal Modificar-->
                        <div class="modal fade" id="modalModificar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalModificar">Modificar Datos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('v.update',$item->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <div>
                                                    <label for="id" class="form-label">ID</label>
                                                    <input type="text" class="form-control" id="id"
                                                        name="id" value="{{$item->id}}" readonly>
                                                    </div>
                                                <div>
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre"
                                                    name="nombre" value="{{$item->nombre}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dui" class="form-label">Dui</label>
                                                    <input type="text" class="form-control" id="dui" name="dui" placeholder="########-#" maxlength="10" value="{{$item->dui}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telefono" class="form-label">Telefono</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="####-####" maxlength="10" value="{{$item->telefono}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="correo" class="form-label">Correo</label>
                                                    <input type="email" class="form-control" id="correo" name="correo" value="{{$item->correo}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </tr>
        @endforeach

        </tbody>
        </table>
     </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @endsection
</body>

</html>

