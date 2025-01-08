<x-app-layout>
    <h1>Payment Successful!</h1>
    <p>Your payment has been processed successfully.</p>
    <script>
        // Redirect to the 'property.create' route after 1 second
        setTimeout(function() {
            window.location.href = "{{ route('property.create') }}";
        }, 1000); // 1000 milliseconds = 1 second
    </script>
</x-app-layout>
