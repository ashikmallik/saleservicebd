@extends('fontend.master')
@section('content')

		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									@foreach ($categories as $category)
									<li class=""><a data-toggle="tab" href="#tab1">{{$category->name}}</a></li>
									@endforeach
									
									
								</ul>
							</div>
						</div>
					</div>
				</div>
	

					<!-- Products tab & slick -->
					@foreach ($products as $product)
										@php
                                     $product['image'] = explode('|',$product->image);
									 $images=$product->image[0];
                                 @endphp
						<div class="row">
							
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										
										<!-- product -->
										
										<div class="product">
											<a href="{{route('fontend.productDeatails',$product->id)}}">
											<div class="product-img">
												<img src="{{ asset('uploads/product/'.$images) }}" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$product->category->name ?? 'none'}}</p>
												<h3 class="product-name"><a href="{{route('fontend.productDeatails',$product->id)}}">{{$product->name}}</a></h3>
												<h4 class="product-price">{{$product->price}}<del class="product-old-price">{{$product->price}}</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												
											</div>
										</a>
											<div class="add-to-cart">
												<form action="{{route('home.add_cart',$product->id)}}" method="POST" enctype="multipart/form-data">
													@csrf

													<div class="qty-label">
														Quantity
														<div class="btn">
															<input type="number" name="qty" value="1" min="1" max="10">
														</div>
													</div>
													<button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i>অর্ডার করুন</button>
												</form>
											</div>
											
										</div>
										
										<!-- /product -->
										
									</div>
									@endforeach
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
		
{{-- 
		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION --> --}}

		
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									@foreach ($categories as $category)
									<li class=""><a data-toggle="tab" href="#tab2">{{$category->name}}</a></li>
									@endforeach
									
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										@foreach ($topProducts as $topProducts)

										@php
										$topProducts['image'] = explode('|',$topProducts->image);
										$images=$topProducts->image[0];
										@endphp
										
										<div class="product">
											<a href="{{route('fontend.productDeatails',$topProducts->id)}}">
											<div class="product-img">
												<img src="{{ asset('uploads/product/'.$images) }}" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$topProducts->product_name ?? 'none'}}</p>
												<h3 class="product-name"><a href="{{route('fontend.productDeatails',$product->id)}}">{{$product->name}}</a></h3>
												<h4 class="product-price">{{$product->price}}<del class="product-old-price">{{$product->price}}</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												
											</div>
										</a>
											<div class="add-to-cart">
												<form action="{{route('home.add_cart',$topProducts->id)}}" method="POST" enctype="multipart/form-data">
													@csrf

													<div class="qty-label">
														Quantity
														<div class="btn">
															<input type="number" name="qty" value="1" min="1" max="10">
														</div>
													</div>
													<button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i>অর্ডার করুন</button>
												</form>
											</div>
											
										</div>
										@endforeach
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection