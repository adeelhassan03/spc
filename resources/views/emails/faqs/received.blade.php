@component('mail::message')

## New FAQ Message Submitted

---

## Message Information:
- **First Name:** {{ $faqData['f-name'] ?? 'N/A' }}
- **Last Name:** {{ $faqData['l-name'] ?? 'N/A' }}
- **Email:** {{ $faqData['email'] ?? 'N/A' }}
- **Company Name:** {{ $faqData['company_name'] ?? 'N/A' }}
- **Question:** {{ $faqData['question'] ?? 'N/A' }} 

---

Thanks,<br>
{{ config('app.name') }}

@endcomponent
