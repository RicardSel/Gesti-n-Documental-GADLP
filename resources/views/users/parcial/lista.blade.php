@if (count($usuarios) > 0)
    @foreach ($usuarios as $usuario)
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="contenedor_cliente">
                        <div class="opciones">
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                    <a href="{{ route('users.edit', $usuario->id) }}" class="dropdown-item"><i
                                                class="fa fa-edit"></i>
                                            Editar</a>
                                    <a href="#" data-url="{{ route('users.destroy', $usuario->user->id) }}" data-info="{{$usuario->nombre}} {{$usuario->paterno}} {{$usuario->materno}}" data-toggle="modal"
                                            data-target="#modal-eliminar" class="eliminar dropdown-item" ><i class="fa fa-trash"></i>
                                            Eliminar</a>
                                </div>
                            </div>
                        </div>
                        <div class="foto_cliente">
                            <a href="{{ route('users.edit', $usuario->id) }}" class="foto">
                                <img src="{{ asset('imgs/users/' . $usuario->user->foto) }}" alt="Foto">
                            </a>
                        </div>
                        <div class="nombre_cliente">
                            {{ $usuario->nombre }}
                            {{ $usuario->paterno }}
                            {{ $usuario->materno }}
                        </div>
                        <div class="ocupacion_cliente">
                            {{ $usuario->ocupacion }}
                        </div>
                        <div class="ci_cliente">
                            CI: {{ $usuario->ci }} {{ $usuario->ci_exp }}
                        </div>
                        <div class="ci_cliente">
                            Usuario: {{ $usuario->user->name }}
                        </div>
                        <div class="ocupacion_cliente">
                          {{$usuario->user->tipo}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
<div class="col-md-12">
    NO SE ENCONTRARON REGISTROS
</div>
@endif
