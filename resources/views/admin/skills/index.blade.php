<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habilidades — Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #0f1117; font-family: 'Segoe UI', sans-serif; min-height: 100vh; padding: 2rem 3rem; color: #e2e8f0; font-size: 18px; }
        .container { max-width: 900px; margin: 0 auto; }
        .topbar { display: flex; align-items: center; gap: 12px; margin-bottom: 1.5rem; }
        .topbar h1 { font-size: 20px; font-weight: 600; color: #f1f5f9; }
        .topbar p { font-size: 13px; color: #94a3b8; }
        .view-link { margin-left: auto; font-size: 13px; color: #60a5fa; text-decoration: none; }
        .alert-success { background: #052e16; color: #4ade80; border: 1px solid #166534; padding: 12px 16px; border-radius: 10px; margin-bottom: 1rem; font-size: 14px; }
        .card { background: #1a1d27; border-radius: 14px; border: 1px solid #2d3148; padding: 1.5rem; margin-bottom: 1rem; }
        .section-label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 1rem; }
        .form-grid { display: grid; grid-template-columns: 1fr 120px auto; gap: 10px; align-items: end; }
        .form-group { display: flex; flex-direction: column; gap: 5px; }
        label { font-size: 13px; color: #cbd5e1; }
        input { font-size: 14px; padding: 9px 12px; border-radius: 8px; border: 1px solid #2d3148; background: #0f1117; color: #e2e8f0; font-family: inherit; width: 100%; outline: none; transition: border 0.2s; }
        input:focus { border-color: #3b82f6; }
        .btn-add { background: #2563eb; color: #fff; border: none; padding: 9px 18px; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer; white-space: nowrap; }
        .skill-row { display: flex; align-items: center; gap: 1rem; padding: 1rem 0; border-bottom: 1px solid #2d3148; }
        .skill-row:last-child { border-bottom: none; padding-bottom: 0; }
        .skill-name { flex: 1; font-size: 14px; color: #f1f5f9; font-weight: 500; }
        .skill-bar-wrap { flex: 2; background: #0f1117; border-radius: 20px; height: 8px; }
        .skill-bar { background: #2563eb; border-radius: 20px; height: 8px; }
        .skill-pct { font-size: 13px; color: #60a5fa; min-width: 36px; text-align: right; }
        .skill-actions { display: flex; gap: 6px; }
        .btn-edit-small { background: transparent; color: #94a3b8; border: 1px solid #2d3148; padding: 5px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; }
        .btn-delete-small { background: transparent; color: #f87171; border: 1px solid #2d3148; padding: 5px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; }
        .edit-form { display: none; margin-top: 10px; }
        .edit-form.active { display: flex; gap: 10px; align-items: end; }
        .btn-save-small { background: #2563eb; color: #fff; border: none; padding: 9px 14px; border-radius: 8px; font-size: 13px; cursor: pointer; }
        .empty { color: #475569; font-size: 14px; padding: 1rem 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div>
                <h1>⚡ Habilidades</h1>
                <p>Panel de administración</p>
            </div>
            <a href="{{ url('/') }}" class="view-link">↗ Ver portafolio</a>
        </div>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        {{-- Formulario agregar --}}
        <div class="card">
            <p class="section-label">Agregar habilidad</p>
            <form action="{{ route('admin.skills.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" placeholder="Ej: Laravel">
                    </div>
                    <div class="form-group">
                        <label>% Nivel</label>
                        <input type="number" name="percentage" min="0" max="100" placeholder="85">
                    </div>
                    <button type="submit" class="btn-add">+ Agregar</button>
                </div>
            </form>
        </div>

        {{-- Lista de habilidades --}}
        <div class="card">
            <p class="section-label">Habilidades registradas</p>
            @forelse($skills as $skill)
                <div class="skill-row">
                    <span class="skill-name">{{ $skill->name }}</span>
                    <div class="skill-bar-wrap">
                        <div class="skill-bar" style="width: {{ $skill->percentage }}%"></div>
                    </div>
                    <span class="skill-pct">{{ $skill->percentage }}%</span>
                    <div class="skill-actions">
                        <button class="btn-edit-small" onclick="toggleEdit({{ $skill->id }})">Editar</button>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn-delete-small" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </div>
                </div>
                <div class="edit-form" id="edit-{{ $skill->id }}">
                    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" style="display:flex; gap:10px; align-items:end; width:100%">
                        @csrf
                        <div class="form-group" style="flex:1">
                            <label>Nombre</label>
                            <input type="text" name="name" value="{{ $skill->name }}">
                        </div>
                        <div class="form-group" style="width:120px">
                            <label>% Nivel</label>
                            <input type="number" name="percentage" min="0" max="100" value="{{ $skill->percentage }}">
                        </div>
                        <button type="submit" class="btn-save-small">✓ Guardar</button>
                    </form>
                </div>
            @empty
                <p class="empty">No hay habilidades registradas aún.</p>
            @endforelse
        </div>
    </div>

    <script>
        function toggleEdit(id) {
            const form = document.getElementById('edit-' + id);
            form.classList.toggle('active');
        }
    </script>
</body>
</html>