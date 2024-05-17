@extends('backend.layouts.master')

@section('title')
    @include('catalog::partials.title')
@endsection

@section('admin-content')
    @include('catalog::partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <div class="form-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <br>
                                {{ $catalog->title }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="part_no">Part No.</label>
                                <br>
                                {{ $catalog->part_no }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="status">Status</label>
                                <br>
                                {{ $catalog->status === 1 ? 'Active' : 'Inactive' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="image">Featured Image</label>
                                <br>
                                @if ($catalog->image)
                                    <img src="{{ asset('public/assets/images/catalog/'.$catalog->image) }}" alt="Image" class="img width-100" />
                                @else
                                    <span class="border p-2">
                                        No Image
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="description">Description</label>
                                <div>
                                    {!! $catalog->description !!}
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="card-body">
                                    <!-- @if (Auth::user()->can('catalog.edit')) -->
                                        <a class="btn btn-success" href="{{ route('admin.catalog.edit', $catalog->id) }}">
                                            <i class="fa fa-edit"></i> Edit Now
                                        </a>
                                        
                                    <!-- @endif -->
                                    <a href="{{ route('admin.catalog.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
