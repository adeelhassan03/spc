<?php

namespace Modules\ThemeBusiness\Http\Controllers;

use Exception;
use App\Models\Contact;
use App\Mail\ContactSent;
use Illuminate\Routing\Controller;
use App\Settings\ContactSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Modules\ThemeBusiness\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    /**
     * Contact us page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('themebusiness::frontend.pages.contact');
    }

    /**
     * Store contact information and send an email to admin.
     *
     * @param ContactRequest $request
     * @return void
     */
    public function store(ContactRequest $request): JsonResponse
{
    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    // $contact->subject = $request->subject;
    $contact->send_catalog = $request->send_catalog;
    $contact->company = $request->company_name;
    $contact->street_address = $request->street_address;
    $contact->street_address_line2 = $request->street_address_line2;
    $contact->city = $request->city;
    $contact->state_province_region = $request->state_province_region;
    $contact->postal_zip_code = $request->postal_zip_code;
    $contact->country = $request->country;
    $contact->status = 0;
    $contact->save();
    
    try {
        $generalSettings = new GeneralSettings();
        $logo = $generalSettings->logo;
        $contactSettings = new ContactSettings();
        $email_prim = $contactSettings->email_primary;
        $email_second = $contactSettings->email_secondary;
        
        $logoUrl = asset('public/assets/images/logo/' . $logo);
        
        Log::info('Logo URL: ' . $logoUrl); 
        Mail::to([$email_prim, $email_second])->queue(new ContactSent($contact,$logoUrl));
        Log::info('Email sent successfully to ' . $email_prim . ' and ' . $email_second);
       
    } catch (Exception $e) {
        Log::error('Failed to instantiate ContactSettings. Error: ' . $e->getMessage());
        Log::debug('Something went wrong when sending email. Error' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Failed to send email.']);
    }

    return response()->json([
        'success' => true,
        'message' => 'Contact stored successfully.',
    ]);
}
}
