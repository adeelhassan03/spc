@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.catalogMessages.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.catalogMessages.partials.header-breadcrumbs')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Customer Name</th>
                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                        <th>Company</th>
                        <td>{{ $order->company_name }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><a href="tel:{{ $order->shop_phone_area_code }}{{ $order->shop_phone_number }}">{{ $order->shop_phone_area_code }}{{ $order->shop_phone_number }}</a></td>
                        <th>Email</th>
                        <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{ $order->city }}</td>
                        <th>State</th>
                        <td>{{ $order->state_province_region }}</td>
                    </tr>
                    <tr>
                        <th>Street Address</th>
                        <td>{{ $order->address }}</td>
                        <th>Street Address Line 2</th>
                        <td>{{ $order->street }}</td>
                    </tr>
                    <tr>
                        <th>Zip</th>
                        <td>{{ $order->postal_zip_code }}</td>
                        <th>Country</th>
                        <td>{{ $order->country }}</td>
                    </tr>
                    <tr>
                        <th>Buy Parts From</th>
                        <td colspan="3">{{ $order->buy_parts_from }}</td>
                    </tr>
                    <tr>
                        <th>Alignment Work Type</th>
                     
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td colspan="3">@if($order->status) <span class="badge badge-success">Completed</span> @else <span class="badge badge-warning">Pending</span> @endif</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
