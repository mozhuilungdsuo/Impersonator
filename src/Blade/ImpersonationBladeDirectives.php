<?php
namespace Mozhuilungdsuo\Impersonator\Blade;


use Illuminate\Support\Facades\Blade;

class ImpersonationBladeDirectives
{
    public static function register()
    {
        Blade::directive('impersonateButton', function ($userId) {
            return "<?php echo view('vendor.impersonate.impersonate', ['userId' => $userId])->render(); ?>";
        });
    }
}