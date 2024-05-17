@extends('backend.layouts.master')

@section('title')
@include('backend.pages.catalogMessages.partials.title')
@endsection

@section('admin-content')
@include('backend.pages.catalogMessages.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.catalogMessages.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="orders_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
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
    const ajaxURL = "{{ route('admin.catalogMessages.index') }}"; 
    $('table#orders_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: function(row) {
                return row.first_name + ' ' + row.last_name;
            }, name: 'first_name'},
            {data: 'email', name: 'email'},
            {data: 'shop_phone_number', name: 'phone'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });

    $(document).on('click', '.delete-order', function () {
        var deleteRoute = $(this).data('delete-route');
        var orderId = $(this).data('order-id');
        if (confirm('Are you sure you want to delete this Message?')) {
            $.ajax({
                type: 'DELETE',
                url: deleteRoute,
                data: {
                    _token: '{{ csrf_token() }}',
                    order_id: orderId
                },
                success: function (data) {
                    if (data.confirm) {
                        if (confirm(data.message)) {
                            // If confirmed, reload the page to reflect the changes
                            window.location.reload();
                        }
                    }
                }
            });
        }
    });
    </script>
@endsection
