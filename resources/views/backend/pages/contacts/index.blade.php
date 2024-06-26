@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.contacts.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.contacts.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.contacts.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="contacts_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{-- <th>Country</th> --}}
                        {{-- <th>Company</th> --}}
                        {{-- <th>Subject</th> --}}
                        <th>Message</th>
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
    const ajaxURL = "{{ route('admin.contacts.index') }}"; // Change this to the correct route for fetching contacts

    $('table#contacts_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'message', name: 'message'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });

    $(document).on('click', '.delete-contact', function () {
    var deleteRoute = $(this).data('delete-route');
    var contactId = $(this).data('contact-id');
    if (confirm('Are you sure you want to delete this contact?')) {
        $.ajax({
            type: 'DELETE',
            url: deleteRoute,
            data: {
                _token: '{{ csrf_token() }}',
                contact_id: contactId
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

