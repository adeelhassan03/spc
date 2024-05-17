@if (Route::is('admin.faq.index'))
Faq List
@elseif(Route::is('admin.faq.create'))
Create New Faq
@elseif(Route::is('admin.faq.edit'))
Edit Faq
@elseif(Route::is('admin.faq.show'))
View Faq
@endif
| Admin Panel -
{{ config('app.name') }}
