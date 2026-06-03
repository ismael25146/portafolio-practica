<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil — Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #0f1117; font-family: 'Segoe UI', sans-serif; min-height: 100vh; padding: 2rem 1rem; color: #e2e8f0; }
        .container { max-width: 700px; margin: 0 auto; }
        .topbar { display: flex; align-items: center; gap: 12px; margin-bottom: 1.5rem; }
        .topbar-icon { width: 40px; height: 40px; border-radius: 50%; background: #1e3a5f; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .topbar h1 { font-size: 18px; font-weight: 600; color: #f1f5f9; }
        .topbar p { font-size: 13px; color: #94a3b8; }
        .view-link { margin-left: auto; font-size: 13px; color: #60a5fa; text-decoration: none; }
        .card { background: #1a1d27; border-radius: 14px; border: 1px solid #2d3148; padding: 1.5rem; margin-bottom: 1rem; }
        .section-label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 1rem; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .form-group { display: flex; flex-direction: column; gap: 5px; }
        label { font-size: 13px; color: #cbd5e1; }
        input, textarea {
            font-size: 14px; padding: 9px 12px;
            border-radius: 8px;
            border: 1px solid #2d3148;
            background: #0f1117;
            color: #e2e8f0;
            font-family: inherit;
            width: 100%;
            outline: none;
            transition: border 0.2s;
        }
        input:focus, textarea:focus { border-color: #3b82f6; }
        textarea { resize: vertical; line-height: 1.6; }
        .photo-preview { width: 80px; height: 80px; border-radius: 12px; object-fit: cover; border: 1px solid #2d3148; }
        .photo-placeholder { width: 80px; height: 80px; border-radius: 12px; background: #1a1d27; border: 1px dashed #2d3148; display: flex; align-items: center; justify-content: center; font-size: 28px; }
        .file-input { font-size: 13px; color: #cbd5e1; }
        .file-hint { font-size: 12px; color: #64748b; margin-top: 6px; }
        .actions { display: flex; justify-content: flex-end; gap: 8px; margin-top: 0.5rem; }
        .btn-cancel { background: transparent; color: #94a3b8; border: 1px solid #2d3148; padding: 10px 18px; border-radius: 10px; font-size: 14px; cursor: pointer; text-decoration: none; }
        .btn-save { background: #2563eb; color: #fff; border: none; padding: 10px 22px; border-radius: 10px; font-size: 14px; font-weight: 500; cursor: pointer; }
        .btn-save:hover { background: #1d4ed8; }
        .alert-success { background: #052e16; color: #4ade80; border: 1px solid #166534; padding: 12px 16px; border-radius: 10px; margin-bottom: 1rem; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">

        <div class="topbar">
            <div class="topbar-icon">👤</div>
            <div>
                <h1>Editar perfil</h1>
                <p>Panel de administración</p>
            </div>
            <a href="{{ url('/') }}" class="view-link">↗ Ver portafolio</a>
        </div>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <p class="section-label">Foto de perfil</p>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    @if($profile->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}" class="photo-preview">
                    @else
                        <div class="photo-placeholder">📷</div>
                    @endif
                    <div>
                        <input type="file" name="photo" accept="image/*" class="file-input">
                        <p class="file-hint">JPG, PNG — máx. 2MB</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <p class="section-label">Información personal</p>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" value="{{ $profile->name }}">
                    </div>
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="title" value="{{ $profile->title }}">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="phone" value="{{ $profile->phone }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $profile->email }}">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="address" value="{{ $profile->address }}">
                    </div>
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" name="birth_date" value="{{ $profile->birth_date }}">
                    </div>
                </div>
            </div>

            <div class="card">
                <p class="section-label">Sobre mí</p>
                <textarea name="about" rows="5">{{ $profile->about }}</textarea>
            </div>

            <div class="actions">
                <a href="{{ url('/') }}" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-save">✓ Guardar cambios</button>
            </div>

        </form>
    </div>
</body>
</html>