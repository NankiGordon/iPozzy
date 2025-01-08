<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h1 class="mb-4">Edit Your Profile</h1>
            <form action="{{ route('user-profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- User ID (hidden) -->
                <input type="hidden" name="user_id" value="{{ $profile->id }}">

                <!-- First Name -->
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                        value="{{ old('first_name', $profile->first_name) }}" required>
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                        value="{{ old('last_name', $profile->last_name) }}" required>
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number (optional)</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                        value="{{ old('phone_number', $profile->phone_number) }}">
                </div>

                <!-- Address Line 1 -->
                <div class="mb-3">
                    <label for="address_line_1" class="form-label">Address Line 1</label>
                    <input type="text" name="address_line_1" id="address_line_1" class="form-control"
                        value="{{ old('address_line_1', $profile->address_line_1) }}" required>
                </div>

                <!-- Address Line 2 -->
                <div class="mb-3">
                    <label for="address_line_2" class="form-label">Address Line 2 (optional)</label>
                    <input type="text" name="address_line_2" id="address_line_2" class="form-control"
                        value="{{ old('address_line_2', $profile->address_line_2) }}">
                </div>

                <!-- Town -->
                <div class="mb-3">
                    <label for="town" class="form-label">Town (optional)</label>
                    <input type="text" name="town" id="town" class="form-control"
                        value="{{ old('town', $profile->town) }}">
                </div>

                <!-- City -->
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" id="city" class="form-control"
                        value="{{ old('city', $profile->city) }}" required>
                </div>

                <!-- Postal Code -->
                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code" class="form-control"
                        value="{{ old('postal_code', $profile->postal_code) }}" required>
                </div>

                <!-- Province -->
                <div class="mb-3">
                    <label for="province" class="form-label">Property Province</label>
                    <div class="input-group">
                        <select name="province" id="province" class="form-select" required>
                            <option value="" disabled>Select a Province</option>
                            <option value="Eastern Cape"
                                {{ old('province', $profile->province) == 'Eastern Cape' ? 'selected' : '' }}>Eastern
                                Cape</option>
                            <option value="Free State"
                                {{ old('province', $profile->province) == 'Free State' ? 'selected' : '' }}>Free State
                            </option>
                            <option value="Gauteng"
                                {{ old('province', $profile->province) == 'Gauteng' ? 'selected' : '' }}>Gauteng
                            </option>
                            <option value="KwaZulu-Natal"
                                {{ old('province', $profile->province) == 'KwaZulu-Natal' ? 'selected' : '' }}>
                                KwaZulu-Natal</option>
                            <option value="Limpopo"
                                {{ old('province', $profile->province) == 'Limpopo' ? 'selected' : '' }}>Limpopo
                            </option>
                            <option value="Mpumalanga"
                                {{ old('province', $profile->province) == 'Mpumalanga' ? 'selected' : '' }}>Mpumalanga
                            </option>
                            <option value="North West"
                                {{ old('province', $profile->province) == 'North West' ? 'selected' : '' }}>North West
                            </option>
                            <option value="Northern Cape"
                                {{ old('province', $profile->province) == 'Northern Cape' ? 'selected' : '' }}>Northern
                                Cape</option>
                            <option value="Western Cape"
                                {{ old('province', $profile->province) == 'Western Cape' ? 'selected' : '' }}>Western
                                Cape</option>
                        </select>
                    </div>
                </div>

                <!-- Bio -->
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio (optional)</label>
                    <textarea name="bio" id="bio" class="form-control" rows="4">{{ old('bio', $profile->bio) }}</textarea>
                </div>

                <!-- Profile Picture -->
                <div class="mb-3">
                    <label for="profile_pic" class="form-label">Profile Picture (optional)</label>
                    <input type="file" name="profile_pic" id="profile_pic" class="form-control">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-outline-primary">Update Profile</button>
            </form>



        </div>
    </div>
</x-app-layout>
