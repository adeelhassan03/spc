@if (Route::is('admin.faqMessages.index'))
Faq Messages
@elseif (Route::is('admin.faqMessages.show'))
View Messages
@endif
| Admin Panel -
{{ config('app.name') }}
