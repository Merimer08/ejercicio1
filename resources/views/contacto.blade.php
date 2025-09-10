<x-layouts.layout>
    <div class="container mx-auto p-6">
        <!-- Formulario y Mapa -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Formulario -->
            <div class="w-full md:w-1/2 bg-white p-6 shadow-md rounded-lg">
                
                <h2 class="mb-5 text-3xl font-bold justify-center card-title">Formulario de Contacto</h2>

                <!-- Formulario de contacto -->
                <form>
                    <div class="mb-4">
                        <label for="name" class="label">
                            <span class="label-text">Nombre</span>
                        </label>
                        <input type="text" name="name" id="name" class="input input-bordered w-full border-orange-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" id="email" class="input input-bordered w-full border-orange-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="telefono" class="label">
                            <span class="label-text">Teléfono</span>
                        </label>
                        <input type="text" name="telefono" id="telefono" class="input input-bordered w-full border-orange-500">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="label">
                            <span class="label-text">Descripción</span>
                        </label>
                        <textarea name="descripcion" id="descripcion" rows="4" class="textarea textarea-bordered w-full border-orange-500" required></textarea>
                    </div>

                    <button type="submit" class="btn btn bg-orange-500 w-full">Enviar</button>
                </form>
            </div>

            <!-- Mapa -->
            <div class="w-full md:w-1/2 space-y-4">
                <!-- Mapa de Google -->
                <iframe 
                    width="100%" 
                    height="100%" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1553.762580409418!2d-0.8822532!3d41.6522186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5914eea4ae2911%3A0xe01bad96185eb13!2sPlaza%20Espa%C3%B1a%2C%20Casco%20Antiguo%2C%20Zaragoza!5e0!3m2!1ses!2ses!4v1634286745737!5m2!1ses!2ses" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>

        <!-- Información de contacto -->
        <div class="mt-8 bg-orange-100 p-6 rounded-lg shadow-md md:w-2/3 mx-auto text-center">
            <h3 class="text-2xl font-semibold text-gray-700 mb-4">Información de Contacto</h3>
            <div class="space-y-4 text-lg">
                <p class="text-sm">Maria Lopez</p>
                <p class="text-sm">Dirección: Calle Ficticia, 123, 3er Piso</p>
                <p class="text-sm">Teléfono: +34 123 456 789</p>
                <p class="text-sm">Email: maria@example.com</p>
            </div>
        </div>
    </div>
</x-layouts.layout>