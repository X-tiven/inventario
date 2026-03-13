<div id="overlayCrear"
     class="fixed inset-0 z-50 flex items-center justify-center bg-stone-900/50 backdrop-blur-sm
            opacity-0 pointer-events-none transition-opacity duration-200"
     onclick="cerrarCrear(event)">

    <div class="bg-white rounded-2xl w-[90%] max-w-md border border-stone-200
                translate-y-4 scale-[0.98] transition-transform duration-200">
        <div class="p-6">
            <h2 class="font-display font-medium text-xl mb-5">Nuevo producto</h2>

            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="block text-xs font-medium text-stone-400 uppercase tracking-wide mb-1">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                               placeholder="Ej: Camiseta azul" required
                               class="w-full text-sm px-3 py-2 border border-stone-200 rounded-lg bg-stone-50
                                      focus:outline-none focus:border-amber-400 focus:bg-white transition-colors">
                        @error('nombre')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-stone-400 uppercase tracking-wide mb-1">Precio</label>
                        <input type="number" name="precio" value="{{ old('precio') }}"
                               placeholder="0" min="0" step="0.01" required
                               class="w-full text-sm px-3 py-2 border border-stone-200 rounded-lg bg-stone-50
                                      focus:outline-none focus:border-amber-400 focus:bg-white transition-colors">
                        @error('precio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="block text-xs font-medium text-stone-400 uppercase tracking-wide mb-1">Descripción</label>
                    <textarea name="descripcion" rows="3" placeholder="Describe tu producto..."
                              class="w-full text-sm px-3 py-2 border border-stone-200 rounded-lg bg-stone-50
                                     focus:outline-none focus:border-amber-400 focus:bg-white transition-colors resize-none">{{ old('descripcion') }}</textarea>
                </div>

                <div class="mb-5">
                    <label class="block text-xs font-medium text-stone-400 uppercase tracking-wide mb-1">Imagen</label>
                    <input type="file" name="imagen" accept="image/*" id="inputImagen"
                           onchange="previsualizarImagen(event)"
                           class="w-full text-sm px-3 py-2 border border-stone-200 rounded-lg bg-stone-50
                                  focus:outline-none focus:border-amber-400 focus:bg-white transition-colors
                                  file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0
                                  file:bg-stone-900 file:text-white file:text-xs file:cursor-pointer">
                    <img id="previewImagen" src="" alt="Preview"
                         class="mt-3 w-full h-36 object-cover rounded-lg hidden">
                    @error('imagen')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2 pt-4 border-t border-stone-100">
                    <button type="button" onclick="cerrarModal('overlayCrear')"
                            class="text-sm text-stone-500 border border-stone-200 px-4 py-2 rounded-lg hover:bg-stone-50 transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                            class="text-sm bg-stone-900 text-white px-5 py-2 rounded-lg hover:bg-stone-700 transition-colors font-medium">
                        Publicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>