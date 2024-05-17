@component('mail::message')

# You've recieved an email from **{{ $contact->name }}**

---

## Message:
{{ $contact->message }}
---

## Customer Information:
- **Email:** [{{ $contact->email }}](mailto:{{ $contact->email }})
- **Phone:** [{{ $contact->phone }}](tel:{{ $contact->phone }})
- **Send Catalog:** {{ $contact->send_catalog ? 'Yes' : 'No' }}
- **Company:** {{ $contact->company }}
- **Street Address:** {{ $contact->street_address }}
- **Street Address Line 2:** {{ $contact->street_address_line2 }}
- **City:** {{ $contact->city }}
- **State/Province/Region:** {{ $contact->state_province_region }}
- **Postal/ZIP Code:** {{ $contact->postal_zip_code }}
- **Country:** {{ $contact->country }}

---

Thanks,<br>
{{ config('app.name') }}

@endcomponent
