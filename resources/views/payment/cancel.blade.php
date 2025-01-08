<x-app-layout>
    <h1>Payment Cancelled</h1>
    <p>Your payment was not successful. Please try again.</p>
    <script>
        // Redirect to the 'property.create' route after 1 second
        setTimeout(function() {
            window.location.href = "{{ route('home') }}";
        }, 1000); // 1000 milliseconds = 1 second
    </script>
</x-app-layout>
