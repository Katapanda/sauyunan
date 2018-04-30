@extends('admin.layouts.app')

@section('title')
	Dashboard
@endsection

@section('content')
	
	<div class="row">
        <div class="main-header">
            <h4>Dashboard</h4>
        </div>
    </div>
    <div class="row m-b-30 dashboard-header">
        <div class="col-lg-3 col-sm-6">
            <div class="col-sm-12 card dashboard-product">
                <span>Products</span>
                <h2 class="dashboard-total-products counter">4500</h2>
                <span class="label label-warning">Orders</span>New Orders
                <div class="side-box bg-warning">
                    <i class="icon-social-soundcloud"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="col-sm-12 card dashboard-product">
                <span>Products</span>
                <h2 class="dashboard-total-products counter">37,500</h2>
                <span class="label label-primary">Sales</span>Last Week Sales
                <div class="side-box bg-primary">
                    <i class="icon-social-soundcloud"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="col-sm-12 card dashboard-product">
                <span>Products</span>
                <h2 class="dashboard-total-products">$<span class="counter">30,780</span></h2>
                <span class="label label-success">Sales</span>Total Sales
                <div class="side-box bg-success">
                    <i class="icon-bubbles"></i>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6">
            <div class="col-sm-12 card dashboard-product">
                <span>Products</span>
                <h2 class="dashboard-total-products">$<span class="counter">30,780</span></h2>
                <span class="label label-danger">Views</span>Views Today
                <div class="side-box bg-danger">
                    <i class="icon-bubbles"></i>
                </div>
            </div>
        </div>

    </div>

@endsection