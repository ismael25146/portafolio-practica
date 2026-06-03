<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experiencia — Admin</title>
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
        .form-group { display: flex; flex-direction: column; gap: 5px; margin-bottom: 1rem; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        label { font-size: 13px; color: #cbd5e1; }
        input, textarea { font-size: 14px; padding: 9px 12px; border-radius: 8px; border: 1px solid #2d3148; background: #0f1117; color: #e2e8f0; font-family: inherit; width: 100%; outline: none; transition: border 0.2s; }
        input:focus, textarea:focus { border-color: #3b82f6; }
        textarea { resize: vertical; line-height: 1.6; }
        .btn-add { background: #2563eb; color: #fff; border: none; padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer; }
        .exp-row { padding: 1rem 0; border-bottom: 1px solid #2d3148; }
        .exp-row:last-child { border-bottom: none; padding-bottom: 0; }
        .exp-header { display: flex; align-items: center; justify-content: space-between; }
        .exp-position { font-size: 15px; font-weight: 600; color: #f1f5f9; }
        .exp-company { font-size: 13px; color: #60a5fa; margin-top: 2px; }
        .exp-dates { font-size: 12px; color: #64748b; margin-top: 2px; }
        .exp-desc { font-size: 13px; color: #94a3b8; margin-top: 6px; line-height: 1.6; }
        .exp-actions { display: flex; gap: 6px; flex-shrink: 0; }
        .btn-edit-small { background: transparent; color: #94a3b8; border: 1px solid #2d3148; padding: 5px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; }
        .btn-delete-small { background: transparent; color: #f87171; border: 1px solid #2d3148; padding: 5px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; }
        .edit-form { display: none; margin-top: 12px; }
        .edit-form.active { display: block; }
        .btn-save { background: #2563eb; color: #fff; border: none; padding: 9px 18px; border-radius: 8px; font-size: 13px; cursor: pointer; }
        .btn-cancel-small { background: transparent; color: #94a3b8; border: 1px solid #2d3148; padding: 9px 14px; border-radius: 8px; font-size: 13px; cursor: pointer; }
        .empty { color: #475569; font-size: 14px; padding: 1rem 0; }
        .actions-row { display: flex; justify-content: flex-end; gap: 8px; margin-top: 0.5rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div>
                <h1>💼 Experiencia laboral</h1>
                <p>Panel de administración</p>
            </div>
            <a href="{{ url('/') }}" class="view-link">↗ Ver portafolio</a>
        </div>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        {{-- Formulario agregar --}}
        <div class="card">
            <p class="section-label">Agregar experiencia</p>
            <form action="{{ route('admin.experiences.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Puesto</label>
                        <input type="text" name="position" placeholder="Ej: Desarrollador Backend">
                    </div>
                    <div class="form-group">
                        <label>Empresa</label>
                        <input type="text" name="company" placeholder="Ej: Google">
                    </div>
                    <div class="form-group">
                        <label>Fecha inicio</label>
                        <input type="date" name="start_date">
                    </div>
                    <div class="form-group">
                        <label>Fecha fin (dejar vacío si actual)</label>
                        <input type="date" name="end_date">
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="description" rows="3" placeholder="Describe tus responsabilidades..."></textarea>
                </div>
                <div class="actions-row">
                    <button type="submit" class="btn-add">+ Agregar</button>
                </div>
            </form>
        </div>

        {{-- Lista --}}
        <div class="card">
            <p class="section-label">Experiencias registradas</p>
            @forelse($experiences as $exp)
                <div class="exp-row">
                    <div class="exp-header">
                        <div>
                            <p class="exp-position">{{ $exp->position }}</p>
                            <p class="exp-company">{{ $exp->company }}</p>
                            <p class="exp-dates">
                                {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} —
                                {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Actualidad' }}
                            </p>
                        </div>
                        <div class="exp-actions">
                            <button class="btn-edit-small" onclick="toggleEdit({{ $exp->id }})">Editar</button>
                            <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" class="btn-delete-small" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    @if($exp->description)
                        <p class="exp-desc">{{ $exp->description }}</p>
                    @endif

                    <div class="edit-form" id="edit-{{ $exp->id }}">
                        <form action="{{ route('admin.experiences.update', $exp) }}" method="POST">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Puesto</label>
                                    <input type="text" name="position" value="{{ $exp->position }}">
                                </div>
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input type="text" name="company" value="{{ $exp->company }}">
                                </div>
                                <div class="form-group">
                                    <label>Fecha inicio</label>
                                    <input type="date" name="start_date" value="{{ $exp->start_date }}">
                                </div>
                                <div class="form-group">
                                    <label>Fecha fin</label>
                                    <input type="date" name="end_date" value="{{ $exp->end_date }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea name="description" rows="3">{{ $exp->description }}</textarea>
                            </div>
                            <div class="actions-row">
                                <button type="button" class="btn-cancel-small" onclick="toggleEdit({{ $exp->id }})">Cancelar</button>
                                <button type="submit" class="btn-save">✓ Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <p class="empty">No hay experiencias registradas aún.</p>
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