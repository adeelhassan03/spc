@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.FaqMessages.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.FaqMessages.partials.header-breadcrumbs')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Customer Name</th>
                        <td>{{ $message->{'f-name'} }} {{ $message->{'l-name'} }}</td>

                        <th>Company</th>
                        <td>{{ $message->company_name }}</td>
                    </tr>
                    <tr>
                       
                        <th>Email</th>
                        <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                    </tr>
                    <tr>
                      
                    </tr>
                    
                    <tr>
                        <th>Question</th>
                        <td colspan="3">{{ $message->question }}</td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
