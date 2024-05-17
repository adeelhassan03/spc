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
            <div class="card ">
                <!-- <div class="card-header text-white">
                    
                </div> -->
                <div class="card-body">
                    @include('backend.layouts.partials.messages')

                    <h4 class="card-title bg-secondary text-white p-2">Menu Details</h4>

                    <div class="form-body">
                        <div class="card-body menu-details">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Menu Title</label>
                                        <br>
                                        {{ $menu->title }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="slug">Menu URL</label>
                                        <br>
                                        {{ $menu->slug }}
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <br>
                                        {{ $menu->status === 'Active' ? 'Active' : 'Inactive' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($subMenus->isNotEmpty())
                    <div class="form-body sub-menu-details">
                        <h4 class="card-title bg-secondary text-white p-2">Sub Menus</h4>
                        @foreach ($subMenus as $subMenu)
                        <div class="card-body sub-menu">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sub_menu_title{{ $subMenu->id }}">Sub Menu Title</label>
                                        <br>
                                        {{ $subMenu->title }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sub_menu_slug{{ $subMenu->id }}">Sub Menu URL</label>
                                        <br>
                                        {{ $subMenu->slug }}
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sub_menu_status{{ $subMenu->id }}">Sub Menu Status</label>
                                        <br>
                                        {{ $subMenu->status === 'Active' ? 'Active' : 'Inactive' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-actions">
                                <div class="card-body">
                                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-success"> <i
                                            class="fa fa-edit"></i> Edit Now</a>
                                    <a href="{{ route('admin.menu.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                </div>
                            </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
