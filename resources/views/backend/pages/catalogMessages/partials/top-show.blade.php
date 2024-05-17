
<!-- ============================================================== -->
<!-- Top Show Data of List Contact -->
<!-- ============================================================== -->
<div class="row mt-1">
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">{{ $total_messages }}</h1>
                <h6 class="text-white">Total Messages</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white">{{ $unread_messages }}</h1>
                <h6 class="text-white">Unread Messages</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">{{ $read_messages }}</h1>
                <h6 class="text-white">Read Messages</h6>
            </div>
        </div>
    </div>
</div>