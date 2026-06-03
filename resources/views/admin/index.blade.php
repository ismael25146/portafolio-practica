<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes — Admin</title>
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
        .msg-unread { border-left: 3px solid #2563eb; }
        .msg-read { border-left: 3px solid #2d3148; opacity: 0.7; }
        .msg-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
        .msg-name { font-size: 15px; font-weight: 600; color: #f1f5f9; }
        .msg-email { font-size: 13px; color: #60a5fa; margin-left: 8px; }
        .msg-date { font-size: 12px; color: #475569; }
        .msg-subject { font-size: 13px; color: #94a3b8; margin-bottom: 6px; }
        .msg-subject span { color: #cbd5e1; font-weight: 500; }
        .msg-body { font-size: 14px; color: #94a3b8; line-height: 1.6; }
        .msg-actions { display: flex; gap: 8px; margin-top: 12px; justify-content: flex-end; }
        .btn-read { background: transparent; color: #4ade80; border: 1px solid #166534; padding: 6px 14px; border-radius: 6px; font-size: 12px; cursor: pointer; }
        .btn-delete { background: transparent; color: #f87171; border: 1px solid #2d3148; padding: 6px 14px; border-radius: 6px; font-size: 12px; cursor: pointer; }
        .badge-unread { background: #1e3a5f; color: #60a5fa; font-size: 11px; padding: 2px 8px; border-radius: 20px; margin-left: 8px; }
        .badge-read { background: #1a1d27; color: #475569; font-size: 11px; padding: 2px 8px; border-radius: 20px; margin-left: 8px; }
        .empty { text-align: center; color: #475569; padding: 3rem; font-size: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div>
                <h1>✉️ Mensajes de contacto</h1>
                <p>Panel de administración</p>
            </div>
            <a href="{{ url('/') }}" class="view-link">↗ Ver portafolio</a>
        </div>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        @forelse($messages as $msg)
            <div class="card {{ $msg->read ? 'msg-read' : 'msg-unread' }}">
                <div class="msg-header">
                    <div>
                        <span class="msg-name">{{ $msg->name }}</span>
                        <span class="msg-email">{{ $msg->email }}</span>
                        @if($msg->read)
                            <span class="badge-read">Leído</span>
                        @else
                            <span class="badge-unread">Nuevo</span>
                        @endif
                    </div>
                    <span class="msg-date">{{ $msg->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <p class="msg-subject">Asunto: <span>{{ $msg->subject }}</span></p>
                <p class="msg-body">{{ $msg->message }}</p>
                <div class="msg-actions">
                    @if(!$msg->read)
                        <form action="{{ route('admin.contact.read', $msg) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-read">✓ Marcar leído</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.contact.destroy', $msg) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Eliminar este mensaje?')">Eliminar</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty">No hay mensajes aún.</div>
        @endforelse
    </div>
</body>
</html>