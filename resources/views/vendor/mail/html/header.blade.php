<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'jobsentra.com')
                <img src="https://i.postimg.cc/6QGJmp92/Job-Sentra.png" class="logo" alt="jobsentra.com">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
