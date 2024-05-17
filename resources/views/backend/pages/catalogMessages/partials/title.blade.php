@if (Route::is('admin.catalogMessages.index'))
Catalog Order Messages
@elseif (Route::is('admin.catalogMessages.show'))
View Messages
@endif
| Admin Panel -
{{ config('app.name') }}
