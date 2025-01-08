@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                {{-- <img src="https://media.istockphoto.com/id/872511562/vector/magnifying-glass-with-house-illustration.jpg?s=612x612&w=0&k=20&c=WMS4X3obc5w48mMibC0lCdcEl1SxkkGJ6DgbDiN_h6E=//img/lolo.jpg" --}}
                class="logo" alt="Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
