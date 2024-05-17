@extends('backend.layouts.master')

@section('title')
    @include('menu::menu.partials.title')
@endsection

@section('admin-content')
    @include('menu::menu.partials.styles')
    @include('menu::menu.partials.header-breadcrumbs')
    @include('backend.layouts.partials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('backend.layouts.partials.messages')

        

                        @if (!is_null($faqItem))
                            <div class="form-body pdf-details">
                                <h4 class="card-title bg-secondary text-white p-2">PDF Details</h4>
                                <div class="card-body pdf-file">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pdf_file">PDF File</label>
                                                <br>
                                                <a href="{{ asset('storage/' . $faqItem->pdf) }}" target="_blank"> {{ basename($faqItem->pdf) }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pdf_status">PDF Status</label>
                                                <br>
                                                {{ $faqItem->status === 'Active' ? 'Active' : 'Inactive' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-actions">
                            <div class="card-body">
                                <a href="{{ route('admin.faq.edit', $faqItem->id) }}" class="btn btn-success">
                                    <i class="fa fa-edit"></i> Edit Now
                                </a>
                                <a href="{{ route('admin.faq.index') }}" class="btn btn-dark ml-2">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
