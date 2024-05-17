<?php

namespace Modules\ThemeBusiness\Http\Controllers;

use Exception;
use App\Models\FaqMessages;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Contact;
use App\Mail\FaqReceived;
use App\Settings\ContactSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class FaqsMessagesController extends Controller
{
    /**
     * Store FAQ message information.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
           
            $faqData = [
                'f-name' => $request->input('f-name'),
                'l-name' => $request->input('l-name'),
                'email' => $request->input('email'),
                'company_name' => $request->input('company_name'),
                'question' => $request->input('question'),
            ];

            $faqMessage = FaqMessages::create($faqData);
            $generalSettings = new GeneralSettings();
            $logo = $generalSettings->logo;
            $contactSettings = new ContactSettings();
            $email_prim = $contactSettings->email_primary;
            $email_second = $contactSettings->email_secondary;
            $logoUrl = asset('public/assets/images/logo/' . $logo);
            Mail::to([$email_prim, $email_second])->queue(new FaqReceived($faqData,$logoUrl));
            
            return redirect()->back()->with('sticky_success', 'Message sent successfully.');
        } catch (Exception $e) {
            Log::error('Failed to send message. Error: ' . $e->getMessage());
            return redirect()->back()->with('sticky_error', 'Failed to send message.');
        }
    }
}
