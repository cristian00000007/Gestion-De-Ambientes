@extends('layouts.app')
@section('content')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
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
                                    <h4 class="card-title">Hola</h4>
                                </div>
                                <div class="card-body">
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
<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="me-50" data-feather="power"></i> SALIR</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
<li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="">
                            </span>
                        <h2 style="color:rgb(248, 109, 23);" class="brand-text">GAFP - CTGI</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div ></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Programa Formacion</span><i data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Tipo de Vinculacion</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('indexV') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('ListaTV') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Area Tematica</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('IndexArea') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('ListaAT') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Ruta de formacion</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('indexFormacion') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('ListaRF') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Tipos de Programa</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('VerTiposProgramas') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('ListTP') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Programa</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('programas.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('programas.lista') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Competencias</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('vercompetencias') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('competencia.lista') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Resultados</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('getCompetencia') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('resultado.lista') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Competencia Ruta</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('indexCompRuta') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('ListCDR') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Categoria de ambientes</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('indexCategoria') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('ListCAm') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Instructor</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('getInstructor') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('listaI') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Fichas</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('getProgramas') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('listaF') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Aprendiz</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('irAprendiz') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('gLAprendiz') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Ambientes</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('IndexAmbiente') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('ListAm') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Programacion</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('indexPcion') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('IndexLPcion') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado</span></a>
                        </li>
                    </ul>
                </li>
                {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Usuario</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('verusuario')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Registrar usuario</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('listUsuario')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Listado de usuarios</span></a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
