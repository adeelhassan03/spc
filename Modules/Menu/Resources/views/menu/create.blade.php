@extends('backend.layouts.master')

@section('title')
    @include('menu::menu.partials.title')
@endsection

@section('admin-content')
    @include('menu::menu.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate data-parsley-focus="first">
                @csrf
                <div class="form-body" id="demo">
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="title">Menu Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter Title" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Menu URL <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" placeholder="Enter Link" />
                                </div>
                            </div>
                            <!-- <div class="col-md-3"> -->
                                <div class="form-group">
                                    <label class="control-label" for="group">Group <span class="required">*</span></label>
                                    <input type="text" class="form-control menu-group" name="group"  placeholder="Enter Group" />
                                </div>
                            <!-- </div> -->
                            <div class="col-md-3">
                                <div class="form-group">
                               
                                    <input type="hidden" name="category" value="Menu">
                                    
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" name="status" required>
                                        <option value="Active" {{ old('status') === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status') === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 align-self-end">
                                <div class="form-group">
                                    <div class="hb-btn-box">
                                        <button type="button" class="btn btn-primary clone-btn">Add Sub Menu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sub-menu-fields">
                          
                        </div>
                    
                        <div class="form-actions">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('admin.menu.index') }}" class="btn btn-dark">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script src="https://spc.devstags.com/public/public/modules/spc/js/jquery.js"></script>
<script src="https://spc.devstags.com/public/public/modules/spc/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('.menu-group').closest('.form-group').hide();
    var uniqueID = generateUniqueID();
    $('.menu-group').val(uniqueID);

    $(".clone-btn").on("click", function() {
        var clonedRow = $(this).closest('.form-row').clone();

        clonedRow.find('label[for="title"]').text('Sub Menu Title');
        clonedRow.find('label[for="slug"]').text('Sub Menu URL');
        clonedRow.find('label[for="group"]').text('Sub Menu Group');
        clonedRow.find('label[for="status"]').text('Sub Menu Status'); 
        clonedRow.find('.menu-group').val(uniqueID);
        clonedRow.find('input[name="category"]').val("Sub Menu");

        var newIndex = $('.sub-menu-fields .form-row').length; 
        clonedRow.find('input[name="category"]').attr("name", "category[" + newIndex + "]"); 

        clonedRow.find('input[type="text"]').each(function(index, element) {
            var fieldName = $(this).attr('name');
            var newName = fieldName.replace(/_\d+$/, "") + "_" + newIndex;
            $(this).attr('name', newName);
        });
        clonedRow.find('select[name="status"]').attr('name', 'sub_menu_status_' + newIndex);

        clonedRow.appendTo('.sub-menu-fields');

        var removeButton = '<button type="button" class="btn btn-danger remove-btn"><i class="fas fa-times"></i></button>';
        clonedRow.find('.hb-btn-box').append(removeButton);
        clonedRow.find('.clone-btn').remove();
    });

    $(document).on("click", ".remove-btn", function() {
        $(this).closest('.form-row').remove();
    });

    function generateUniqueID() {
        return 'group_' + Math.random().toString(36).substr(2, 9);
    }
});



    </script>