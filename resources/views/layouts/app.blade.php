<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iPozzy</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


</head>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('img/lolo.jpg') }}" alt="Your image description" class="rounded-circle"
                    style="width: 50px; height: 50px; object-fit: cover;" />
            </a>
            <a class="navbar-brand ml-1 " href="{{ route('home') }}">iPozzy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="#"
                            data-bs-toggle="modal" data-bs-target="#aboutModal">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pricing') ? 'active' : '' }}" href="#"
                            data-bs-toggle="modal" data-bs-target="#pricingModal">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('faq') ? 'active' : '' }}" href="#"
                            data-bs-toggle="modal" data-bs-target="#faqModal">FAQ's</a>
                    </li>
                    <!-- About Modal -->
                    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="aboutModalLabel">About Us</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card shadow-lg p-4 mb-4" style="max-width: 600px; margin: auto;">
                                        <div class="card-body">
                                            <p>Welcome to iPozzy! We’re a simple and friendly platform that helps
                                                property
                                                owners and tenants connect. Whether you're looking to rent out your
                                                property or
                                                find a place to call home, we make it easier for you.</p>

                                            <p>At iPozzy, we focus on the smaller property market, like homes and spaces
                                                that
                                                are not always listed in big real estate agencies. Our goal is to help
                                                landlords
                                                and tenants in South Africa find each other quickly and safely, without
                                                the
                                                stress. We make sure everyone has a smooth and easy experience, from
                                                browsing
                                                properties to getting in touch with the right people.</p>

                                            <p>So whether you're a property owner wanting to list your space, or a
                                                tenant
                                                looking for a new place, iPozzy is here to help! We’re all about making
                                                things
                                                simple, accessible, and affordable for everyone, especially in the
                                                informal
                                                housing market.</p>

                                            <p> Thanks for choosing iPozzy – your new home, or the key to someone
                                                else's!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Modal -->
                    <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pricingModalLabel">Pricing</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container py-5">
                                        <div class="row">
                                            <!-- Basic Plan -->
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="card shadow-sm border-primary d-flex flex-column"
                                                    style="min-height: 400px;">
                                                    <div class="card-header bg-primary text-white text-center">
                                                        <h3>Basic Plan</h3>
                                                        <p>Perfect for first-time landlords</p>
                                                    </div>
                                                    <div class="card-body text-center flex-grow-1">
                                                        <h4 class="card-title text-success">R50</h4>
                                                        <p class="card-text">For 30 days</p>
                                                        <ul class="list-unstyled">
                                                            <li><strong>Post Duration:</strong> 30 Days</li>
                                                            <li><strong>Listing Position:</strong> Standard</li>
                                                            <li><strong>Contact Details:</strong> Visible</li>
                                                            <li><strong>Priority Support:</strong> No</li>
                                                        </ul>
                                                        <form action="{{ route('payment.create') }}" method="POST">
                                                            @csrf
                                                            <!-- Hidden input for the payment plan -->
                                                            <input type="hidden" name="payment_plan" value="basic">
                                                            <button type="submit"
                                                                class="mt-3 btn btn-outline-primary">Choose
                                                                Plan</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Premium Plan -->
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="card shadow-sm border-warning d-flex flex-column"
                                                    style="min-height: 400px;">
                                                    <div class="card-header bg-warning text-white text-center">
                                                        <h3>Premium Plan</h3>
                                                        <h4>(Recommended)</h4>
                                                        <p>For experienced landlords</p>
                                                    </div>
                                                    <div class="card-body text-center flex-grow-1">
                                                        <h4 class="card-title text-info">R100</h4>
                                                        <p class="card-text">For 60 days</p>
                                                        <ul class="list-unstyled">
                                                            <li><strong>Post Duration:</strong> 60 Days</li>
                                                            <li><strong>Listing Position:</strong> Featured</li>
                                                            <li><strong>Contact Details:</strong> Visible</li>
                                                            <li><strong>Priority Support:</strong> Yes</li>
                                                        </ul>
                                                        <form action="{{ route('payment.create') }}" method="POST">
                                                            @csrf
                                                            <!-- Hidden input for the payment plan -->
                                                            <input type="hidden" name="payment_plan"
                                                                value="premium">
                                                            <button type="submit"
                                                                class="mt-3 btn btn-outline-primary">Choose
                                                                Plan</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Elite Plan -->
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="card shadow-sm border-danger d-flex flex-column"
                                                    style="min-height: 400px;">
                                                    <div class="card-header bg-danger text-white text-center">
                                                        <h3>Elite Plan</h3>
                                                        <p>For professional landlords</p>
                                                    </div>
                                                    <div class="card-body text-center flex-grow-1">
                                                        <h4 class="card-title text-danger">R200</h4>
                                                        <p class="card-text">For 90 days</p>
                                                        <ul class="list-unstyled">
                                                            <li><strong>Post Duration:</strong> 90 Days</li>
                                                            <li><strong>Listing Position:</strong> Top Position</li>
                                                            <li><strong>Contact Details:</strong> Visible</li>
                                                            <li><strong>Priority Support:</strong> Yes</li>
                                                            <li><strong>Boosted Visibility:</strong> Yes</li>
                                                        </ul>
                                                        <form action="{{ route('payment.create') }}" method="POST">
                                                            @csrf
                                                            <!-- Hidden input for the payment plan -->
                                                            <input type="hidden" name="payment_plan" value="elite">
                                                            <button type="submit"
                                                                class="mt-3 btn btn-outline-primary">Choose
                                                                Plan</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- FAQ Modal -->
                    <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="faqModalLabel">FAQ's</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Frequently Asked Questions (FAQs)</h5>

                                            <div class="mb-3">
                                                <h6>1. What is iPozzy?</h6>
                                                <p>iPozzy is an online platform designed to help property owners and
                                                    tenants connect easily. Whether you're a landlord wanting to list
                                                    your property or a tenant looking for a place to rent, iPozzy makes
                                                    it simple and convenient to find each other.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>2. How do I list my property on iPozzy?</h6>
                                                <p>To list your property on iPozzy, simply create an account, log in,
                                                    and go to the "Create Listing" section. You can then fill in details
                                                    about your property, upload images, and set the rental price. Your
                                                    listing will be available to potential tenants immediately.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>3. Is iPozzy only for formal property listings?</h6>
                                                <p>No! iPozzy is designed to support the informal property market. We
                                                    focus on smaller properties, including homes and spaces that may not
                                                    always be listed by big real estate agencies.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>4. Can I search for properties on iPozzy without creating an
                                                    account?</h6>
                                                <p>Yes, you can browse through property listings on iPozzy without an
                                                    account. However, to contact property owners or request a viewing,
                                                    you'll need to create an account and log in.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>5. How do I contact a property owner or tenant?</h6>
                                                <p>Once you’ve found a property you’re interested in, you can contact
                                                    the property owner directly through our platform. Just click the
                                                    "Contact" button on the listing page, and you'll be able to send a
                                                    message.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>6. Is it free to use iPozzy?</h6>
                                                <p>Yes, it is free to browse listings and contact property owners or
                                                    tenants. Property owners can list their properties for a small
                                                    subscription fee.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>7. How do I delete my account or listing?</h6>
                                                <p>If you want to delete your account or listing, you can do so by going
                                                    to your account settings and selecting the "Delete Account" option.
                                                    If you're a property owner and wish to remove a listing, you can do
                                                    so from your dashboard.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>8. Is my personal information safe on iPozzy?</h6>
                                                <p>Yes, your privacy is important to us. We follow strict security
                                                    measures to protect your personal information. We do not share or
                                                    sell your data to third parties. For more details, please read our
                                                    <a href="#">Privacy Policy</a>.
                                                </p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>9. Can I edit my listing after it’s been published?</h6>
                                                <p>Yes, you can edit your listing at any time. Simply log in to your
                                                    account, go to your dashboard, and update the details of your
                                                    property. Any changes you make will be reflected immediately.</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6>10. How can I change my subscription plan?</h6>
                                                <p>If you're a property owner and wish to change your subscription plan,
                                                    you can do so from your account dashboard. Simply go to the
                                                    "Subscription" section and select the plan that suits your needs.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <li class="nav-item">
                        @if (auth()->check() && auth()->user()->properties->isNotEmpty())
                            <a class="nav-link {{ request()->is('property.index') ? 'active' : '' }}"
                                href="{{ route('property.index') }}">Your Listings</a>
                        @endif
                    </li>

                    @auth
                        <li class="nav-item me-2">
                            <a class="nav-link btn btn-outline-primary px-3 py-2 border" data-bs-toggle="modal"
                                data-bs-target="#pricingModal">
                                <strong>Create Listing</strong>
                            </a>



                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="#"
                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login To Create Listing
                            </a>
                        </li>
                    @endguest
                </ul>
                <form class="d-flex" role="search" method="GET" action="{{ route('property.search') }}">
                    <input class="form-control me-2" type="search" name="search" placeholder="Town Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item dropdown mr-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}"
                                        href="{{ route('user-profiles.index') }}">User
                                        Profile</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Navbar Item for Login -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="#"
                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login
                            </a>
                        </li>

                        <!-- Modal for Login Form -->
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Login Form -->
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- Email Address -->
                                            <div class="mb-3">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class="form-control rounded-3 py-3"
                                                    type="email" name="email" :value="old('email')" required autofocus
                                                    autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- Password -->
                                            <div class="mb-3">
                                                <x-input-label for="password" :value="__('Password')" />
                                                <x-text-input id="password" class="form-control rounded-3 py-3"
                                                    type="password" name="password" required
                                                    autocomplete="current-password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <!-- Google -->
                                            <div class="mb-3">
                                                <a href="{{ url('login/google') }}"
                                                    class="btn btn-danger d-flex align-items-center justify-content-center">
                                                    <i class="fab fa-google me-2"></i> <!-- Font Awesome Google Icon -->
                                                    Login with Google
                                                </a>
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="form-check mb-3">
                                                <input id="remember_me" type="checkbox" class="form-check-input"
                                                    name="remember">
                                                <label for="remember_me"
                                                    class="form-check-label text-sm">{{ __('Remember me') }}</label>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                @if (Route::has('password.request'))
                                                    <a class="text-sm text-secondary"
                                                        href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif

                                                <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                                                    {{ __('Log in') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>




                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="#"
                                    data-bs-toggle="modal" data-bs-target="#registerModal">
                                    Register
                                </a>
                            </li>
                            <div class="modal fade" id="registerModal" tabindex="-1"
                                aria-labelledby="registerModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center w-100">
                                            <h5 class="modal-title" id="registerModalLabel">Register</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Registration Form -->
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <!-- Name -->
                                                <div class="mb-3">
                                                    <x-input-label for="name" :value="__('Name')" />
                                                    <x-text-input id="name" class="form-control rounded-3 py-3"
                                                        type="text" name="name" :value="old('name')" required autofocus
                                                        autocomplete="name" />
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>

                                                <!-- Email Address -->
                                                <div class="mb-3">
                                                    <x-input-label for="email" :value="__('Email')" />
                                                    <x-text-input id="email" class="form-control rounded-3 py-3"
                                                        type="email" name="email" :value="old('email')" required
                                                        autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>



                                                <!-- Password -->
                                                <div class="mb-3">
                                                    <x-input-label for="password" :value="__('Password')" />
                                                    <x-text-input id="password" class="form-control rounded-3 py-3"
                                                        type="password" name="password" required
                                                        autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="mb-3">
                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                                    <x-text-input id="password_confirmation"
                                                        class="form-control rounded-3 py-3" type="password"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>
                                                <!-- Google -->
                                                <div class="mb-3">
                                                    <a href="{{ url('login/google') }}"
                                                        class="btn btn-danger d-flex align-items-center justify-content-center">
                                                        <i class="fab fa-google me-2"></i>
                                                        <!-- Font Awesome Google Icon -->
                                                        Login with Google
                                                    </a>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a class="text-sm text-secondary" href="{{ route('login') }}">
                                                        {{ __('Already registered?') }}
                                                    </a>

                                                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
        </nav>
    @endif
</header>

<body>

    {{ $slot }}

    <!-- Footer Section -->
    <!-- Footer Section -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <!-- About Section -->
                <div class="col-md-4">
                    <h5 class="text-uppercase">About iPozzy</h5>
                    <p>
                        iPozzy is a platform where property owners and tenants can connect easily. We provide a seamless
                        experience for property listings, making it easy to find and list properties online.
                    </p>
                </div>

                <!-- Policies Section -->
                <div class="col-md-4">
                    <h5 class="text-uppercase">Policies</h5>
                    <ul class=" footer-links list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#privacyPolicyModal">Privacy Policy</a></li>
                        <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#termsOfServiceModal">Terms of Service</a></li>
                        <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#cookiePolicyModal">Cookie Policy</a></li>
                        <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#refundPolicyModal">Refund Policy</a></li>
                        <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#userAgreementModal">User Agreement</a></li>

                    </ul>
                </div>

                <!-- Contact Section -->
                <div class="col-md-4">
                    <h5 class="text-uppercase">Contact Us</h5>
                    <p><i class="bi bi-envelope"></i> Email: support@ipozzy.com</p>
                    <p><i class="bi bi-telephone"></i> Phone: +27 11 123 4567</p>

                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; {{ date('Y') }} iPozzy. All rights reserved.</p>

            </div>
        </div>
    </footer>
    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyPolicyModal" tabindex="-1" aria-labelledby="privacyPolicyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyPolicyModalLabel">Privacy Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>

                        At iPozzy, we value your privacy and are committed to protecting your personal information in
                        compliance with the Protection of Personal Information Act (POPIA) of South Africa. This Privacy
                        Policy outlines how we collect, use, and protect your personal data when you use our services.

                        1. Information We Collect
                        We collect the following types of information to provide you with the best experience:

                        Personal Information: When you register, create an account, or list a property, we may collect
                        personal information such as your name, email address, phone number, and location details.
                        Property Listings: Information related to the properties you list, including property
                        descriptions, images, location, and price.
                        Usage Data: We automatically collect data on how you use the platform, such as your IP address,
                        device type, browser type, and browsing behavior.
                        2. How We Use Your Information
                        We use the information we collect for the following purposes:

                        To provide and manage your account and property listings.
                        To improve and personalize our services.
                        To communicate with you about updates, promotions, or relevant offers.
                        To respond to your inquiries and support requests.
                        To analyze and monitor usage patterns for the improvement of the platform.
                        3. Data Protection
                        We implement various security measures to ensure that your personal data is protected against
                        unauthorized access, alteration, disclosure, or destruction. However, please be aware that no
                        method of transmission over the internet or electronic storage is 100% secure.

                        In compliance with POPIA, we ensure that personal data is processed in a lawful, reasonable, and
                        transparent manner and is protected from harm.

                        4. Sharing of Your Information
                        We do not sell, rent, or lease your personal information to third parties. However, we may share
                        your information with trusted third-party service providers for operational purposes, such as
                        payment processing or customer support. These providers are obligated to maintain the
                        confidentiality and security of your information and may only use it for the purposes we’ve
                        agreed to.

                        We may also disclose your information when required by law or when necessary to protect our
                        rights, property, or the safety of our users.

                        5. Cookies and Tracking Technologies
                        We use cookies and other tracking technologies to enhance your experience on the platform,
                        analyze usage patterns, and tailor content to your preferences. You can manage your cookie
                        preferences through your browser settings.

                        Please note that cookies may store small amounts of data on your device, which can be used to
                        personalize your experience. These cookies are only used with your consent or as permitted by
                        law.

                        6. Third-Party Links
                        Our platform may contain links to third-party websites. We are not responsible for the privacy
                        practices or content of these external sites. We encourage you to review the privacy policies of
                        these third parties before sharing any personal information.

                        7. Your Rights
                        As a user, under POPIA, you have the right to:

                        Access your personal information and request details about how it is being processed.
                        Correct any inaccurate or outdated information.
                        Delete or request the deletion of your personal information when it is no longer needed or when
                        you withdraw consent.
                        Object to the processing of your personal information in certain circumstances.
                        Opt-out of promotional emails or direct marketing communications.
                        Restrict the use of certain data under applicable law.
                        If you would like to exercise any of these rights, please contact us using the details below.

                        8. Changes to This Privacy Policy
                        We may update this Privacy Policy periodically to reflect changes in our practices, legal
                        requirements, or operational improvements. Any updates will be posted on this page with the
                        revised date. We encourage you to review this Privacy Policy periodically to stay informed about
                        how we are protecting your information.

                        9. Contact Us
                        If you have any questions or concerns about this Privacy Policy or how we handle your personal
                        data, or if you wish to exercise your rights under POPIA, please contact us at:

                        Email: [your email address]
                        Phone: [your phone number]
                        Address: [your physical address]
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms of Service Modal -->
    <div class="modal fade" id="termsOfServiceModal" tabindex="-1" aria-labelledby="termsOfServiceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsOfServiceModalLabel">Terms of Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>These Terms of Service ("Terms") govern your access to and use of the iPozzy platform, available
                        through the website and mobile applications (collectively, "iPozzy", "the Platform", "we", or
                        "our"). By using iPozzy, you agree to comply with these Terms. If you do not agree with these
                        Terms, please do not use the Platform.

                        1. Acceptance of Terms
                        By accessing or using iPozzy, you agree to be bound by these Terms, our Privacy Policy, and any
                        other applicable policies or guidelines. If you do not agree to these Terms, you must stop using
                        the Platform.

                        2. User Registration and Account
                        To access certain features of iPozzy, you may be required to create an account. When you create
                        an account, you agree to provide accurate, current, and complete information about yourself.
                        You are responsible for maintaining the confidentiality of your account and password, and for
                        all activities that occur under your account.
                        3. Use of iPozzy
                        For Property Owners: You may use iPozzy to list your properties for rent or sale, manage your
                        listings, and interact with potential tenants.
                        For Tenants: You may browse property listings, contact property owners, and submit rental
                        applications.
                        You agree to use iPozzy only for lawful purposes, in accordance with applicable laws and
                        regulations.
                        4. Property Listings
                        Property owners are responsible for ensuring that all information in their listings is accurate
                        and up-to-date.
                        iPozzy does not guarantee the accuracy, completeness, or legality of property listings.
                        Property owners must ensure that their listings comply with all applicable housing laws and
                        regulations.
                        Tenants are advised to conduct their own due diligence before entering into any agreements with
                        property owners.
                        5. Fees and Payments
                        Property owners may be required to pay a subscription fee for listing properties on iPozzy.
                        Fees are subject to change and are outlined on the platform at the time of payment.
                        Payments made through the Platform are processed by third-party payment providers. By using
                        these services, you agree to abide by their terms and conditions.
                        6. Prohibited Activities
                        You agree not to engage in the following activities on iPozzy:

                        Posting false or misleading information in property listings.
                        Engaging in any fraudulent activity, including but not limited to, impersonating another user or
                        providing fake contact information.
                        Using the Platform to harass, intimidate, or threaten others.
                        Violating any local, state, or national laws related to property transactions or rental
                        agreements.
                        7. Intellectual Property
                        iPozzy owns all rights, title, and interest in and to the Platform, including all content,
                        logos, trademarks, and other intellectual property displayed on the Platform.
                        You may not reproduce, distribute, or use any part of the Platform’s content without prior
                        written consent from iPozzy.
                        8. Termination of Account
                        We reserve the right to suspend or terminate your account at any time, without notice, for any
                        violation of these Terms or any conduct that we deem harmful to the Platform or other users.

                        9. Disclaimers and Limitation of Liability
                        iPozzy makes no warranties or representations about the accuracy or reliability of the Platform.
                        The Platform is provided "as is" and we disclaim all warranties, express or implied, including
                        but not limited to implied warranties of merchantability or fitness for a particular purpose.
                        In no event will iPozzy be liable for any indirect, incidental, special, or consequential
                        damages arising from your use of the Platform.
                        10. Indemnification
                        You agree to indemnify and hold iPozzy, its affiliates, employees, and agents harmless from any
                        claims, losses, or damages arising from your use of the Platform or violation of these Terms.

                        11. Governing Law
                        These Terms are governed by and construed in accordance with the laws of [your country or
                        state]. Any disputes will be subject to the exclusive jurisdiction of the courts in [your
                        location].

                        12. Modifications to the Terms
                        iPozzy reserves the right to update or modify these Terms at any time. All changes will be
                        posted on this page with an updated "Last Revised" date. By continuing to use the Platform after
                        such changes are made, you agree to the updated Terms.

                        13. Contact Us
                        If you have any questions or concerns about these Terms of Service, please contact us at:

                        Email: [your email address]
                        Address: [your physical address]
                        Phone: [your phone number]
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cookie Policy Modal -->
    <div class="modal fade" id="cookiePolicyModal" tabindex="-1" aria-labelledby="cookiePolicyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cookiePolicyModalLabel">Cookie Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This Cookie Policy explains how iPozzy ("we", "us", or "our") uses cookies and similar
                        technologies on our website and mobile applications (collectively, the "Platform"). By using the
                        Platform, you agree to the use of cookies as described in this policy.

                        1. What Are Cookies?
                        Cookies are small text files that are placed on your device when you visit a website or use an
                        application. These cookies help improve your user experience by remembering your preferences and
                        actions over time. Cookies can be stored for different periods, ranging from a session
                        (temporary) to a persistent period (until manually deleted or when they expire).

                        2. Types of Cookies We Use
                        We use the following types of cookies on the iPozzy platform:

                        Essential Cookies: These cookies are necessary for the functioning of the Platform and enable
                        you to use its features, such as logging in, navigating the website, and completing
                        transactions.

                        Performance Cookies: These cookies help us understand how visitors interact with the Platform by
                        collecting information on areas visited, time spent, and any issues experienced. This
                        information helps us improve the performance and usability of the Platform.

                        Functionality Cookies: These cookies allow the Platform to remember choices you make (such as
                        your language or region) and provide enhanced, personalized features.

                        Advertising Cookies: These cookies are used to deliver targeted advertisements to you. They help
                        us and our partners provide ads that are more relevant to you, based on your interests and
                        browsing history.

                        Third-Party Cookies: Some third-party services we use, such as analytics or advertising
                        providers, may set cookies on your device to gather data. These cookies are not controlled by
                        iPozzy.

                        3. How We Use Cookies
                        We use cookies to:

                        Enhance and personalize your experience on the Platform.
                        Analyze website traffic and usage to improve the Platform’s performance.
                        Enable certain functionalities on the Platform (e.g., saving your preferences).
                        Display targeted advertising to you and measure the effectiveness of ads.
                        Ensure the security of your account and prevent fraudulent activities.
                        4. Managing Cookies
                        You can control and manage cookies through your browser settings. Most web browsers allow you to
                        delete cookies, block cookies from certain websites, or notify you when a cookie is being placed
                        on your device. Please note that disabling certain types of cookies may impact the functionality
                        of the Platform and your user experience.

                        To manage cookie preferences, follow these steps based on your browser:

                        Google Chrome: Go to Settings > Privacy and security > Cookies and other site data.
                        Mozilla Firefox: Go to Preferences > Privacy & Security > Cookies and Site Data.
                        Safari: Go to Preferences > Privacy > Cookies and website data.
                        Microsoft Edge: Go to Settings > Cookies and site permissions > Manage and delete cookies and
                        site data.
                        You can also opt-out of targeted advertising cookies through third-party services like Google
                        Ads or Facebook Ads. Visit the respective platforms' privacy settings to manage your
                        preferences.

                        5. Consent
                        By using the iPozzy Platform, you consent to the use of cookies as described in this policy. If
                        you choose not to accept cookies, you can modify your browser settings, but please be aware that
                        certain features of the Platform may not function properly.

                        6. Changes to This Cookie Policy
                        We may update this Cookie Policy from time to time. Any changes will be posted on this page with
                        an updated "Last Revised" date. By continuing to use the Platform after any changes are made,
                        you consent to the updated Cookie Policy.

                        7. Contact Us
                        If you have any questions about our Cookie Policy, please contact us at:

                        Email: [your email address]
                        Address: [your physical address]
                        Phone: [your phone number]</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Refund Policy Modal -->
    <div class="modal fade" id="refundPolicyModal" tabindex="-1" aria-labelledby="refundPolicyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="refundPolicyModalLabel">Refund Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Thank you for choosing iPozzy. We strive to ensure that you have the best experience while using
                        our platform for property listings and connections. This Refund Policy outlines the terms and
                        conditions regarding refunds for services offered on the iPozzy platform.

                        1. Refund Eligibility
                        Refunds are offered for subscription fees or listings only under specific conditions. The
                        following terms apply:

                        Subscription-Based Fees: If you pay a subscription fee to list a property, refunds will not be
                        issued once the listing is live and visible on the platform. However, if the listing is not
                        activated or if there is an issue with the service that is not resolved within a reasonable time
                        frame, you may be eligible for a refund.

                        Listing Fees: Listing fees are non-refundable once the property is successfully listed on
                        iPozzy. If the listing contains incorrect information due to a technical error or issue on our
                        end, we may offer a partial or full refund based on the circumstances.

                        2. Requesting a Refund
                        To request a refund, please contact our support team via email or through the contact form
                        available on the platform. Please include the following details in your refund request:

                        Your name and account information.
                        Details of the listing or service you are requesting a refund for.
                        A description of the issue you encountered that qualifies for a refund.
                        We aim to respond to refund requests within 5–7 business days.

                        3. Refund Processing
                        Once we have received your refund request and assessed it according to our policy, we will
                        inform you of the status. If your request is approved, we will process the refund via the
                        original payment method used. Refunds may take 7–14 business days to reflect in your account,
                        depending on your payment provider.

                        4. Refund Limitations
                        Refunds may not be issued in the following cases:

                        If the listing is live and visible on the platform, and the user decides to cancel or remove it.
                        If there is a change in your decision to use the platform and no technical issues were
                        encountered.
                        If the subscription or listing fee has already been processed and no service-related issue
                        exists.
                        If you did not follow the guidelines or terms of use set by iPozzy.
                        5. Service Modifications
                        We reserve the right to modify, suspend, or discontinue services at any time without prior
                        notice. In the event of a service discontinuation, you may be eligible for a refund, depending
                        on the specific situation.

                        6. Changes to This Refund Policy
                        We may update this Refund Policy periodically to reflect changes in our services or legal
                        requirements. Any changes will be posted on this page, and the updated policy will apply to any
                        services provided after the publication date.

                        7. Contact Us
                        If you have any questions about this Refund Policy or need assistance with your refund request,
                        please contact us at:

                        Email: [your email address]
                        Phone: [your phone number]
                        Address: [your physical address]</p>
                </div>
            </div>
        </div>
    </div>

    <!-- User Agreement Modal -->
    <div class="modal fade" id="userAgreementModal" tabindex="-1" aria-labelledby="userAgreementModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userAgreementModalLabel">User Agreement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This User Agreement (the "Agreement") is a legal agreement between you (the "User" or "you") and
                        iPozzy (the "Platform," "we," or "us") for the use of our platform, including all services,
                        features, content, and tools provided by iPozzy. By using the iPozzy platform, you agree to
                        comply with the terms and conditions outlined in this Agreement.

                        1. Acceptance of Terms
                        By accessing or using iPozzy, you agree to be bound by this Agreement and our Privacy Policy,
                        Cookie Policy, and Refund Policy. If you do not agree to these terms, you must not use our
                        platform.

                        2. Eligibility
                        You must be at least 18 years old and legally capable of entering into binding contracts to use
                        iPozzy. By using the platform, you confirm that you meet these requirements.

                        3. Account Registration
                        To use certain features of iPozzy, including listing properties and managing your account, you
                        must create an account. When registering, you agree to provide accurate, current, and complete
                        information. You are responsible for maintaining the confidentiality of your account credentials
                        and are liable for all activities that occur under your account.

                        4. User Conduct
                        You agree to use iPozzy in a lawful manner and adhere to the following:

                        You will not engage in any activities that harm, disrupt, or interfere with the normal operation
                        of the platform.
                        You will not use iPozzy to post, upload, or transmit any illegal, offensive, or inappropriate
                        content.
                        You will not attempt to gain unauthorized access to the platform, other user accounts, or the
                        servers and networks connected to iPozzy.
                        We reserve the right to suspend or terminate your account if you violate these terms.

                        5. Property Listings
                        When listing a property on iPozzy, you agree to:

                        Provide accurate and truthful information about the property.
                        Not post misleading or deceptive listings.
                        Not engage in any form of fraudulent or unlawful activity.
                        iPozzy reserves the right to remove any listings that violate these guidelines or the terms of
                        this Agreement.

                        6. Subscription and Payment
                        Some features of iPozzy, including property listings, may require payment. By subscribing to
                        paid services, you agree to pay the applicable fees and charges as described on the platform.
                        All payments are processed securely, and you agree to provide accurate billing information.

                        7. Privacy and Data Collection
                        We value your privacy and collect and process personal data in accordance with our Privacy
                        Policy. By using iPozzy, you consent to the collection and use of your data as outlined in our
                        Privacy Policy.

                        8. Intellectual Property
                        All content and materials available on iPozzy, including text, graphics, logos, and software,
                        are the property of iPozzy and are protected by copyright and other intellectual property laws.
                        You agree not to copy, distribute, or use any of our content without permission.

                        9. Third-Party Links and Services
                        iPozzy may contain links to third-party websites or services that are not owned or controlled by
                        iPozzy. We are not responsible for the content or practices of these third parties. By accessing
                        these links, you acknowledge and agree that we are not liable for any damages or losses incurred
                        from the use of third-party services.

                        10. Disclaimers and Limitation of Liability
                        iPozzy is provided "as is" without warranties of any kind, express or implied. We do not
                        guarantee the availability, accuracy, or reliability of the platform. To the fullest extent
                        permitted by law, iPozzy is not liable for any damages arising from your use of the platform,
                        including but not limited to direct, indirect, incidental, or consequential damages.

                        11. Indemnification
                        You agree to indemnify, defend, and hold harmless iPozzy, its affiliates, officers, employees,
                        and agents from and against any claims, damages, liabilities, and expenses arising from your use
                        of the platform or your breach of this Agreement.

                        12. Termination
                        We reserve the right to suspend or terminate your access to iPozzy at any time, without notice,
                        for any reason, including if we believe you have violated the terms of this Agreement.

                        13. Amendments
                        iPozzy reserves the right to modify or update this Agreement at any time. Any changes will be
                        posted on this page, and the updated Agreement will be effective immediately upon posting. Your
                        continued use of iPozzy after such changes constitutes your acceptance of the modified
                        Agreement.

                        14. Governing Law
                        This Agreement will be governed by and construed in accordance with the laws of the jurisdiction
                        in which iPozzy operates, without regard to its conflict of law principles.

                        15. Contact Information
                        If you have any questions or concerns about this User Agreement, please contact us at:

                        Email: [your email address]
                        Phone: [your phone number]
                        Address: [your physical address]</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>




</body>

</html>
