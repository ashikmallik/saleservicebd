@extends('backend.master')
@section('content')

			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">create</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>order</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                
								  <th>coustomer name</th>
								  <th>phone</th>
                                  
                                  <th>address</th>
                                  <th>city</th>
                                  <th>country</th>
                                  <th>zip_code</th>
                                  <th>product_name</th>
                                  <th>qty</th>
								  <th>total price</th>
								  <th>image</th>
								  <th>print pdf</th>
								  <th>code</th>
								  <th>size</th>
							  </tr>
						  </thead>   
						  <tbody>
                            @foreach ( $order as $key=>$order)
							<tr>
								
								<td>{{$order->coustomer_name}}</td>
                                <td>{{$order->phone}}</td>
                                
								<td>{{$order->address}}</td>
                                <td>{{$order->city}}</td>
                                <td>{{$order->country}}</td>
                                <td>{{$order->zip_code}}</td>
								<td>{{$order->product_name}}</td>
								<td>{{$order->qty}}</td>
								<td>{{$order->total}}</td>

								
                                 @php
                                     $order['image'] = explode('|',$order->image);
                                 @endphp
                                 @foreach ($order->image as $images)
                                 <td class="center"><img src="{{ asset('uploads/product/'.$images) }}" style="height:70px; width: 150px;"></td>
								 <td><a href="{{route('admin.printpdf',$order->id)}}" class="btn btn-info">print invoice</a></td>

								 @if ($order->code)
								<td>{{$order->code}}</td>
								@endif
								@if ($order->size)
								<td>{{$order->size}}</td>
								@endif
                                 @endforeach

							</tr>
                            @endforeach
                            
@endsection