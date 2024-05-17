@extends('backend.layouts.master')

@section('title')
    @include('catalog::partials.title')
@endsection

@section('admin-content')
@include('catalog::partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.catalog.update', $catalog->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="title">Catalog Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $catalog->title }}" placeholder="Enter Title" required=""/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="part_no">Part Number <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="part_no" name="part_no" value="{{ $catalog->part_no }}" placeholder="Enter Part Number" required=""/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $catalog->status === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ $catalog->status === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Catalog Description <span class="optional">(optional)</span></label>
                                    <textarea class="form-control tinymce_advance" id="description" name="description" rows="4" placeholder="Enter Description">{{ $catalog->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Catalog Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control" id="image" name="image"/>
                                    @if($catalog->image)
                                        <img src="{{ asset('public/assets/images/catalog/' . $catalog->image) }}" alt="Catalog Image" class="img-fluid mt-2" style="max-width: 200px;"/>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="pdf">Catalog PDF <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control" id="pdf" name="pdf"/>
                                    @if($catalog->pdf)
                                        <p>Current PDF: <a href="{{ asset('public/assets/pdf/catalog/' . $catalog->pdf) }}" target="_blank">{{ $catalog->pdf }}</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('admin.catalog.index') }}" class="btn btn-dark">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
   
@endsection
