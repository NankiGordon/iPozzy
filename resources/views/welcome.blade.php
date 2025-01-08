<x-app-layout>
    <div class="container mt-5">
        <h1>Property Listings</h1>

        <div class="row">
            @foreach ($properties as $property)
                <div class="col-12 col-md-3 mb-3">
                    <!-- Wrap the entire card inside an anchor tag to make it clickable -->
                    <a href="{{ route('property.show', $property->id) }}" class="text-decoration-none">
                        <div class="card d-flex flex-column" style="height: 100%; display: inline-block; margin: 10px;">
                            <!-- Property Image -->
                            <div class="property-card" style="width: 100%; height: 75%; overflow: hidden;">
                                <img src="{{ !empty($property->image_1) ? asset('storage/' . $property->image_1) : 'default-image.jpg' }}"
                                    alt="{{ $property->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <!-- Card Header -->
                            <div class="card-header" style="padding: 10px;">
                                <h4 class="fs-5 fs-md-4 fs-lg-3">{{ $property->title }}</h4>
                            </div>

                            <div class="card-body d-flex flex-column p-2 mb-1">
                                <details>
                                    <summary class="fs-6 fs-md-5 fs-lg-4">Read More</summary>
                                    <p class="fs-6 fs-md-5 fs-lg-4">
                                        {{ Str::limit($property->description, 150) }} <!-- Display short description -->
                                    </p>
                                </details>
                                <hr>
                                <!-- Property Price -->
                                <p class="mt-3 fs-6 fs-md-5 fs-lg-4">
                                    <strong>R {{ number_format($property->price, 2) }}</strong>
                                </p>

                                <!-- Property Available Date -->
                                <p class="fs-6 fs-md-5 fs-lg-4">
                                    <strong>Available:
                                        {{ \Carbon\Carbon::parse($property->available_date)->format('d M Y') }}</strong>
                                </p>

                                <!-- Property Features -->
                                <p class="fs-6 fs-md-5 fs-lg-4">
                                    <span class="me-2">{{ $property->bedrooms }}</span><i class="fas fa-bed me-2"></i>
                                    <span class="me-2">{{ $property->garage }}</span><i class="fas fa-car me-2"></i>
                                    <span class="me-2">{{ $property->bathrooms }}</span><i
                                        class="fas fa-bath me-2"></i>
                                </p>
                                <!-- Display the offer count -->
                                <div>
                                    <strong>Total Offers:</strong>
                                    @if ($property->offer_count > 0)
                                        {{ $property->offer_count }}
                                    @else
                                        No offers yet
                                    @endif
                                </div>

                                <!-- Display Availability with Color -->
                                <div class="mt-3">
                                    <strong>Availability:</strong>
                                    @if ($property->availability === 'Available')
                                        <span style="color: green; font-weight: bold;">Available</span>
                                    @elseif ($property->availability === 'Taken')
                                        <span style="color: red; font-weight: bold;">Taken</span>
                                    @else
                                        <span style="color: gray; font-weight: bold;">Status Unknown</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <div class="pagination-container">
                <!-- Pagination Links -->
                <nav>
                    <ul class="pagination pagination-sm justify-content-center">
                        {{ $properties->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
                <!-- Additional Information -->
                <div class="text-center mt-2 text-muted">
                    <p class="mb-0">
                        Showing
                        <strong>{{ $properties->firstItem() ?? 0 }}</strong>
                        to
                        <strong>{{ $properties->lastItem() ?? 0 }}</strong>
                        of
                        <strong>{{ $properties->total() }}</strong>
                        properties.
                    </p>
                    <p class="mb-0">
                        Page
                        <strong>{{ $properties->currentPage() }}</strong>
                        of
                        <strong>{{ $properties->lastPage() }}</strong>.
                    </p>
                </div>
            </div>
        </div>

        <style>
            /* Customizing pagination for mobile */
            @media (max-width: 576px) {
                .pagination-container .pagination {
                    flex-wrap: wrap;
                    justify-content: space-between;
                }

                .pagination-container .pagination li {
                    margin: 5px;
                }
            }
        </style>

    </div>
</x-app-layout>
