<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #0f1117; font-family: 'Segoe UI', sans-serif; min-height: 100vh; padding: 2rem 3rem; color: #e2e8f0; }
        .container { max-width: 900px; margin: 0 auto; }
        .topbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; }
        .topbar h1 { font-size: 22px; font-weight: 700; color: #f1f5f9; }
        .topbar p { font-size: 13px; color: #64748b; margin-top: 4px; }
        .view-link { font-size: 13px; color: #60a5fa; text-decoration: none; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .card { background: #1a1d27; border: 1px solid #2d3148; border-radius: 16px; padding: 1.5rem; text-decoration: none; display: flex; align-items: center; gap: 1rem; transition: border-color 0.2s; }
        .card:hover { border-color: #3b82f6; }
        .card-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0; }
        .card-title { font-size: 15px; font-weight: 600; color: #f1f5f9; margin-bottom: 3px; }
        .card-desc { font-size: 12px; color: #64748b; }
        .blue { background: #1e3a5f; }
        .purple { background: #2d1f4e; }
        .green { background: #052e16; }
        .orange { background: #3d1f00; }
        .red { background: #3d0f0f; }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div>
                <h1>⚙️ Panel de Administración</h1>
                <p>Gestiona el contenido de tu portafolio</p>
            </div>
            <a href="{{ url('/') }}" class="view-link">↗ Ver portafolio</a>
        </div>

        <div class="grid">
            <a href="{{ route('admin.profile.edit') }}" class="card">
                <div class="card-icon blue">👤</div>
                <div>
                    <p class="card-title">Perfil</p>
                    <p class="card-desc">Edita tu información personal y foto</p>
                </div>
            </a>

            <a href="{{ route('admin.projects.index') }}" class="card">
                <div class="card-icon purple">📁</div>
                <div>
                    <p class="card-title">Proyectos</p>
                    <p class="card-desc">Crea, edita y elimina proyectos</p>
                </div>
            </a>

            <a href="{{ route('admin.skills.index') }}" class="card">
                <div class="card-icon green">⚡</div>
                <div>
                    <p class="card-title">Habilidades</p>
                    <p class="card-desc">Administra tus habilidades y niveles</p>
                </div>
            </a>

            <a href="{{ route('admin.experiences.index') }}" class="card">
                <div class="card-icon orange">💼</div>
                <div>
                    <p class="card-title">Experiencia laboral</p>
                    <p class="card-desc">Gestiona tu historial de trabajo</p>
                </div>
            </a>

            <a href="{{ route('admin.contact.index') }}" class="card">
                <div class="card-icon red">✉️</div>
                <div>
                    <p class="card-title">Mensajes de contacto</p>
                    <p class="card-desc">Revisa los mensajes recibidos</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>