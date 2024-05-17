@if (Route::is('admin.catalog.index'))
Catalog List
@elseif(Route::is('admin.catalog.create'))
Create New Catalog
@elseif(Route::is('admin.catalog.edit'))
Edit Catalog
@elseif(Route::is('admin.catalog.show'))
View Catalog
@endif
| Admin Panel -
{{ config('app.name') }}
