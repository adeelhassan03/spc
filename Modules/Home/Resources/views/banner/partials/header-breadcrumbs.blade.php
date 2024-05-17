<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.banner.create'))
                    Add Banner Image
                    @elseif(Route::is('admin.banner.edit'))
                    Edit Banner
                    @elseif(Route::is('admin.banner.index'))
                    Banner List 
                    @elseif(Route::is('admin.banner.show'))
                    View Banner
                    @elseif(Route::is('admin.banner.trashed'))
                    Trashed Service
               @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        
                        @if (Route::is('admin.banner.index'))
                            <li class="breadcrumb-item active" aria-current="page">Banner List</li>
                        @elseif(Route::is('admin.banner.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Banner</li>
                        @elseif(Route::is('admin.banner.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
                        @elseif(Route::is('admin.banner.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Banner</li>
                        @endif



                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
