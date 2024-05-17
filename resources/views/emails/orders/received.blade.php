@component('mail::message')


## New Catalog Order Form Submitted

---

## Order Information:
- **First Name:** {{ $orderData['first_name'] ?? 'N/A' }}
- **Last Name:** {{ $orderData['last_name'] ?? 'N/A' }}
- **Are You a:** {{ $orderData['are_you'] ?? 'N/A' }}
- **Phone Number (Shop):** {{ $orderData['shop_phone_number'] ?? 'N/A' }}

- **Company Name:** {{ $orderData['company_name'] ?? 'N/A' }}
- **Address:** {{ $orderData['address'] ?? 'N/A' }}
- **Street:** {{ $orderData['street'] ?? 'N/A' }}
- **State/Province/Region:** {{ $orderData['state_province_region'] ?? 'N/A' }}
- **Postal/ZIP Code:** {{ $orderData['postal_zip_code'] ?? 'N/A' }}
- **Country:** {{ $orderData['country'] ?? 'N/A' }}
- **Buy Parts From:** {{ $orderData['buy_parts_from'] ?? 'N/A' }}
- **Alignment Work On:**
  @if(isset($orderData['alignment_work_type']))
    @foreach($orderData['alignment_work_type'] as $alignment)
      - {{ $alignment }}
    @endforeach
  @else
    N/A
  @endif

---

Thanks,<br>
{{ config('app.name') }}

@endcomponent
