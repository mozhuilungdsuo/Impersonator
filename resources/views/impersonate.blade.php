@if (Config::get('impersonate.enabled') == true)
    <a href="{{ route('impersonate.start', ['id' => $userId]) }}" class="imp-btn">
        Impersonate User
    </a>
@endif
