@if(Route::is('admin.banner.create'))
Edit Banner Image
@elseif (Route::is('admin.banner.index'))
Banners
@elseif(Route::is('admin.banner.edit'))
Edit Banner 
@elseif(Route::is('admin.banner.show'))
View Banner
@elseif(Route::is('admin.banner.trashed'))
Trashed Service
@endif
| Admin Panel -
{{ config('app.name') }}
