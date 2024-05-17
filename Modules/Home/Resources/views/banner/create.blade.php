@extends('backend.layouts.master')

@section('title')

@include('home::banner.partials.title')

@endsection

@section('admin-content')
    @include('home::banner.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate data-parsley-focus="first">
                @csrf 
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="banner">
                                        Banner Image &nbsp;
                                        <i class="fa fa-info-circle" data-toggle="tooltip"
                                            title="Only png jpg jpeg webp svg type
                                        images are allowed. Max image size 2 MB."></i>
                                    </label>
                                   
                                    <input type="file" class="form-control dropify" data-height="70"
                                        data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image"
                                        value="" />
                                </div>

                                
                            </div> 
                        </div>

                        <div class="row ">       
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                            Save</button>
                                        <a href="/admin" class="btn btn-dark">Cancel</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection


