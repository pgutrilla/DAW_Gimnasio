@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Actualización de estudios</h1>

        <form action="/users/{{$user->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
            <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>

                    <div class="col-md-6">
                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{$user->dni}}" required autocomplete="dni" autofocus>

                        @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="height" class="col-md-4 col-form-label text-md-end">{{ __('Altura') }}</label>

                    <div class="col-md-6">
                        <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{$user->height}}" required autocomplete="height" step="0.1" autofocus>

                        @error('height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Peso') }}</label>

                    <div class="col-md-6">
                        <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{$user->weight}}" required autocomplete="weight" autofocus>

                        @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                    <div class="col-md-6">
                        <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{$user->birth_date}}" required autocomplete="birth" autofocus>

                        @error('birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label> -->
                    <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>

                    <div class="col-md-6">
                        <div class="display-flex">
                            @if($user->gender == "Hombre")         
                                <label class="half-width">Hombre</label><input id="sex" type="radio" class=" tiny-width form-control @error('sex') is-invalid @enderror " name="sex" value="Hombre" required autocomplete="sex" checked autofocus>
                            @else
                                <label class="half-width">Hombre</label><input id="sex" type="radio" class=" tiny-width form-control @error('sex') is-invalid @enderror " name="sex" value="Hombre" required autocomplete="sex" autofocus>
                            @endif                        
                        </div>
                        
                        <div class="display-flex">
                            @if($user->gender == "Mujer")         
                                <label class="half-width">Mujer</label><input id="sex" type="radio" class=" tiny-width form-control @error('sex') is-invalid @enderror " name="sex" value="Mujer" required autocomplete="sex" checked autofocus>
                            @else
                                <label class="half-width">Mujer</label><input id="sex" type="radio" class=" tiny-width form-control @error('sex') is-invalid @enderror " name="sex" value="Mujer" required autocomplete="sex" autofocus>
                            @endif                        
                        </div>

                        @error('sex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

        
        <div>
            <input type="submit" value="actualizar"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection