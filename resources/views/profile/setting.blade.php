@extends('layouts.app')

@section('title', 'Account Settings')

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
            <h1 class="text-2xl font-bold text-white">Account Settings</h1>
            <p class="text-blue-100">Manage your account preferences</p>
        </div>

        <div class="p-6 space-y-8">
            <!-- Change Password -->
            <div>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Change Password</h2>
                <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                        <input type="password" name="current_password" id="current_password" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('current_password') border-red-500 @enderror"
                               required>
                        @error('current_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <input type="password" name="new_password" id="new_password" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('new_password') border-red-500 @enderror"
                               required>
                        @error('new_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               required>
                    </div>

                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        Update Password
                    </button>
                </form>
            </div>

            <!-- Notification Settings -->
            <div class="pt-8 border-t">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Notification Preferences</h2>
                <form action="{{ route('profile.settings.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox" name="email_notifications" value="1" 
                                   {{ $user->email_notifications ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-3 text-gray-700">Email notifications for order updates</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="sms_notifications" value="1" 
                                   {{ $user->sms_notifications ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-3 text-gray-700">SMS notifications for delivery updates</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="marketing_emails" value="1" 
                                   {{ $user->marketing_emails ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-3 text-gray-700">Receive marketing emails and promotions</span>
                        </label>
                    </div>

                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        Save Preferences
                    </button>
                </form>
            </div>

            <!-- Danger Zone -->
            <div class="pt-8 border-t">
                <h2 class="text-lg font-semibold text-red-600 mb-4">Danger Zone</h2>
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-red-800">Delete Account</h3>
                            <p class="text-sm text-red-600">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                        <button onclick="openDeleteModal()" 
                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                            Delete Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="text-center">
            <div class="text-5xl text-red-500 mb-4">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-4">Delete Account</h3>
            <p class="text-sm text-gray-500 mb-4">
                This action cannot be undone. This will permanently delete your account and remove all your data.
            </p>
            
            <form action="{{ route('profile.destroy') }}" method="POST" class="space-y-4">
                @csrf
                @method('DELETE')
                
                <div>
                    <input type="password" name="password" placeholder="Enter your password to confirm" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500"
                           required>
                </div>

                <div class="flex items-center justify-center space-x-3">
                    <button type="button" onclick="closeDeleteModal()" 
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-200">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                        Yes, delete my account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('deleteModal');
    if (event.target == modal) {
        modal.classList.add('hidden');
    }
}
</script>
@endpush
@endsection