@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('profile.show') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Profile
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-8">
            <h1 class="text-2xl font-bold text-white">Edit Profile</h1>
            <p class="text-blue-100">Update your personal information</p>
        </div>

        <!-- Edit Form -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <!-- Avatar Upload -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-4">Profile Picture</label>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->username }}" class="w-full h-full object-cover" id="avatar-preview">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-blue-500 text-white text-3xl font-bold" id="avatar-placeholder">
                                    {{ strtoupper(substr($user->username, 0, 1)) }}
                                </div>
                                <img src="" alt="Preview" class="w-full h-full object-cover hidden" id="avatar-preview-img">
                            @endif
                        </div>
                        <label for="avatar" class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-lg cursor-pointer hover:bg-gray-100">
                            <i class="fas fa-camera text-gray-600"></i>
                        </label>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden" onchange="previewAvatar(this)">
                        <p class="text-sm text-gray-500">Upload a new avatar. JPG, PNG or GIF. Max 2MB.</p>
                        @error('avatar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Basic Information -->
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username *</label>
                    <input type="text" name="username" id="username" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('username') border-red-500 @enderror"
                           value="{{ old('username', $user->username) }}" required>
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                    <input type="email" name="email" id="email" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="full_name" id="full_name" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('full_name', $user->full_name) }}">
                </div>

                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '') }}">
                </div>

                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" name="phone_number" id="phone_number" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('phone_number', $user->phone_number) }}"
                           placeholder="+1 234 567 8900">
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                    <textarea name="bio" id="bio" rows="3" 
                              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Tell us about yourself">{{ old('bio', $user->bio) }}</textarea>
                </div>
            </div>

            <!-- Address Information -->
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Address Information</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                    <input type="text" name="address" id="address" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('address', $user->address) }}"
                           placeholder="123 Main St">
                </div>

                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                    <input type="text" name="city" id="city" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('city', $user->city) }}">
                </div>

                <div>
                    <label for="zip_code" class="block text-sm font-medium text-gray-700 mb-2">ZIP / Postal Code</label>
                    <input type="text" name="zip_code" id="zip_code" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('zip_code', $user->zip_code) }}">
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                    <select name="country" id="country" 
                            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Country</option>
                        <option value="Cambodia" {{ old('country', $user->country) == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                        <option value="USA" {{ old('country', $user->country) == 'USA' ? 'selected' : '' }}>United States</option>
                        <option value="Canada" {{ old('country', $user->country) == 'Canada' ? 'selected' : '' }}>Canada</option>
                        <option value="UK" {{ old('country', $user->country) == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="Australia" {{ old('country', $user->country) == 'Australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('profile.show') }}" class="px-6 py-2 border rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewAvatar(input) {
    const preview = document.getElementById('avatar-preview-img');
    const placeholder = document.getElementById('avatar-placeholder');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            if (preview) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            if (placeholder) {
                placeholder.classList.add('hidden');
            }
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection