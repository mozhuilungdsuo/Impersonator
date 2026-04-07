@if (Config::get('impersonate.enabled') == true &&
        in_array(Auth::user()->email, Config::get('impersonate.allowed_emails')))
    <a href="{{ route('impersonate.start', ['id' => $userId]) }}" class="imp-btn">
        Impersonate User
    </a>
@endif
