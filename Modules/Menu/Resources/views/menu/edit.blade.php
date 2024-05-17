@extends('backend.layouts.master')

@section('title')
    @include('menu::menu.partials.title')
@endsection

@section('admin-content')
    @include('menu::menu.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.menu.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('PUT')
                <div class="form-body" id="demo">
                    <div class="card-body">
                        <div class="row form-row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="title">Menu Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{ $menuItem->title }}" placeholder="Enter Title" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Menu URL <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="{{ $menuItem->slug }}" placeholder="Enter Link" />
                                </div>
                            </div>
                            <!-- <div class="col-md-2"> -->
                                <div class="form-group">
                                    <!-- <label class="control-label" for="group">Group <span class="required">*</span></label> -->
                                    <input type="hidden" class="form-control menu-group" name="group" value="{{ $menuItem->group }}" placeholder="Enter Group" />
                                </div>
                            <!-- </div> -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="hidden" name="category" value="Menu">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" name="status" required>
                                        <option value="Active" {{ $menuItem->status === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $menuItem->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
                        @foreach($subMenus as $index => $subMenu)
                            <div class="form-row" data-index="{{ $index }}">
                                <input type="hidden" name="sub_menus[{{ $index }}][id]" value="{{ $subMenu->id }}"> <!-- Include ID for tracking -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="sub_menus[{{ $index }}][title]">Sub Menu Title <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="sub_menus[{{ $index }}][title]" name="sub_menus[{{ $index }}][title]" value="{{ $subMenu->title }}" required />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="sub_menus[{{ $index }}][slug]">Sub Menu URL <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="sub_menus[{{ $index }}][slug]" name="sub_menus[{{ $index }}][slug]" value="{{ $subMenu->slug }}" />
                                    </div>
                                </div>

                                <!-- <div class="col-md-2"> -->
                                    <div class="form-group">
                                        <!-- <label class="control-label" for="sub_menus[{{ $index }}][group]">Sub Menu Group <span class="required">*</span></label> -->
                                        <input type="hidden" class="form-control" id="sub_menus[{{ $index }}][group]" name="sub_menus[{{ $index }}][group]" value="{{ $subMenu->group }}" required />
                                    </div>
                                <!-- </div> -->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="sub_menus[{{ $index }}][status]">Sub Menu Status <span class="required">*</span></label>
                                        <select class="form-control" id="sub_menus[{{ $index }}][status]" name="sub_menus[{{ $index }}][status]" required>
                                            <option value="Active" {{ $subMenu->status == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ $subMenu->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 align-self-end">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger remove-btn"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div id="deleted-sub-menus" style="display: none;"></div>
                        </div>
                        <div id="deleted-sub-menus" style="display: none;"></div>

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
        $(".clone-btn").on("click", function() {
            var lastRow = $('.sub-menu-fields .form-row:last');
            var clonedRow = lastRow.clone();
            var newIndex = $('.sub-menu-fields .form-row').length;
            clonedRow.find('input, select').each(function () {
                var name = $(this).attr('name');
                var id = $(this).attr('id');

                if (name) {
                    var newName = name.replace(/\[\d+\]/g, '[' + newIndex + ']');
                    $(this).attr('name', newName);
                }

                if (id) {
                    var newId = id.replace(/\[\d+\]/g, '[' + newIndex + ']');
                    $(this).attr('id', newId);
                }
                if ($(this).attr('type') === 'text' || $(this).is('select')) {
                    $(this).val('');
                }
                if ($(this).attr('name').includes('[id]')) {
                    $(this).val(null);
                }
            });

            clonedRow.appendTo('.sub-menu-fields');
        });

        $(document).on("click", ".remove-btn", function() {
            var subMenuId = $(this).closest('.form-row').find('input[name*="[id]"]').val(); 
            if (subMenuId) {
                $('#deleted-sub-menus').append('<input type="hidden" name="deleted_sub_menus[]" value="' + subMenuId + '">');
            }
            $(this).closest('.form-row').remove();
        });
    });
</script>




