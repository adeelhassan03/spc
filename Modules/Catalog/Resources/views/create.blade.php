@extends('backend.layouts.master')

@section('title')
    @include('catalog::partials.title')
@endsection

@section('admin-content')
    @include('catalog::partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.catalog.store') }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate data-parsley-focus="first">
                @csrf 
                <div class="form-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="title">Title <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}" placeholder="Enter Title" required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="part_no">Part No. <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="part_no" name="part_no"
                                        value="{{ old('part_no') }}" placeholder="Enter Part No." required />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Catalog Featured Image <span
                                            class="required">*</span></label>
                                    <input type="file" class="form-control dropify" data-height="70"
                                        data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="pdf">Catalog PDF<span class="required"></span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="pdf" id="pdf" name="pdf"/>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Catalog Description <span
                                            class="required">*</span></label>
                                    <textarea class="form-control tinymce_advance" id="description"
                                        name="description" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check"></i> Save
                                        </button>
                                        <a href="{{ route('admin.catalog.index') }}" class="btn btn-dark">Cancel</a>
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

