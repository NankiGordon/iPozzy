<x-app-layout>
    <h1>Create Listings</h1>
    <div class="container p-5">
        <div class="row justify-content-center align-items-center">

            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data"
                        class="p-4 border rounded" id="property-form">
                        @csrf

                        <!-- Property Town -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Property Town</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter property Town" required>
                        </div>

                        <!-- Property Province -->
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


                        <!-- Property Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Describe the property"
                                maxlength="250" required oninput="updateRemainingCharacters()"></textarea>
                            <div id="charCount" class="text-muted mt-2">250 characters remaining</div>
                        </div>




                        <!-- Property Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control"
                                placeholder="Enter property price" required>
                        </div>

                        <!-- Number of Bedrooms -->
                        <div class="mb-3">
                            <label for="bedrooms" class="form-label">Number of Bedrooms</label>
                            <input type="number" name="bedrooms" id="bedrooms" class="form-control"
                                placeholder="Enter number of bedrooms" required>
                        </div>

                        <!-- Number of Bathrooms -->
                        <div class="mb-3">
                            <label for="bathrooms" class="form-label">Number of Bathrooms</label>
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control"
                                placeholder="Enter number of bathrooms" value="0">
                        </div>

                        <!-- Number of Garage -->
                        <div class="mb-3">
                            <label for="garage" class="form-label">Number of Garage</label>
                            <input type="number" name="garage" id="garage" class="form-control"
                                placeholder="Enter number of Garage" value="0">
                        </div>


                        <!-- Room Type -->
                        <div class="mb-3">
                            <label for="room_type" class="form-label">Room Type</label>
                            <select class="form-select" name="room_type" id="room_type" required>
                                <option value="" disabled selected>Select Room Type</option>
                                <option value="backyard_room">Backyard Room (Granny Flat)</option>
                                <option value="shared_house">Room in a Shared House</option>
                                <option value="boarding_house">Room in a Boarding House</option>
                                <option value="shack_informal_settlement">Room in a Shack/Informal Settlement</option>
                                <option value="duplex_triplex">Room in a Duplex/Triplex</option>
                                <option value="rooming_house">Room in a Rooming House</option>
                                <option value="container_home">Room in a Container Home</option>
                                <option value="flatlet_cottage">Flatlet or Cottage on a Property</option>
                                <option value="shared_apartment">Room in a Shared Apartment (Subletting)</option>
                                <option value="communal_living">Communal Living Room</option>
                                <option value="zama_zama">Full House</option>
                            </select>
                        </div>

                        <!-- Ammenities -->
                        <div class="mb-3">
                            <label for="amenities" class="form-label">Property Amenities</label>
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="wifi" id="wifi">
                                        <label class="form-check-label" for="wifi">Wi-Fi</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="parking" id="parking">
                                        <label class="form-check-label" for="parking">Parking</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="swimming_pool" id="swimming_pool">
                                        <label class="form-check-label" for="swimming_pool">Swimming Pool</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="gym" id="gym">
                                        <label class="form-check-label" for="gym">Gym</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="air_conditioning" id="air_conditioning">
                                        <label class="form-check-label" for="air_conditioning">Air
                                            Conditioning</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="heating" id="heating">
                                        <label class="form-check-label" for="heating">Heating</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="laundry" id="laundry">
                                        <label class="form-check-label" for="laundry">Laundry</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="balcony" id="balcony">
                                        <label class="form-check-label" for="balcony">Balcony</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="garden" id="garden">
                                        <label class="form-check-label" for="garden">Garden</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="security" id="security">
                                        <label class="form-check-label" for="security">24/7 Security</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="furnished" id="furnished">
                                        <label class="form-check-label" for="furnished">Furnished</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="elevator" id="elevator">
                                        <label class="form-check-label" for="elevator">Elevator</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="pet_friendly" id="pet_friendly">
                                        <label class="form-check-label" for="pet_friendly">Pet Friendly</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]"
                                            value="cable_tv" id="cable_tv">
                                        <label class="form-check-label" for="cable_tv">Cable TV</label>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <!-- Property Availability Date -->
                        <div class="mb-3">
                            <label for="available_date" class="form-label">Availability Date</label>
                            <input type="date" name="available_date" id="available_date" class="form-control"
                                required>
                        </div>


                        <!-- Property Images -->
                        <div class="mb-3">
                            <label for="property_images" class="form-label">Property Images</label>
                            <div id="property_images">
                                <!-- Dynamically generated file input fields -->
                            </div>
                        </div>



                        <!-- Image Preview Section -->
                        <div id="image-previews" class="d-flex flex-wrap"></div>



                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary">Create Listing</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script></script>
</x-app-layout>
