@extends('backend.layouts.master')

@section('title', 'Edit FAQ Item')

@section('admin-content')
    @include('faq::faq.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="edit-page">
            <form action="{{ route('admin.faq.update', $faqItem->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="Part Number" {{ $faqItem->category == 'Part Number' ? 'selected' : '' }}>FAQ By Part Number</option>
                        <option value="Vehicle" {{ $faqItem->category == 'Vehicle' ? 'selected' : '' }}>FAQ By Vehicle</option>
                        <option value="Subject" {{ $faqItem->category == 'Subject' ? 'selected' : '' }}>FAQ By Subject</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active" {{ $faqItem->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $faqItem->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pdf">Upload PDF</label>
                    <input type="file" class="form-control" id="pdf" name="pdf">
                    @if($faqItem->pdf)
                        <a href="{{ asset('assets/images/faq_pdfs/' . $faqItem->pdf) }}" target="_blank">{{ basename($faqItem->pdf) }}</a>
                    @endif
                   
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
