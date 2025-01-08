<x-app-layout>
    <div class="container mt-5">
        <h1 class="mb-4">User Profile</h1>

        @php
            $profile = Auth::user()->profile; // Get the logged-in user's profile
        @endphp

        @if (!$profile)
            <!-- Display the Create Profile Button if no profile exists -->
            <p>No profile found. <a href="{{ route('user-profiles.create') }}" class="btn btn-outline-success">Create
                    Profile</a>
            </p>
        @else
            <div class="row justify-content-center">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <!-- Check if profile_pic is not empty and render it or show a default image -->
                        <img src="{{ !empty($profile->profile_pic) ? asset('storage/' . $profile->profile_pic) : asset('images/default-profile.png') }}"
                            alt="{{ $profile->first_name }}'s profile picture" class="card-img-top"
                            style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $profile->first_name }} {{ $profile->last_name }}</h5>
                            <p class="card-text">{{ Str::limit($profile->bio, 100) }}</p>
                            <p class="card-text">{{ $profile->phone_number }}</p>
                            <p class="card-text"> {{ $profile->user->email }}</p>
                            <p class="card-text">{{ $profile->address_line_1 }}</p>
                            <p class="card-text">{{ $profile->address_line_2 }}</p>
                            <p class="card-text">{{ $profile->town }}</p>
                            <p class="card-text">{{ $profile->city }}</p>
                            <p class="card-text">{{ $profile->postal_code }}</p>
                            <p class="card-text">{{ $profile->province }}</p>
                            <!-- Add an Edit button -->
                            <a href="{{ route('user-profiles.edit', $profile->id) }}"
                                class="btn btn-outline-warning mt-2">Edit Profile</a>

                            <!-- Add a Delete button -->
                            <form action="{{ route('user-profiles.destroy', $profile->id) }}" method="POST"
                                class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete Profile</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

</x-app-layout>
