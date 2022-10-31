@extends('layouts.header')
@section('content')
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div><img class="img-fluid" src="{{ asset('images/logoS.jpeg') }}"/></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Registro</h2><a href="{{ route('register') }}"><span>&nbsp;Aprendiz</span></a>
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" for="nombre">Nombre</label>
                                        <input class="form-control" id="nombre" type="text" name="nombre" placeholder="johndoe" aria-describedby="nomnre" autofocus="" tabindex="1" value="{{ old('nombre') }}"/>
                                        @error('nombre')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Nombre obligatorio</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="apl">Apellido</label>
                                        <input class="form-control" id="apl" type="text" name="apl" placeholder="lupes" aria-describedby="apl" autofocus="" tabindex="1" value="{{ old('apl') }}"/>
                                        @error('apl')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Apellido obligatorio</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="document">Documento</label>
                                        <input class="form-control" id="document" type="number" name="document" placeholder="100000000" aria-describedby="document" autofocus="" tabindex="1" value="{{ old('document') }}"/>
                                        @error('document')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Apellido obligatorio</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="celular">Celular</label>
                                        <input class="form-control" id="celular" type="number" name="celular" placeholder="3023002" aria-describedby="celular" autofocus="" tabindex="1" value="{{ old('celular') }}"/>
                                        @error('celular')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Apellido obligatorio</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" name="email" placeholder="john@example.com" aria-describedby="email" tabindex="2" value="{{ old('name') }}"/>
                                        @error('email')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Email obligatorio</p>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="rol" value="Instructor">
                                    <div class="mb-1">
                                        <label class="form-label" for="area">Area Tematica</label>
                                        <select class="form-control" id="area" name="area">
                                            @foreach ($vei as $info)
                                                <option value="{{ $info->id }}">{{ $info->Area_Tem_Nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('email')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Email obligatorio</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="vinculacion">Area Tematica</label>
                                        <select class="form-control" id="vinculacion" name="vinculacion">
                                            @foreach ($vee as $info)
                                                <option value="{{ $info->id }}">{{ $info->Tipo_Vin_Nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('email')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Email obligatorio</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                        @error('password')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Contraseña obligatoria</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="password">Confirmar Contraseña</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password-confirm" type="password" name="password_confirmation" placeholder="············" aria-describedby="password" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                        @error('password')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Contraseña obligatoria</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="foto">Foto</label>
                                        <input class="form-control" type="file" name="foto" id="foto" accept=".jpg, .png, .gif" required>
                                        @error('foto')
                                        <p class="badge text-danger border border-danger p-1 my-1">*Foto obligatorio</p>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                                            <label class="form-check-label" for="register-privacy-policy">Aceptar<a href="#">&nbsp;Politica y Terminos</a></label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100" tabindex="5">REGISTRAR</button>
                                </form>
                                <p class="text-center mt-2"><span>Ya estas Registrado?</span><a href="{{ route('login') }}"><span>&nbsp;Entra Aqui</span></a></p>
                            </div>
                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
