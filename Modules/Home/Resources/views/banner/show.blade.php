@extends('backend.layouts.master')

@section('title')
    @include('home::banner.partials.title')
@endsection

@section('admin-content')
    @include('home::banner.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <div class="form-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="banner_image">Banner Image</label>
                                <br>
                                @if ($banner->image_path != null)
                                    <img src="{{ asset('public/assets/images/banner/'.$banner->image_path) }}" alt="Banner Image" class="img" />
                                @else
                                    <span class="border p-2">
                                        No Banner Image
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="card-body">
                                        <a class="btn btn-success" href="{{ route('admin.banner.edit', $banner->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                    <a href="{{ route('admin.banner.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

