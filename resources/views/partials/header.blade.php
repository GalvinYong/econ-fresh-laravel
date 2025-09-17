<header class="bg-green-600 text-white shadow-lg">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold hover:text-green-200 transition-colors">
                Econ Fresh
            </a>
            
            <div class="space-x-6">
                <a href="{{ url('/') }}" class="hover:text-green-200 transition-colors {{ request()->is('/') ? 'font-bold underline' : '' }}">
                    Home
                </a>
                <a href="{{ route('products.catalog') }}" class="hover:text-green-200 transition-colors {{ request()->is('products') ? 'font-bold underline' : '' }}">
                    Products
                </a>
                <a href="{{ url('/admin/products') }}" class="hover:text-green-200 transition-colors {{ request()->is('admin*') ? 'font-bold underline' : '' }}">
                    Admin
                </a>
            </div>
        </div>
    </nav>
</header>