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
						<h2><i class="halflings-icon user"></i><span class="break"></span>categories</h2>
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
                                <th>code</th>
								  <th>product Name</th>
								  <th>product Description</th>
                                  <th>product price</th>
                                  <th>product image</th>
                                  <th>product cat</th>
                                  <th>product subcat</th>
                                  <th>product brand</th>
                                  <th>product color</th>
                                  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                            @foreach ( $products as $key=>$product)
							<tr>
                            <td>{{$product->code}}</td>
								<td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                 @php
                                     $product['image'] = explode('|',$product->image);
                                 @endphp
                                 @foreach ($product->image as $images)
                                 <td class="center"><img src="{{ asset('uploads/product/'.$images) }}" style="height:70px; width: 150px;"></td>
                                 @endforeach
                                
                                <td>{{$product->category->name ?? 'none'}}</td>
                                <td>{{$product->subcategory->name ?? 'none' }}</td>
                                <td>{{$product->brand->name ?? 'none'}}</td>
                                <td>{{$product->color->color ?? 'none'}}</td>
							
								@if ($product->status==1)
								<td class="center">
									<span class="btn btn-success">Active</span>
								</td>
								@else
								<td class="center">
									<span class="btn btn-danger">Active</span>
								</td>
								@endif
								<td class="center">
									@if ($product->status==1)
									<a class="btn btn-success" href="{{url('/product-status'.$product->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{url('/product-status'.$product->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									


									<a class="btn btn-info" href="{{route('product.edit',$product->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									
                                    <form action="{{route('product.destroy',$product->id)}}" method="post" id="delete-form-{{$product->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-danger" onclick="if(confirm('are you sure you went to be delete?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$product->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
                            @endforeach
                            
@endsection