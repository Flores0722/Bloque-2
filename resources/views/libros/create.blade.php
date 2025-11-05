<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 700px;
            margin: 0 auto;
        }
        .card-header-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        .card-header-custom h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 700;
        }
        .card-header-custom .subtitle {
            margin-top: 0.5rem;
            opacity: 0.9;
            font-size: 0.95rem;
        }
        .form-body {
            padding: 2.5rem;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 1rem;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 10px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        .btn-back {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
        .icon-input {
            position: relative;
        }
        .icon-input i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
        }
        .icon-input .form-control {
            padding-left: 2.75rem;
        }
        .alert-success {
            border-radius: 10px;
            border: none;
            background: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="form-card">
            <div class="card-header-custom">
                <i class="bi bi-book-fill" style="font-size: 3rem; display: block; margin-bottom: 0.5rem;"></i>
                <h1>Registrar Nuevo Libro</h1>
                <p class="subtitle">Completa los datos del libro para agregarlo a la biblioteca</p>
            </div>

            <div class="form-body">
                <form action="{{ route('libros.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-bookmark-fill text-primary me-2"></i>Título del Libro
                        </label>
                        <div class="icon-input">
                            <i class="bi bi-pencil-fill"></i>
                            <input type="text" name="Name_Book" class="form-control" 
                                   placeholder="Ej: Cien años de soledad" 
                                   value="{{ old('Name_Book') }}" required>
                        </div>
                        @error('Name_Book') 
                            <div class="text-danger mt-1"><small><i class="bi bi-exclamation-circle"></i> {{ $message }}</small></div> 
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-person-fill text-primary me-2"></i>Autor
                        </label>
                        <div class="icon-input">
                            <i class="bi bi-pen-fill"></i>
                            <input type="text" name="Name_Author" class="form-control" 
                                   placeholder="Ej: Gabriel García Márquez" 
                                   value="{{ old('Name_Author') }}" required>
                        </div>
                        @error('Name_Author') 
                            <div class="text-danger mt-1"><small><i class="bi bi-exclamation-circle"></i> {{ $message }}</small></div> 
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-calendar-fill text-primary me-2"></i>Año de Publicación
                        </label>
                        <div class="icon-input">
                            <i class="bi bi-calendar3"></i>
                            <input type="number" name="year_Publication" class="form-control" 
                                   placeholder="Ej: 1967" 
                                   min="1000" max="{{ date('Y') }}"
                                   value="{{ old('year_Publication') }}" required>
                        </div>
                        @error('year_Publication') 
                            <div class="text-danger mt-1"><small><i class="bi bi-exclamation-circle"></i> {{ $message }}</small></div> 
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-card-text text-primary me-2"></i>Descripción del Libro
                        </label>
                        <textarea name="description_of_the_book" class="form-control" 
                                  rows="4" 
                                  placeholder="Escribe una breve descripción del libro..."
                                  required>{{ old('description_of_the_book') }}</textarea>
                        @error('description_of_the_book') 
                            <div class="text-danger mt-1"><small><i class="bi bi-exclamation-circle"></i> {{ $message }}</small></div> 
                        @enderror
                    </div>

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-primary btn-submit">
                            <i class="bi bi-save-fill me-2"></i>Guardar Libro
                        </button>
                        <a href="{{ route('libros.index') }}" class="btn btn-back text-center">
                            <i class="bi bi-arrow-left me-2"></i>Ver Todos los Libros
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
