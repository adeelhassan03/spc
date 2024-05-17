@extends('backend.layouts.master')

@section('title')
    @include('faq::faq.partials.title')
@endsection

@section('admin-content')
    @include('faq::faq.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate data-parsley-focus="first">
                @csrf 
                <div class="form-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label" for="Category">Select Category <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="Category" name="category" required>
                                        <option value="Part Number">FAQ By Part Number</option>
                                        <option value="Vehicle" >FAQ By Vehicle</option>
                                        <option value="Subject" >FAQ By Subject</option>
                                    </select>
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
                                    <label class="control-label" for="pdf">Upload PDF<span class="required"></span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="pdf" name="pdf[]" multiple />
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check"></i> Save
                                        </button>
                                        <a href="{{ route('admin.faq.index') }}" class="btn btn-dark">Cancel</a>
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







