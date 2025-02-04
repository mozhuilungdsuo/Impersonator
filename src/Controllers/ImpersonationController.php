<?php
namespace Mozhuilungdsuo\Impersonator\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Mozhuilungdsuo\Impersonator\Models\ImpersonationLog;
use App\Models\User;

class ImpersonationController extends Controller
{
    public function impersonateUser($id)
    {
        $current_user = Auth::user();
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        if ($user->id == $current_user->id) {
            return redirect()->back()->with('error', 'You cannot impersonate yourself.');
        }
        if ($user->email == 'sadmin@credit.com') {
            return redirect()->back()->with('error', 'You cannot impersonate a Super Admin.');
        }

        session()->put('impersonator', $current_user->id);
        Auth::login($user);

        ImpersonationLog::create([
            'original_user_id' => $current_user->id,
            'impersonated_user_id' => $user->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'action' => 'login',
        ]);

        return redirect()->route('dashboard')->with('success', "You are now impersonating {$user->name}.");
    }

    public function stopImpersonating()
    {
        // if (!session()->has('impersonator')) {
        //     return redirect()->route('dashboard')->with('error', 'No impersonation session found.');
        // }

        $current_user = Auth::user();
        $impersonator_id = session()->get('impersonator');
        $impersonator = User::find($impersonator_id);

        if (!$impersonator) {
            return redirect()->route('dashboard')->with('error', 'Original user not found.');
        }

        session()->forget('impersonator');
        Auth::login($impersonator);

        ImpersonationLog::create([
            'original_user_id' => $impersonator->id,
            'impersonated_user_id' => $current_user->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'action' => 'logout',
        ]);

        return redirect()->route('dashboard')->with('success', 'You are back to your account.');
    }
}