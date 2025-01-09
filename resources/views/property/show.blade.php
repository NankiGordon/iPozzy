<x-app-layout>
    <div class="container mt-4">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back to Listings</a>
        </div>

        <!-- Property Title -->
        <h1 class="text-center">{{ $property->title }}</h1>

        <div class="row g-4">
            <!-- Carousel Section -->
            <div class="col-12 col-md-8">
                <div class="card shadow-sm">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $images = [
                                    $property->image_1 ?? null,
                                    $property->image_2 ?? null,
                                    $property->image_3 ?? null,
                                    $property->image_4 ?? null,
                                    $property->image_5 ?? null,
                                    $property->image_6 ?? null,
                                ];
                            @endphp
                            @foreach ($images as $index => $image)
                                @if (!empty($image))
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $property->title }}"
                                            class="img-fluid w-100"
                                            style="object-fit: cover; width: 100%; height: 500px;">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Property Info Section -->
            <div class="col-12 col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="card-header text-center mb-2">
                            <h5>{{ $property->title }} , {{ $property->province }}</h5>
                        </div>
                        <p><strong>R {{ number_format($property->price, 2) }}pm</strong></p>
                        <p>Available:
                            <strong>{{ \Carbon\Carbon::parse($property->available_date)->format('d M Y') }}</strong>
                        </p>
                        <p>
                            <i class="fas fa-bed me-2"></i>{{ $property->bedrooms }} Bedrooms
                            <i class="fas fa-bath mx-3"></i>{{ $property->bathrooms }} Bathrooms
                            <i class="fas fa-car mx-3"></i>{{ $property->garage }} Garage
                        </p>
                        <p><strong>Amenities:</strong></p>
                        <div>
                            @if (is_array($property->amenities) && !empty($property->amenities))
                                @foreach ($property->amenities as $amenity)
                                    <span class="badge bg-secondary">{{ $amenity }}</span>
                                @endforeach
                            @else
                                <span class="badge bg-secondary">No amenities listed</span>
                            @endif
                        </div>
                        <p class="mt-3">{{ Str::limit($property->description, 250) }}</p>

                        <div class="mt-3">
                            @if ($property->user_id === auth()->id())
                                <a href="{{ route('property.edit', $property->id) }}"
                                    class="btn btn-warning btn-sm me-2">Edit</a>

                                <form action="{{ route('property.destroy', $property->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>

                                <!-- Update Availability Form -->
                                <form action="{{ route('property.updateAvailability', $property->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mt-3 form-group">
                                        <label for="availability">Availability:</label>
                                        <select name="availability" id="availability" class="form-select btn-sm">
                                            <option value="Available"
                                                {{ $property->availability === 'Available' ? 'selected' : '' }}>
                                                Available
                                            </option>
                                            <option value="Taken"
                                                {{ $property->availability === 'Taken' ? 'selected' : '' }}>
                                                Taken
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-primary btn-sm">Update
                                        Availability</button>
                                </form>
                            @else
                                @if (auth()->check())
                                    <a href="{{ route('property.makeOffer', $property->id) }}"
                                        class="btn btn-outline-primary btn-sm">Make Offer</a>
                                @else
                                    <a class="btn btn-outline-info {{ request()->is('login') ? 'active' : '' }}"
                                        href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                                        Login To Make Offer
                                    </a>
                                @endif
                            @endif

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
                </div>
            </div>
        </div>

        <!-- Offers and Owner Information -->
        <div class="row g-4 mt-4">
            <!-- Offers Section -->
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="card-header text-center mb-2">
                            <h5>Offers</h5>
                        </div>
                        @if ($property->offers->isEmpty())
                            <p>No offers yet.</p>
                        @else
                            <div class="accordion" id="offersAccordion">
                                @foreach ($property->offers as $index => $offer)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $index }}" aria-expanded="true"
                                                aria-controls="collapse{{ $index }}">
                                                Offer Price: {{ $offer->price }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $index }}"
                                            data-bs-parent="#offersAccordion">
                                            <div class="accordion-body">
                                                @if (auth()->id() === $property->user_id)
                                                    <p><strong>Message:</strong> {{ $offer->message }}</p>
                                                    <p><strong>Phone Number:</strong> {{ $offer->phone_number }}</p>
                                                    <form action="{{ route('offer.updateStatus', $offer->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="status" class="form-select">
                                                            <option value="Pending"
                                                                {{ $offer->status === 'Pending' ? 'selected' : '' }}>
                                                                Pending</option>
                                                            <option value="Accepted"
                                                                {{ $offer->status === 'Accepted' ? 'selected' : '' }}>
                                                                Accepted</option>
                                                            <option value="Rejected"
                                                                {{ $offer->status === 'Rejected' ? 'selected' : '' }}>
                                                                Rejected</option>
                                                        </select>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm mt-2">Update Status</button>
                                                    </form>
                                                @endif
                                                <p><strong>Status:</strong>
                                                    <span
                                                        style="color:
                                                @if ($offer->status === 'Pending') #ffcc00;
                                                @elseif ($offer->status === 'Accepted') #28a745;
                                                @elseif ($offer->status === 'Rejected') #dc3545; @endif; font-weight: bold;">
                                                        {{ $offer->status }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>


            <!-- Owner Information -->
            <div class="col-12 col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="card-header text-center mb-2">
                            <h5 class="mb-4">Owner Information</h5>
                        </div>
                        @if ($property->user->profile)
                            <div>
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{ $property->user->profile->profile_pic ? asset('storage/' . $property->user->profile->profile_pic) : asset('images/default-profile.png') }}"
                                        alt="Profile Picture" class="img-fluid rounded-circle"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                                <p><strong>First Name:</strong> {{ $property->user->profile->first_name }}</p>
                                <p><strong>Last Name:</strong> {{ $property->user->profile->last_name }}</p>
                                <p><strong>Phone:</strong> {{ $property->user->profile->phone_number }}</p>
                                <p><strong>Email:</strong> {{ $property->user->email }}</p>
                            </div>
                        @else
                            <p class="text-muted">No profile information available.</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
