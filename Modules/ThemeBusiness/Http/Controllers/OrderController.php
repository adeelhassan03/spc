<?php

namespace Modules\ThemeBusiness\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Mail\OrderReceived;
use Illuminate\Routing\Controller;
use App\Settings\ContactSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store order information and send an email to admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {

            $orderData = $request->only([
                'first_name',
                'last_name',
                'areYou',
                'shop_phone_area_code',
                'shop_phone_number',
                'email',
                'company_name',
                'address',
                'street',
                'state_province_region',
                'postal_zip_code',
                'country',
                'buy_parts_from',          
                'captcha',
            ]);
            $alignmentWorkType = $request->input('alignment_work_type', []);
            $orderData['alignment_work_type'] = $alignmentWorkType;
            $order = Order::create($orderData);
            $generalSettings = new GeneralSettings();
            $logo = $generalSettings->logo;
            $contactSettings = new ContactSettings();
            $email_prim = $contactSettings->email_primary;
            $email_second = $contactSettings->email_secondary;
            $logoUrl = asset('public/assets/images/logo/' . $logo);
            Mail::to([$email_prim, $email_second])->queue(new OrderReceived($orderData,$logoUrl));
    
            return redirect()->back()->with('sticky_success', 'Message Sent successfully.');
        } catch (Exception $e) {
            Log::error('Failed to store order. Error: ' . $e->getMessage());
            return redirect()->back()->with('sticky_error', 'Failed to send message.');
        }
    }
    
}
