<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact.index', compact('messages'));
    }

    public function store(Request $request)
    {
        ContactMessage::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'read'    => false,
        ]);

        return redirect()->route('contact')->with('success', '¡Mensaje enviado correctamente!');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact.index')->with('success', '¡Mensaje eliminado!');
    }

    public function markRead(ContactMessage $contactMessage)
    {
        $contactMessage->update(['read' => true]);
        return redirect()->route('admin.contact.index')->with('success', '¡Marcado como leído!');
    }
}