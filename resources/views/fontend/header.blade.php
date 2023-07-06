


<header>
			

	<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{url('/')}}" class="logo">
									<img src="/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{url('/search')}}" method="GET" >
									<select class="input-select" name="category">
										<option value="ALL" {{request('category') == "ALL" ? 'selected' : ''}}>All Categories</option>
										@foreach ($categories as $category)
										<option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
										@endforeach
									</select>
									<input class="input" name="product" placeholder="Search here" value="{{request('product')}}">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								{{-- <div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div> --}}
								<!-- /Wishlist -->

								<!-- Cart -->
								@php
									$cartdata= cartArray()
								@endphp
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?= count($cartdata) ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@foreach ($cartdata as $cartdata)
											@php
											$cartdata['image'] = explode('|',$cartdata->image);
											$images=$cartdata->image[0];
											@endphp
											
											<div class="product-widget">
												<div class="product-img">
													<img src="{{asset('uploads/product/'.$images)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$cartdata['name']}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$cartdata['qty']}} x</span>{{$cartdata['price']}} tk</h4>
												</div>
												<a href="{{route('home.removecart',$cartdata->id)}}" style="cursor: pointer;" class="delete" onclick="confirm('are sure?delete this data')"><i class="fa fa-close"></i></a>
											</div>
											@endforeach
										
										</div>
										@php
									$cartdata= cartArray();
									$totalprice = tota_price();
								@endphp
								
										<div class="cart-summary">
											<small><?= count($cartdata) ?> Item( <?= count($cartdata) ?> ) selected</small>
											<h5>SUBTOTAL:  <?php echo $totalprice ?> </h5>
										</div>
										
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>