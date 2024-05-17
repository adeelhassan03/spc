@if (Route::is('admin.menu.index'))
Menus
@elseif(Route::is('admin.menu.create'))
Create New Menu
@elseif(Route::is('admin.menu.edit'))
Edit Menu 
@elseif(Route::is('admin.menu.show'))
View Menu 
@elseif(Route::is('admin.menu.trashed'))
Trashed Menu
@endif
| Admin Panel -
{{ config('app.name') }}
