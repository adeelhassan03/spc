<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.menu.index'))
                    Menu List
                @elseif(Route::is('admin.menu.create'))
                    Create New Menu
                @elseif(Route::is('admin.menu.edit'))
                    Edit Menu <span class="badge badge-info"></span>
                @elseif(Route::is('admin.menu.show'))
                    View Menu <span class="badge badge-info"></span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.menu.edit', $menu->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.menu.index'))
                            <li class="breadcrumb-item active" aria-current="page">Menu List</li>
                        @elseif(Route::is('admin.menu.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Menu</li>
                        @elseif(Route::is('admin.menu.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
                        @elseif(Route::is('admin.menu.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Menu</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
