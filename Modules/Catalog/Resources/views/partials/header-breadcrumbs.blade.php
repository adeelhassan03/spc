<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.catalog.index'))
                    Catalog List
                @elseif(Route::is('admin.catalog.create'))
                    Create New Catalog
                @elseif(Route::is('admin.catalog.edit'))
                    Edit Catalog <span class="badge badge-info">{{ $catalog->title }}</span>
                @elseif(Route::is('admin.catalog.show'))
                    View Catalog <span class="badge badge-info">{{ $catalog->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.catalog.edit', $catalog->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.catalog.index'))
                            <li class="breadcrumb-item active" aria-current="page">Catalog List</li>
                        @elseif(Route::is('admin.catalog.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.catalog.index') }}">Catalog List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Service</li>
                        @elseif(Route::is('admin.catalog.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.catalog.index') }}">Catalog List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Catalog</li>
                        @elseif(Route::is('admin.catalog.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.catalog.index') }}">Catalog List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Catalog</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
