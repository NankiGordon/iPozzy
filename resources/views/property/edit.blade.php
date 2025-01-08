<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">

            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('property.update', $property->id) }}" method="POST"
                        enctype="multipart/form-data" class="p-4 border rounded" id="property-form">
                        @csrf
                        @method('PUT') <!-- Make sure to use the PUT method for updating -->

                        <!-- Property Town -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Property Town</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter property Town" value="{{ old('title', $property->title) }}" required>
                        </div>

                        <!-- Property Province -->
                        <div class="mb-3">
                            <label for="province" class="form-label">Property Province</label>
                            <div class="input-group">
                                <select name="province" id="province" class="form-select" required>
                                    <option value="" disabled>Select a Province</option>
                                    <option value="Eastern Cape"
                                        {{ old('province', $property->province) == 'Eastern Cape' ? 'selected' : '' }}>
                                        Eastern Cape</option>
                                    <option value="Free State"
                                        {{ old('province', $property->province) == 'Free State' ? 'selected' : '' }}>
                                        Free State</option>
                                    <option value="Gauteng"
                                        {{ old('province', $property->province) == 'Gauteng' ? 'selected' : '' }}>
                                        Gauteng</option>
                                    <option value="KwaZulu-Natal"
                                        {{ old('province', $property->province) == 'KwaZulu-Natal' ? 'selected' : '' }}>
                                        KwaZulu-Natal</option>
                                    <option value="Limpopo"
                                        {{ old('province', $property->province) == 'Limpopo' ? 'selected' : '' }}>
                                        Limpopo</option>
                                    <option value="Mpumalanga"
                                        {{ old('province', $property->province) == 'Mpumalanga' ? 'selected' : '' }}>
                                        Mpumalanga</option>
                                    <option value="North West"
                                        {{ old('province', $property->province) == 'North West' ? 'selected' : '' }}>
                                        North West</option>
                                    <option value="Northern Cape"
                                        {{ old('province', $property->province) == 'Northern Cape' ? 'selected' : '' }}>
                                        Northern Cape</option>
                                    <option value="Western Cape"
                                        {{ old('province', $property->province) == 'Western Cape' ? 'selected' : '' }}>
                                        Western Cape</option>
                                </select>
                            </div>
                        </div>

                        <!-- Property Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Describe the property"
                                required>{{ old('description', $property->description) }}</textarea>
                        </div>

                        <!-- Property Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control"
                                placeholder="Enter property price" value="{{ old('price', $property->price) }}"
                                required>
                        </div>

                        <!-- Number of Bedrooms -->
                        <div class="mb-3">
                            <label for="bedrooms" class="form-label">Number of Bedrooms</label>
                            <input type="number" name="bedrooms" id="bedrooms" class="form-control"
                                placeholder="Enter number of bedrooms"
                                value="{{ old('bedrooms', $property->bedrooms) }}" required>
                        </div>

                        <!-- Number of Bathrooms -->
                        <div class="mb-3">
                            <label for="bathrooms" class="form-label">Number of Bathrooms</label>
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control"
                                placeholder="Enter number of bathrooms"
                                value="{{ old('bathrooms', $property->bathrooms) }}" required>
                        </div>

                        <!-- Number of Garage -->
                        <div class="mb-3">
                            <label for="garage" class="form-label">Number of Garage</label>
                            <input type="number" name="garage" id="garage" class="form-control"
                                placeholder="Enter number of Garage" value="{{ old('garage', $property->garage) }}"
                                required>
                        </div>

                        <!-- Room Type -->
                        <div class="mb-3">
                            <label for="room_type" class="form-label">Room Type</label>
                            <select class="form-select" name="room_type" id="room_type" required>
                                <option value="" disabled>Select Room Type</option>
                                <option value="backyard_room"
                                    {{ old('room_type', $property->room_type) == 'backyard_room' ? 'selected' : '' }}>
                                    Backyard Room (Granny Flat)</option>
                                <option value="shared_house"
                                    {{ old('room_type', $property->room_type) == 'shared_house' ? 'selected' : '' }}>
                                    Room in a Shared House</option>
                                <option value="boarding_house"
                                    {{ old('room_type', $property->room_type) == 'boarding_house' ? 'selected' : '' }}>
                                    Room in a Boarding House</option>
                                <option value="shack_informal_settlement"
                                    {{ old('room_type', $property->room_type) == 'shack_informal_settlement' ? 'selected' : '' }}>
                                    Room in a Shack/Informal Settlement</option>
                                <option value="duplex_triplex"
                                    {{ old('room_type', $property->room_type) == 'duplex_triplex' ? 'selected' : '' }}>
                                    Room in a Duplex/Triplex</option>
                                <option value="rooming_house"
                                    {{ old('room_type', $property->room_type) == 'rooming_house' ? 'selected' : '' }}>
                                    Room in a Rooming House</option>
                                <option value="container_home"
                                    {{ old('room_type', $property->room_type) == 'container_home' ? 'selected' : '' }}>
                                    Room in a Container Home</option>
                                <option value="flatlet_cottage"
                                    {{ old('room_type', $property->room_type) == 'flatlet_cottage' ? 'selected' : '' }}>
                                    Flatlet or Cottage on a Property</option>
                                <option value="shared_apartment"
                                    {{ old('room_type', $property->room_type) == 'shared_apartment' ? 'selected' : '' }}>
                                    Room in a Shared Apartment (Subletting)</option>
                                <option value="communal_living"
                                    {{ old('room_type', $property->room_type) == 'communal_living' ? 'selected' : '' }}>
                                    Communal Living Room</option>
                                <option value="zama_zama"
                                    {{ old('room_type', $property->room_type) == 'zama_zama' ? 'selected' : '' }}>
                                    Zama-Zama or Informal Rental Room</option>
                            </select>
                        </div>

                        <!-- Ammenities -->
                        <div class="mb-3">
                            <label for="amenities" class="form-label">Property Amenities</label>
                            @foreach (['wifi', 'parking', 'swimming_pool', 'gym', 'air_conditioning', 'heating', 'laundry', 'balcony', 'garden', 'security', 'furnished', 'elevator', 'pet_friendly', 'cable_tv'] as $amenity)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]"
                                        value="{{ $amenity }}" id="{{ $amenity }}"
                                        {{ in_array($amenity, old('amenities', $property->amenities ?? [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $amenity }}">
                                        {{ ucwords(str_replace('_', ' ', $amenity)) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Property Availability Date -->
                        <div class="mb-3">
                            <label for="available_date" class="form-label">Availability Date</label>
                            <input type="date" name="available_date" id="available_date" class="form-control"
                                value="{{ old('available_date', $property->available_date) }}" required>
                        </div>

                        <!-- Property Images -->
                        @foreach (range(1, 6) as $image)
                            <div class="mb-3">
                                <label for="image_{{ $image }}" class="form-label">Property Image
                                    {{ $image }}</label>
                                <input type="file" name="image_{{ $image }}"
                                    id="image_{{ $image }}" class="form-control"
                                    onchange="previewImage('image_{{ $image }}')">
                            </div>
                        @endforeach

                        <!-- Image Preview Section -->
                        <div id="image-previews" class="d-flex flex-wrap"></div>


                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary">Update Listing</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        function previewImage(id) {
            const input = document.getElementById(id);
            const previewContainer = document.getElementById('image-previews');

            const file = input.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    // Create a container div for each image and the "X" button
                    const imageContainer = document.createElement('div');
                    imageContainer.style.position = 'relative';
                    imageContainer.style.display = 'inline-block';
                    imageContainer.style.margin = '5px';

                    // Create the image element
                    const imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.style.width = '100px';
                    imgElement.style.height = '100px';

                    // Create the remove button (red "X")
                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'X';
                    removeButton.style.position = 'absolute';
                    removeButton.style.top = '0';
                    removeButton.style.right = '0';
                    removeButton.style.backgroundColor = 'red';
                    removeButton.style.color = 'white';
                    removeButton.style.border = 'none';
                    removeButton.style.padding = '5px';
                    removeButton.style.cursor = 'pointer';

                    // Add an event listener to remove the image on button click
                    removeButton.addEventListener('click', function() {
                        imageContainer.remove();
                    });

                    // Append the image and the "X" button to the container
                    imageContainer.appendChild(imgElement);
                    imageContainer.appendChild(removeButton);

                    // Append the image container to the preview section
                    previewContainer.appendChild(imageContainer);
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
