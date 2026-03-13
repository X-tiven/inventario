@extends('layouts.app')
@section('content')

@include('productos.flotantes.header')

@if(session('success'))
    <div class="mx-8 mt-5 px-4 py-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm rounded-lg">
        {{ session('success') }}
    </div>
@endif

<main class="max-w-7xl mx-auto px-8 py-8">

    <p class="text-xs font-medium tracking-widest uppercase text-stone-400 mb-5">
        {{ $productos->count() }} {{ $productos->count() == 1 ? 'producto' : 'productos' }}
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @forelse($productos as $producto)
            <div class="bg-white border border-stone-200 rounded-xl overflow-hidden cursor-pointer
                        hover:-translate-y-1 hover:shadow-md transition-all duration-200"
                 onclick="abrirDetalle({{ $producto->id }})">

                @if($producto->imagen)
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                         class="w-full h-44 object-contain block"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-44 bg-amber-50 hidden items-center justify-center text-3xl text-amber-400">☕</div>
                @else
                    <div class="w-full h-44 bg-amber-50 flex items-center justify-center text-3xl text-amber-400">☕</div>
                @endif

                <div class="p-4">
                    <p class="font-display font-medium text-base truncate mb-1">{{ $producto->nombre }}</p>
                    <p class="text-amber-600 font-semibold text-sm mb-3">
                        ${{ number_format($producto->precio, 0, ',', '.') }}
                    </p>
                    <div class="pt-3 border-t border-stone-100 flex justify-end">
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar este producto?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="text-xs text-red-500 border border-red-200 px-3 py-1 rounded-md hover:bg-red-50 transition-colors"
                                    onclick="event.stopPropagation()">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 text-stone-400">
                <p class="font-display text-lg text-stone-600 mb-1">No hay productos aún</p>
                Agrega el primero con el botón de arriba.
            </div>
        @endforelse
    </div>
    @if($productos->hasPages())
    <div class="mt-8 flex justify-center">
        {{ $productos->links() }}
    </div>
@endif
</main>

@include('productos.flotantes.detalle')
@include('productos.flotantes.crear')

<script>
    const productos = @json($productos);

    function abrirDetalle(id) {
        const p = productos.find(x => x.id === id);
        if (!p) return;

        document.getElementById('detalleNombre').textContent = p.nombre;
        document.getElementById('detallePrecio').textContent = '$' + Number(p.precio).toLocaleString('es-CO');
        document.getElementById('detalleDesc').textContent = p.descripcion || 'Sin descripción.';

        const img = document.getElementById('detalleImg');
        const ph  = document.getElementById('detallePlaceholder');

        if (p.imagen) {
            img.src = '/storage/' + p.imagen;
            img.classList.remove('hidden');
            ph.classList.add('hidden');
            img.onerror = () => { img.classList.add('hidden'); ph.classList.remove('hidden'); };
        } else {
            img.classList.add('hidden');
            ph.classList.remove('hidden');
        }

        abrirOverlay('overlayDetalle');
    }

    function previsualizarImagen(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewImagen');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        } else {
            preview.classList.add('hidden');
        }
    }

    function abrirCrear() { abrirOverlay('overlayCrear'); }

    function abrirOverlay(id) {
        const el = document.getElementById(id);
        el.classList.remove('opacity-0', 'pointer-events-none');
        el.classList.add('opacity-100');
        el.querySelector('div').classList.remove('translate-y-4', 'scale-[0.98]');
        document.body.style.overflow = 'hidden';
    }

    function cerrarModal(id) {
        const el = document.getElementById(id);
        el.classList.add('opacity-0', 'pointer-events-none');
        el.classList.remove('opacity-100');
        el.querySelector('div').classList.add('translate-y-4', 'scale-[0.98]');
        document.body.style.overflow = '';
    }

    function cerrarDetalle(e) { if (e.target.id === 'overlayDetalle') cerrarModal('overlayDetalle'); }
    function cerrarCrear(e)   { if (e.target.id === 'overlayCrear')   cerrarModal('overlayCrear'); }

    @if($errors->any())
        document.addEventListener('DOMContentLoaded', () => abrirCrear());
    @endif

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            cerrarModal('overlayDetalle');
            cerrarModal('overlayCrear');
        }
    });
</script>

@endsection