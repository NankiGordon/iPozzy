<x-app-layout>
    <h1 class="mb-4">Create Your Profile</h1>
    <div class="container p-5">
        <div class="card shadow-lg p-4">


            <form action="{{ route('user-profiles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- User ID (hidden) -->
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <!-- First Name -->
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number (optional)</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control">
                </div>

                <!-- Address Line 1 -->
                <div class="mb-3">
                    <label for="address_line_1" class="form-label">Address Line 1</label>
                    <input type="text" name="address_line_1" id="address_line_1" class="form-control" required>
                </div>

                <!-- Address Line 2 -->
                <div class="mb-3">
                    <label for="address_line_2" class="form-label">Address Line 2 (optional)</label>
                    <input type="text" name="address_line_2" id="address_line_2" class="form-control">
                </div>

                <!-- Town -->
                <div class="mb-3">
                    <label for="town" class="form-label">Town (optional)</label>
                    <input type="text" name="town" id="town" class="form-control">
                </div>

                <!-- City -->
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>

                <!-- Postal Code -->
                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                </div>

                <!-- Province -->
                <div class="mb-3">
                    <label for="province" class="form-label">Property Province</label>
                    <div class="input-group">
                        <select name="province" id="province" class="form-select" required>
                            <option value="" disabled selected>Select a Province</option>
                            <option value="Eastern Cape">Eastern Cape</option>
                            <option value="Free State">Free State</option>
                            <option value="Gauteng">Gauteng</option>
                            <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                            <option value="Limpopo">Limpopo</option>
                            <option value="Mpumalanga">Mpumalanga</option>
                            <option value="North West">North West</option>
                            <option value="Northern Cape">Northern Cape</option>
                            <option value="Western Cape">Western Cape</option>
                        </select>

                    </div>
                </div>


                <!-- Bio -->
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio (optional)</label>
                    <textarea name="bio" id="bio" class="form-control" rows="4"></textarea>
                </div>

                <!-- Profile Picture -->
                <div class="mb-3">
                    <label for="profile_pic" class="form-label">Profile Picture (optional)</label>
                    <input type="file" name="profile_pic" id="profile_pic" class="form-control">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Profile</button>
            </form>
        </div>
    </div>
</x-app-layout>
