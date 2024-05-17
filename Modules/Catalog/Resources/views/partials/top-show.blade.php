<!-- ============================================================== -->
<!-- Top Show Data of Catalog List Service -->
<!-- ============================================================== -->
<div class="row mt-1">
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='{{ route('admin.catalog.index') }}'">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">{{ $count_catalogs }}</h1>
                <h6 class="text-white">Total Catalogs</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='{{ route('admin.catalog.index') }}'">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">{{ $count_active_catalogs }}</h1>
                <h6 class="text-white">Active Catalogs</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer" onclick="location.href='{{ route('admin.catalog.trashed') }}'">
        <div class="card card-hover">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ $count_catalogs - $count_active_catalogs }} / {{ $count_trashed_catalogs }} </h1>
                <h6 class="text-white">Inactive/Trashed Catalogs</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    @if (Auth::user()->can('service.create'))
        <div class="col-md-6 col-lg-3 col-xlg-3 pointer" onclick="location.href='{{ route('admin.catalog.create') }}'">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">
                        <i class="fa fa-plus-circle"></i>
                    </h1>
                    <h6 class="text-white">Create New Catalog</h6>
                </div>
            </div>
        </div>
    @endif

</div>
