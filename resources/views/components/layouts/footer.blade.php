<footer class="w-full bg-white border-t border-gray-200 relative">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Logo & Text -->
        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ Vite::asset('resources/images/gluco.png') }}" 
                     alt="GlucoMeal Logo"
                     class="w-20">
                <h2 class="text-2xl font-bold text-red-600">GlucoMeal</h2>
            </div>
            <p class="text-lg font-medium leading-relaxed">
                Bebaskan gula darah mu <br> 
                dengan <span class="text-red-500 font-semibold">GlucoMeal</span>
            </p>
            <!-- Social -->
            <div class="flex items-center gap-4 mt-4">
                <img src="{{ Vite::asset('resources/images/footer/ig.png') }}" class="w-7" alt="ig" width="10" height="10">
                <img src="{{ Vite::asset('resources/images/footer/twitter.png') }}" class="w-7" alt="x">
            </div>
        </div>
        <!-- Quick Links -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2 text-gray-700 font-medium">
                <li><a href="/" class="hover:text-red-600">Home</a></li>
                <li><a href="/about" class="hover:text-red-600">About</a></li>
                <li><a href="#" class="hover:text-red-600">Our Services</a></li>
                <li><a href="#" class="hover:text-red-600">Contact Us</a></li>
            </ul>
        </div>
        <!-- Services -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Our Services</h3>
            <ul class="space-y-2 text-gray-700 font-medium">
                <li>Monitoring</li>
                <li>Healthy Diet</li>
                <li>Consultation</li>
                <li>Healthy Food Recommendations</li>
            </ul>
        </div>
    </div>
    <!-- Bottom Copyright -->
    <div class="w-full border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-4 flex items-center justify-center gap-2 text-gray-800 font-medium">
            <span class="text-lg">©</span> 2025 <span class="font-semibold text-red-600">GlucoMeal</span>
        </div>
    </div>
    <!-- Gambar makanan kanan bawah -->
    <img src="{{ Vite::asset('resources/images/leadingpage/footer.png') }}"
         alt="Healthy Food"
         class="hidden md:block absolute right-8 bottom-25 w-50 h-50 object-cover">
</footer>
