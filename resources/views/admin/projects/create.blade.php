<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Proyecto — Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #0f1117; font-family: 'Segoe UI', sans-serif; min-height: 100vh; padding: 2rem 3rem; color: #e2e8f0; font-size: 18px; }
        .container { max-width: 900px; margin: 0 auto; }
        .topbar { display: flex; align-items: center; gap: 12px; margin-bottom: 1.5rem; }
        .topbar h1 { font-size: 20px; font-weight: 600; color: #f1f5f9; }
        .topbar p { font-size: 13px; color: #94a3b8; }
        .card { background: #1a1d27; border-radius: 14px; border: 1px solid #2d3148; padding: 1.5rem; margin-bottom: 1rem; }
        .section-label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 1rem; }
        .form-group { display: flex; flex-direction: column; gap: 5px; margin-bottom: 1rem; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        label { font-size: 13px; color: #cbd5e1; }
        input, textarea { font-size: 14px; padding: 9px 12px; border-radius: 8px; border: 1px solid #2d3148; background: #0f1117; color: #e2e8f0; font-family: inherit; width: 100%; outline: none; transition: border 0.2s; }
        input:focus, textarea:focus { border-color: #3b82f6; }
        textarea { resize: vertical; line-height: 1.6; }
        .actions { display: flex; justify-content: flex-end; gap: 8px; margin-top: 0.5rem; }
        .btn-cancel { background: transparent; color: #94a3b8; border: 1px solid #2d3148; padding: 10px 18px; border-radius: 10px; font-size: 14px; cursor: pointer; text-decoration: none; }
        .btn-save { background: #2563eb; color: #fff; border: none; padding: 10px 22px; border-radius: 10px; font-size: 14px; font-weight: 500; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div>
                <h1>➕ Nuevo proyecto</h1>
                <p>Panel de administración</p>
            </div>
        </div>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <p class="section-label">Información del proyecto</p>
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="title" placeholder="Nombre del proyecto">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="description" rows="4" placeholder="Describe el proyecto..."></textarea>
                </div>
                <div class="form-group">
                    <label>Tecnologías</label>
                    <input type="text" name="technologies" placeholder="Laravel, Vue.js, MySQL...">
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>URL GitHub</label>
                        <input type="text" name="github_url" placeholder="https://github.com/...">
                    </div>
                    <div class="form-group">
                        <label>URL Demo</label>
                        <input type="text" name="demo_url" placeholder="https://...">
                    </div>
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input type="file" name="image" accept="image/*">
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('admin.projects.index') }}" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-save">✓ Guardar proyecto</button>
            </div>
        </form>
    </div>
</body>
</html>