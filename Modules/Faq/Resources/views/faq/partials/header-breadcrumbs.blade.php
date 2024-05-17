<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.faq.index'))
                    Faq List
                @elseif(Route::is('admin.faq.create'))
                    Create New Faq
                @elseif(Route::is('admin.faq.edit'))
                    Edit Faq <span class="badge badge-info"></span>
                @elseif(Route::is('admin.catalog.show'))
                    View Faq <span class="badge badge-info"></span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.faq.edit', $faq->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.faq.index'))
                            <li class="breadcrumb-item active" aria-current="page">Faq List</li>
                        @elseif(Route::is('admin.faq.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Faq List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Faq</li>
                        @elseif(Route::is('admin.faq.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Faq List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Faq</li>
                        @elseif(Route::is('admin.faq.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Faq List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Faq</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
