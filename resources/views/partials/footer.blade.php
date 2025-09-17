<footer class="bg-green-800 text-white mt-12 py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Econ Fresh</h3>
                <p class="text-green-200">Fresh produce delivered to your doorstep.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}" class="text-green-200 hover:text-white">Home</a></li>
                    <li><a href="{{ route('products.catalog') }}" class="text-green-200 hover:text-white">Products</a></li>
                    <li><a href="#" class="text-green-200 hover:text-white">About Us</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <p class="text-green-200">Email: info@econfresh.test</p>
                <p class="text-green-200">Phone: (123) 456-7890</p>
            </div>
        </div>
        
        <div class="border-t border-green-700 mt-8 pt-6 text-center">
            <p>&copy; {{ date('Y') }} Econ Fresh. All rights reserved.</p>
        </div>
    </div>
</footer>