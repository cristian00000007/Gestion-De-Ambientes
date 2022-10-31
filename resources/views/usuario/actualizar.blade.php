@extends('layouts.app')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="#"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="#"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="#"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Inputs start -->
            <section id="basic-input" class="tooltip-validations">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Actualizar programas</h4>
                            </div>
                            <div class="card-body">

                                <form class="needs-validation" method="POST" action="{{ route('actualizarBDU') }}" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div>
                                            <input type="hidden" name="id" value="{{ $updateUsuario->id}}">
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="documento">Documento</label>
                                            <input type="text" name="documento" id="documento" class="form-control form-control-lg" value="{{ $updateUsuario->documento}}" required>
                                            <div class="invalid-tooltip">El valor Duracion es Obligatorio.</div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="email">Correo</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ $updateUsuario->email}}" required>
                                            <div class="invalid-tooltip">El valor Duracion es Obligatorio.</div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="contrasena">Contraseña</label>
                                            <input type="password" name="contrasena" id="contrasena" class="form-control form-control-lg" value="{{ $updateUsuario->contrasena}}" required>
                                            <div class="invalid-tooltip">El valor Duracion es Obligatorio.</div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="rol">Rol</label>
                                            <input type="text" name="rol" id="rol" class="form-control form-control-lg" value="{{ $updateUsuario->rol}}" required>
                                            <div class="invalid-tooltip">El valor Duracion es Obligatorio.</div>
                                        </div>
                                        <div>
                                            <br>
                                            <button type="submit" value="registrar" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@include('layouts.Footer')
@endsection
