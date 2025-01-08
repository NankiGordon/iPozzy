<x-app-layout>
    <div class="container m-5">
        <h1>Property Listings</h1>

        <div class="row">
            @foreach ($properties as $property)
                <!-- Only display properties that belong to the logged-in user -->
                @if ($property->user_id == auth()->id())
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <!-- Wrap the entire card inside an anchor tag to make it clickable -->
                        <a href="{{ route('property.show', $property->id) }}" class="text-decoration-none">
                            <div class="card d-flex flex-column h-100">
                                <!-- Property Image -->
                                <div class="property-card" style="width: 100%; height: 200px; overflow: hidden;">
                                    <img src="{{ !empty($property->image_1) ? asset('storage/' . $property->image_1) : 'default-image.jpg' }}"
                                        alt="{{ $property->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="card-header">
                                    <h4 class="fs-5">{{ $property->title }}</h4>
                                </div>

                                <div class="card-body d-flex flex-column p-2">
                                    <details>
                                        <summary class="fs-6">Read More</summary>
                                        <p class="fs-6">
                                            {{ Str::limit($property->description, 150) }}
                                            <!-- Display short description -->
                                        </p>
                                    </details>

                                    <!-- Property Price -->
                                    <p class="fs-6">
                                        <strong>R {{ number_format($property->price, 2) }}</strong>
                                    </p>

                                    <!-- Property Available Date -->
                                    <p class="fs-6">
                                        <strong>Available:
                                            {{ \Carbon\Carbon::parse($property->available_date)->format('d M Y') }}</strong>
                                    </p>

                                    <!-- Property Features -->
                                    <p class="fs-6">
                                        <span class="me-2">{{ $property->bedrooms }}</span><i
                                            class="fas fa-bed me-2"></i>
                                        <span class="me-2">{{ $property->garage }}</span><i
                                            class="fas fa-car me-2"></i>
                                        <span class="me-2">{{ $property->bathrooms }}</span><i
                                            class="fas fa-bath me-2"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <div class="pagination">
                {{ $properties->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>
</x-app-layout>
