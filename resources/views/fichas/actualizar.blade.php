@extends('layouts.header')
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
            </ul>

        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">3</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notificaciones</h4>
                            <div class="badge rounded-pill badge-light-primary">3 Nuevas</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list"><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="{{ asset('images/portrait/small/avatar-s-15.jpg') }}" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Congratulation Sam </span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="{{ asset('images/portrait/small/avatar-s-3.jpg') }}" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Revised Order</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ auth()->user()->name }}</span><span class="user-status">{{ auth()->user()->rol }}</span></div><span class="avatar">@if(auth()->user()->rol == 'Instructor')
                        @foreach ($ver as $info)<img id="foto" class="round" src="{{ asset('storage/'.$info->Instruct_Foto) }}" alt="avatar" height="40" width="40">
                         @endforeach
                    @endif
                    @if(auth()->user()->rol == 'Aprendiz')
                        @foreach ($ver as $info)<img id="foto" class="round" src="{{ asset('storage/'.$info->Aprend_Foto) }}" alt="avatar" height="40" width="40">
                         @endforeach
                    @endif
                    @if(auth()->user()->rol == 'Administrador')
                        @foreach ($ver as $info)<img id="foto" class="round" src="{{ asset('storage/'.$info->Instruct_Foto) }}" alt="avatar" height="40" width="40">
                         @endforeach
                    @endif<span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user" onclick="ver()">

                    <div id="perfil">
                        <input hidden type="button" value="{{ auth()->user()->id }}" id="ij">
                        @if(auth()->user()->rol == 'Aprendiz')<a id="perfil" class="dropdown-item" href="{{ route('perfilA') }}"><i class="me-50" data-feather="user"></i> Profile</a>@endif
                        @if(auth()->user()->rol == 'Instructor')<a id="perfil" class="dropdown-item" href="{{ route('perfilIn') }}"><i class="me-50" data-feather="user"></i> Profile</a>@endif
                    </div>
                    <a class="dropdown-item" href="#"><i class="me-50" data-feather="mail"></i> Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="me-50" data-feather="settings"></i> Settings</a>
                    <div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="me-50" data-feather="power"></i>
                        {{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
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
                                <h4 class="card-title">Actualizar Ficha</h4>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{ route('actualizarBDFicha') }}" method="post" novalidate>
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="id" name="id"  value="{{ $updateFicha->id }}">
                                        <div class="col-xl-4 col-md-6 col-12 position-relative" class="form-control">
                                            <label for="Programa_Id" >Programa</label>
                                            <select name="Programa_Id" id="Programa_Id" class="form-select" required>
                                                @foreach ($infoPrograma as $programas)
                                                <option hidden></option>
                                                <option value="{{ $programas->id }}">{{ $programas->Progra_Nombre }}</option>
                                                @endforeach

                                            </select>
                                            <div class="invalid-tooltip">El Programa es Obligatorio.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative" class="form-control">
                                            <label for="RutaFormacionId" >Ruta</label>
                                            <select name="RutaFormacionId" id="RutaFormacionId" class="form-select" required>
                                                @foreach ($infoR as $programas)
                                                <option hidden></option>
                                                <option value="{{ $programas->id }}">{{ $programas->Ruta_Nombre }}</option>
                                                @endforeach

                                            </select>
                                            <div class="invalid-tooltip">El Programa es Obligatorio.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative" class="form-control">
                                            <label for="InstructorId" >Instructor</label>
                                            <select name="InstructorId" id="InstructorId" class="form-select" required>
                                                @foreach ($infoI as $programas)
                                                <option hidden></option>
                                                <option value="{{ $programas->id }}">{{ $programas->Instruct_Nombres}}</option>
                                                @endforeach

                                            </select>
                                            <div class="invalid-tooltip">El Nombre es Obligatorio.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative">
                                            <label for="Ficha_Numero">numero ficha</label>
                                            <input type="number" name="Ficha_Numero" id="Ficha_Numero" class="form-control" value="{{ $updateFicha->Ficha_Numero }}" required>
                                            <div class="invalid-tooltip">El numrto es Obligatorio.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative">
                                            <label for="Ficha_CantidadApren">Cantidad de Aprendices</label>
                                            <input type="number" name="Ficha_CantidadApren" id="Ficha_CantidadApren" class="form-control" value="{{ $updateFicha->Ficha_CantidadApren }}" required>
                                            <div class="invalid-tooltip">La Cantiad es Obligatorio.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative">
                                            <label for="Ficha_Jornada">jornada</label>
                                            <input type="text" name="Ficha_Jornada" id="Ficha_Jornada" class="form-control" value="{{ $updateFicha->Ficha_Jornada }}" required>
                                            <div class="invalid-tooltip">La Jornada es Obligatoria.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative">
                                            <label for="Ficha_FechaInicio">Ficha de Inicio</label>
                                            <input type="date" name="Ficha_FechaInicio" id="Ficha_FechaInicio" placeholder="Dia de inicio de la ficha" class="form-control" value="{{ $updateFicha->Ficha_FechaInicio }}" required>
                                            <div class="invalid-tooltip">El Inicio es Obligatorio.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative">
                                            <label for="Ficha_FechaFin">Fecha de Fin</label>
                                            <input type="date" name="Ficha_FechaFin" id="Ficha_FechaFin" placeholder="Dia de final de la ficha" class="form-control" value="{{ $updateFicha->Ficha_FechaFin }}" required>
                                            <div class="invalid-tooltip">El Final es Obligatorio.</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 position-relative">
                                            <label for="Ficha_Estado">Estado</label>
                                            <input type="text" name="Ficha_Estado" id="Ficha_Estado" class="form-control" value="{{ $updateFicha->Ficha_Estado }}" required>
                                            <div class="invalid-tooltip">El Estado es Obligatorio.</div>
                                        </div>

                                        <div >
                                            <br>
                                            <button type="submit" value="Actualizar" class="btn btn-primary">ACTUALIZAR</button>
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
