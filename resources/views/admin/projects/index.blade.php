<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos — Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #0f1117; font-family: 'Segoe UI', sans-serif; min-height: 100vh; padding: 2rem 3rem; color: #e2e8f0; font-size: 18px; }
        .container { max-width: 900px; margin: 0 auto; }
        .topbar { display: flex; align-items: center; gap: 12px; margin-bottom: 1.5rem; }
        .topbar h1 { font-size: 20px; font-weight: 600; color: #f1f5f9; }
        .topbar p { font-size: 13px; color: #94a3b8; }
        .btn-new { margin-left: auto; background: #2563eb; color: #fff; border: none; padding: 10px 18px; border-radius: 10px; font-size: 14px; font-weight: 500; cursor: pointer; text-decoration: none; }
        .view-link { font-size: 13px; color: #60a5fa; text-decoration: none; margin-left: 12px; }
        .alert-success { background: #052e16; color: #4ade80; border: 1px solid #166534; padding: 12px 16px; border-radius: 10px; margin-bottom: 1rem; font-size: 14px; }
        .card { background: #1a1d27; border-radius: 14px; border: 1px solid #2d3148; padding: 1.25rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem; }
        .card img { width: 80px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #2d3148; }
        .card-placeholder { width: 80px; height: 60px; border-radius: 8px; background: #0f1117; border: 1px dashed #2d3148; display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0; }
        .card-info { flex: 1; }
        .card-title { font-size: 15px; font-weight: 600; color: #f1f5f9; margin-bottom: 4px; }
        .card-desc { font-size: 13px; color: #94a3b8; }
        .card-tech { font-size: 12px; color: #60a5fa; margin-top: 4px; }
        .card-actions { display: flex; gap: 8px; flex-shrink: 0; }
        .btn-edit { background: transparent; color: #94a3b8; border: 1px solid #2d3148; padding: 7px 14px; border-radius: 8px; font-size: 13px; text-decoration: none; }
        .btn-edit:hover { border-color: #60a5fa; color: #60a5fa; }
        .btn-delete { background: transparent; color: #f87171; border: 1px solid #2d3148; padding: 7px 14px; border-radius: 8px; font-size: 13px; cursor: pointer; }
        .btn-delete:hover { border-color: #f87171; }
        .empty { text-align: center; color: #475569; padding: 3rem; font-size: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div>
                <h1>📁 Proyectos</h1>
                <p>Panel de administración</p>
            </div>
            <a href="{{ url('/') }}" class="view-link">↗ Ver portafolio</a>
            <a href="{{ route('admin.projects.create') }}" class="btn-new">+ Nuevo proyecto</a>
        </div>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        @forelse($projects as $project)
            <div class="card">
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                @else
                    <div class="card-placeholder">🖼️</div>
                @endif
                <div class="card-info">
                    <p class="card-title">{{ $project->title }}</p>
                    <p class="card-desc">{{ Str::limit($project->description, 80) }}</p>
                    @if($project->technologies)
                        <p class="card-tech">{{ $project->technologies }}</p>
                    @endif
                </div>
                <div class="card-actions">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn-edit">Editar</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Eliminar este proyecto?')">Eliminar</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty">No hay proyectos aún. ¡Crea el primero!</div>
        @endforelse
    </div>
</body>
</html>