<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <div class="flex items-center mb-6">
                        <a href="{{ route('admin.products') }}" class="mr-4 text-gray-500 hover:text-black transition-colors">
                            <i class="fa-solid fa-arrow-left text-xl"></i>
                        </a>
                        <h2 class="text-2xl font-black uppercase tracking-tight">Edit Product: <span class="text-red-600">{{ $product->name }}</span></h2>
                    </div>

                    <form action="{{ route('admin.products.update', $product) }}" method="POST" class="max-w-2xl bg-gray-50 p-8 rounded-xl border border-gray-100 shadow-inner">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-all font-semibold" required>
                                @error('name') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>

                            <div class="col-span-2">
                                <label for="description" class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider">Description</label>
                                <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-all" required>{{ old('description', $product->description) }}</textarea>
                                @error('description') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider">Price ($)</label>
                                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-all font-black text-lg" required>
                                @error('price') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="stock" class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider">Stock Quantity</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-all" required>
                                @error('stock') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider">Category</label>
                                <select name="category" id="category" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-all font-semibold">
                                    <option value="">Select Category</option>
                                    <option value="Running" {{ old('category', $product->category) == 'Running' ? 'selected' : '' }}>Running</option>
                                    <option value="Basketball" {{ old('category', $product->category) == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                                    <option value="Training" {{ old('category', $product->category) == 'Training' ? 'selected' : '' }}>Training</option>
                                    <option value="Lifestyle" {{ old('category', $product->category) == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                                    <option value="Kids" {{ old('category', $product->category) == 'Kids' ? 'selected' : '' }}>Kids</option>
                                </select>
                                @error('category') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="image_url" class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider">Image URL</label>
                                <input type="text" name="image_url" id="image_url" value="{{ old('image_url', $product->image_url) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-all" placeholder="https://example.com/image.jpg">
                                @error('image_url') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ route('admin.products') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-bold rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition-all">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-black rounded-md shadow-lg text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-all transform hover:-translate-y-1 active:translate-y-0 uppercase tracking-widest">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
