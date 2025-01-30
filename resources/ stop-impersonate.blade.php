

@if(session()->has('impersonator'))
    <div style="position: fixed; bottom: 20px; right: 20px;">
        <a href="{{ route('impersonate.stop') }}" style="background: red; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
            Stop Impersonation
        </a>
    </div>
@endif