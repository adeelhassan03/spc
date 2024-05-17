@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.contacts.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.contacts.partials.header-breadcrumbs')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>From</th>
                        <td>{{ $contact->name }}</td>
                        <th>Company</th>
                        <td>{{ $contact->company }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                        <th>Email</th>
                        <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{ $contact->city }}</td>
                        <th>State</th>
                        <td>{{ $contact->state_province_region }}</td>
                    </tr>
                    <tr>
                        <th>Street Address</th>
                        <td>{{ $contact->street_address }}</td>
                        <th>Street Address Line 2</th>
                        <td>{{ $contact->street_address_line2 }}</td>
                    </tr>
                    <tr>
                        <th>Zip</th>
                        <td>{{ $contact->postal_zip_code }}</td>
                        <th>Send Catelog</th>
                        <td>@if($contact->send_catalog == 1) Yes @else No @endif</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td colspan="3">{{ $contact->message }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
