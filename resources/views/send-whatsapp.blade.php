<form action="{{ url('/send-whatsapp') }}" method="POST">
    @csrf
    <label for="phone">Recipient Phone (with country code, e.g. +1234567890):</label>
    <input type="text" name="phone" id="phone" required>

    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>

    <button type="submit">Send Message</button>
</form>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
