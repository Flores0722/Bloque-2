<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Listado de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }
        .header-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
        }
        .header-section h1 {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .header-section p {
            color: #666;
            margin-bottom: 1.5rem;
        }
        .btn-add-book {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
        .btn-add-book:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }
        .book-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        .book-card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }
        .book-icon {
            font-size: 3rem;
            margin-bottom: 0.5rem;
            display: block;
        }
        .book-id {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: rgba(255,255,255,0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .book-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .book-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }
        .book-info {
            margin-bottom: 1rem;
        }
        .book-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            color: #666;
        }
        .book-info-item i {
            color: #667eea;
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }
        .book-description {
            color: #777;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }
        .empty-state {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .empty-state i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 1rem;
        }
        .empty-state h3 {
            color: #666;
            margin-bottom: 1rem;
        }
        .alert-custom {
            border-radius: 15px;
            border: none;
            padding: 1rem 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .stats-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        .stat-box {
            background: white;
            padding: 1rem 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            min-width: 150px;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
            display: block;
        }
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="header-section">
            <i class="bi bi-book-half" style="font-size: 3rem; color: #667eea;"></i>
            <h1>Biblioteca Virtual</h1>
            <p>Gestiona tu colección de libros de manera fácil y organizada</p>
            <a href="{{ route('libros.create') }}" class="btn-add-book">
                <i class="bi bi-plus-circle-fill me-2"></i>Agregar Nuevo Libro
            </a>
        </div>

        @if($libros->count() > 0)
            <div class="stats-container">
                <div class="stat-box">
                    <span class="stat-number">{{ $libros->count() }}</span>
                    <span class="stat-label">
                        <i class="bi bi-book"></i> Libros Totales
                    </span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $libros->unique('Name_Author')->count() }}</span>
                    <span class="stat-label">
                        <i class="bi bi-people"></i> Autores
                    </span>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($libros as $libro)
                    <div class="col">
                        <div class="book-card">
                            <div class="book-card-header">
                                <span class="book-id">#{{ $libro->id }}</span>
                                <i class="bi bi-book-fill book-icon"></i>
                            </div>
                            <div class="book-card-body">
                                <h3 class="book-title">{{ $libro->Name_Book }}</h3>
                                
                                <div class="book-info">
                                    <div class="book-info-item">
                                        <i class="bi bi-person-fill"></i>
                                        <span><strong>Autor:</strong> {{ $libro->Name_Author }}</span>
                                    </div>
                                    <div class="book-info-item">
                                        <i class="bi bi-calendar-event"></i>
                                        <span><strong>Año:</strong> {{ $libro->year_Publication }}</span>
                                    </div>
                                </div>

                                <div class="book-description">
                                    <i class="bi bi-quote text-muted"></i>
                                    {{ Str::limit($libro->description_of_the_book, 150) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-book"></i>
                <h3>No hay libros registrados</h3>
                <p class="text-muted mb-4">Comienza agregando tu primer libro a la biblioteca</p>
                <a href="{{ route('libros.create') }}" class="btn-add-book">
                    <i class="bi bi-plus-circle-fill me-2"></i>Agregar Primer Libro
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
