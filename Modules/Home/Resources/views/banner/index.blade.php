@extends('backend.layouts.master')

@section('title')
    @include('home::banner.partials.title')
@endsection

@section('admin-content')
    @include('home::banner.partials.header-breadcrumbs')
    <div class="container-fluid">
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="banners_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Banner Image</th> 
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function() {
        $('#banners_table').DataTable({
            dom: 'Blfrtip',
            language: {
                processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."
            },
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.banner.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {
                    data: 'image_path',
                    name: 'banner_image',
                    render: function(data, type, full, meta) {
                        var imagePath = "{{ asset('public/assets/images/banner/') }}" + '/' + data;
                        return "<img src='" + imagePath + "' class='img img-display-list' />";
                    }
                },
                { data: 'action', name: 'action' }
            ],
            buttons: ['excel', 'pdf', 'print'],
            aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        });
    });
    </script>
@endsection
