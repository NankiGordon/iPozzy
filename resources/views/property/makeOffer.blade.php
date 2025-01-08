<x-app-layout>


    <div class="container p-5">
        <h1>Make an Offer for {{ $property->title }}</h1>

        <div class="card shadow-lg p-4">
            <div class="card-body">
                <form action="{{ route('property.submitOffer', $property->id) }}" method="POST">
                    @csrf

                    <!-- Offer Price Input -->
                    <div class="mb-3">
                        <label for="offer_price" class="form-label">Offer Price</label>
                        <input type="number" name="offer_price" class="form-control" required>
                    </div>

                    <!-- Message Input (Optional) -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Message (Optional)</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>

                    <!-- Phone Number Input -->
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" required
                            placeholder="Enter your phone number">
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit Offer</button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
