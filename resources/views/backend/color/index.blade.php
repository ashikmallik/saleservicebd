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
                                <th style="width: 5%">SL</th>
								  <th style="width: 10%">Name</th>
                                  <th style="width: 10%">Status</th>
								  <th style="width: 35%">Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                            @foreach ( $colors as $key=>$color)
							<tr>
                            <td>{{$key+1}}</td>
								<td>{{$color->color}}</td>
								
								@if ($color->status==1)
								<td class="center">
									<span class="btn btn-success">Active</span>
								</td>
								@else
								<td class="center">
									<span class="btn btn-danger">Active</span>
								</td>
								@endif
								<td class="center">
									@if ($color->status==1)
									<a class="btn btn-success" href="{{url('/color-status'.$color->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{url('/color-status'.$color->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									


									<a class="btn btn-info" href="{{route('color.edit',$color->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									
                                    <form action="{{route('color.destroy',$color->id)}}" method="post" id="delete-form-{{$color->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-danger" onclick="if(confirm('are you sure you went to be delete?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$color->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
                            @endforeach
                            
@endsection