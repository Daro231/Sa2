<nav class="hidden md:flex space-x-8 px-8">
    <a href="#" class="text-gray-500 hover:text-gray-900 hover:border-b-2 hover:border-gray-300 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors">Men</a>
    <a href="#" class="text-gray-500 hover:text-gray-900 hover:border-b-2 hover:border-gray-300 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors">Women</a>
    <a href="{{ route('kids.index') }}" class="{{ request()->routeIs('kids.index') ? 'text-gray-900 border-b-2 border-black' : 'text-gray-500 hover:text-gray-900 hover:border-b-2 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors">Kids</a>
    <a href="#" class="text-gray-500 hover:text-gray-900 hover:border-b-2 hover:border-gray-300 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors">Sports</a>
    <a href="{{ route('brands.index') }}" class="{{ request()->routeIs('brands.index') ? 'text-gray-900 border-b-2 border-black' : 'text-gray-500 hover:text-gray-900 hover:border-b-2 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors">Brands</a>
    <a href="#" class="text-red-600 font-bold hover:border-b-2 hover:border-red-600 inline-flex items-center px-1 pt-1 text-sm transition-colors">Sale</a>
</nav>
