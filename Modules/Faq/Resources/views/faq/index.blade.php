@extends('backend.layouts.master')

@section('title')
    @include('faq::faq.partials.title')
@endsection

@section('admin-content')
    

    <div class="container-fluid">
    @include('faq::faq.partials.header-breadcrumbs')
        @include('faq::faq.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="faq_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>PDF</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    // const ajaxURL = "<?php echo Route::is('admin.faq.trashed') ? 'admin/faq/trashed/view' : 'faq' ?>";
    const baseUrl = "{{ url('/') }}";
    const ajaxURL = "{{ Route::currentRouteName() === 'admin.faq.trashed' ? url('admin/faq/trashed/view') : url('admin/faq') }}";
    $('table#faq_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'category', name: 'category'},
            {data: 'status', name: 'status'},
            {
                data: 'pdf',
                name: 'pdf',
                render: function(data, type, full, meta) {
                    var pdfPath = data; 
                    var pdfBasename = pdfPath.split('/').pop(); 
                    return pdfBasename;
                }},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
