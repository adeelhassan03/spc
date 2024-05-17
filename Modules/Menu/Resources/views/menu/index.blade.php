@extends('backend.layouts.master')

@section('title')
    @include('menu::menu.partials.title')
@endsection

@section('admin-content')
    <div class="container-fluid">
        @include('menu::menu.partials.header-breadcrumbs')
        @include('menu::menu.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="menu_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Category</th>
                        <!-- <th>Image</th> -->
                        <th>Status</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
      var ajaxURL = "{{ route('admin.menu.index') }}";
            @if(Route::is('admin.menu.trashed'))
                ajaxURL = "{{ route('admin.menu.trashed') }}";
            @endif
    $('#menu_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'slug', name: 'link'},
            {data: 'category', name: 'category'},
            // {data: 'image', name: 'image'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
