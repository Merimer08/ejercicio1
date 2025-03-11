@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Nueva Asignatura</h1>

            @if ($errors->any())
                <div class="alert alert-error mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('asignaturas.store') }}" method="POST" class="card bg-base-100 shadow-xl">
                @csrf
                <div class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nombre</span>
                        </label>
                        <input type="text" name="nombre" class="input input-bordered" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Descripción</span>
                        </label>
                        <textarea name="descripcion" class="textarea textarea-bordered"
                            required>{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Profesor</span>
                        </label>
                        <select name="profesor_id" class="select select-bordered" required>
                            <option value="">Selecciona un profesor</option>
                            @foreach($profesores as $profesor)
                                <option value="{{ $profesor->id }}" {{ old('profesor_id') == $profesor->id ? 'selected' : '' }}>
                                    {{ $profesor->nombre }} {{ $profesor->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Alumnos (Máximo 15)</span>
                        </label>
                        <select name="alumnos[]" class="select select-bordered" multiple>
                            @foreach($alumnos as $alumno)
                                <option value="{{ $alumno->id }}" {{ in_array($alumno->id, old('alumnos', [])) ? 'selected' : '' }}>
                                    {{ $alumno->nombre }} {{ $alumno->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Crear Asignatura</button>
                        <a href="{{ route('asignaturas.index') }}" class="btn btn-ghost mt-2">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection