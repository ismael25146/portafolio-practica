@extends('layouts.main')
@section('content')
<div>
    <div class="lg:rounded-2xl bg-white dark:bg-[#111111]">
        <div class="pt-12 md:py-12 px-2 sm:px-5 md:px-10 lg:px-14">
            <h2 class="after-effect after:left-52 mb-8">Contacto</h2>

            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 px-4 py-3 rounded-lg mb-6">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-[#44566C] dark:text-[#A6A6A6] mb-1">Nombre</label>
                        <input type="text" name="name" required
                            class="w-full border border-[#E3E3E3] dark:border-[#3D3A3A] bg-white dark:bg-[#1D1D1D] text-[#44566C] dark:text-white rounded-lg px-4 py-2.5 outline-none focus:border-[#FA5252]">
                    </div>
                    <div>
                        <label class="block text-sm text-[#44566C] dark:text-[#A6A6A6] mb-1">Email</label>
                        <input type="email" name="email" required
                            class="w-full border border-[#E3E3E3] dark:border-[#3D3A3A] bg-white dark:bg-[#1D1D1D] text-[#44566C] dark:text-white rounded-lg px-4 py-2.5 outline-none focus:border-[#FA5252]">
                    </div>
                </div>
                <div>
                    <label class="block text-sm text-[#44566C] dark:text-[#A6A6A6] mb-1">Asunto</label>
                    <input type="text" name="subject" required
                        class="w-full border border-[#E3E3E3] dark:border-[#3D3A3A] bg-white dark:bg-[#1D1D1D] text-[#44566C] dark:text-white rounded-lg px-4 py-2.5 outline-none focus:border-[#FA5252]">
                </div>
                <div>
                    <label class="block text-sm text-[#44566C] dark:text-[#A6A6A6] mb-1">Mensaje</label>
                    <textarea name="message" rows="5" required
                        class="w-full border border-[#E3E3E3] dark:border-[#3D3A3A] bg-white dark:bg-[#1D1D1D] text-[#44566C] dark:text-white rounded-lg px-4 py-2.5 outline-none focus:border-[#FA5252] resize-none"></textarea>
                </div>
                <button type="submit"
                    class="flex items-center gap-2 bg-[#F95054] text-white px-6 py-3 rounded-lg font-medium hover:bg-[#e04449] transition">
                    Enviar mensaje
                </button>
            </form>
        </div>

        <footer class="overflow-hidden rounded-b-2xl" style="background: transparent">
            <p class="text-center py-6 text-gray-lite dark:text-color-910">© 2026 Todos los derechos reservados
                by <a class="hover:text-[#FA5252] duration-300 transition" href="#">{{ $profile->name }}</a>.
            </p>
        </footer>
    </div>
</div>
@endsection