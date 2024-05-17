@extends('backend.layouts.master')

@section('title')
    @include('home::banner.partials.title')
@endsection

@section('admin-content')
    @include('home::banner.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="banner_image"> Banner Image </label>
                        <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="banner_image" name="banner_image" data-default-file="{{ $banner->image_path != null ? asset('public/assets/images/banner/'.$banner->image_path) : null }}"/>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-dark">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

