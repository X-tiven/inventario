<div id="overlayDetalle"
     class="fixed inset-0 z-50 flex items-center justify-center bg-stone-900/50 backdrop-blur-sm
            opacity-0 pointer-events-none transition-opacity duration-200"
     onclick="cerrarDetalle(event)">

    <div class="bg-white rounded-2xl w-[90%] max-w-lg max-h-[88vh] overflow-y-auto border border-stone-200
                translate-y-4 scale-[0.98] transition-transform duration-200" id="modalDetalle">

        <div class="relative">
            <img id="detalleImg" src="" alt=""
                 class="w-full h-64 object-cover rounded-t-2xl hidden">
            <div id="detallePlaceholder"
                 class="w-full h-48 bg-amber-50 flex items-center justify-center text-5xl text-amber-300 rounded-t-2xl">
                ☕
            </div>
            <button onclick="cerrarModal('overlayDetalle')"
                    class="absolute top-3 right-3 w-8 h-8 bg-white/90 rounded-full flex items-center justify-center
                           text-stone-500 hover:text-stone-900 hover:bg-white transition-colors text-sm border border-stone-200">
                ✕
            </button>
        </div>

        <div class="p-6">
            <div class="flex items-start justify-between gap-4 mb-3">
                <h2 id="detalleNombre" class="font-display font-medium text-2xl leading-tight tracking-tight"></h2>
                <span id="detallePrecio" class="text-amber-600 font-bold text-xl whitespace-nowrap"></span>
            </div>
            <p id="detalleDesc" class="text-stone-500 text-sm leading-relaxed mb-6"></p>
            <div class="flex justify-end pt-4 border-t border-stone-100">
                <button onclick="cerrarModal('overlayDetalle')"
                        class="text-sm text-stone-500 border border-stone-200 px-4 py-2 rounded-lg hover:bg-stone-50 transition-colors">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>