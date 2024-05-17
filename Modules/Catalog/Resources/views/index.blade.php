@extends('backend.layouts.master')

@section('title')
    @include('service::services.partials.title')
@endsection

@section('admin-content')
    @include('catalog::partials.header-breadcrumbs')
    <div class="container-fluid">
    @include('catalog::partials.top-show')
        @include('backend.layouts.partials.messages')  
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="catalog_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Part No.</th>
                        <th>Featured Image</th>
                        <!-- <th>Catalog PDF</th> -->
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
    const ajaxURL = "<?php echo Route::is('admin.catalog.trashed' ? 'catalog/trashed/view' : 'catalog') ?>";
    $('table#catalog_table').DataTable({
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
            {data: 'part_no', name: 'part_no'},
            {data: 'image', name: 'image'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
