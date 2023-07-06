@extends('fontend.master')
@section('content')

    <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					{{-- success message --}}
		@if (session()->has('message'))
		<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
				{{session()->get('message')}}
		</div>
	@endif
	{{-- end success message --}}
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<form action="{{url('cash_order')}}" method="post" enctype="multipart/form-data">
								@csrf

							<div class="form-group">
								<input class="input" type="text" name="coustomer_name" placeholder="Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="number" name="phone" placeholder="phone number" required>
							</div>
							
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip_code" placeholder="ZIP Code" required>
							</div>

						
							
						</div>
						<!-- /Billing Details -->
						<h6>input your full address and then click the place order</h6>

						
					</div>
                    

					<!-- Order Details -->
                    
                        
                    
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
                        
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
                           
                    @foreach ($cart as $cart)
							<div class="order-products">
								<div class="order-col">
									<div>product name: {{$cart->name}}</div>
									<div>quantity: {{$cart->qty}}</div>
                                    
								</div>
                                <div class="order-col">
									<div>product price: {{$cart->price}}</div>
									<div>quantity: {{$cart->qty}} x {{$cart->price}}</div>  
								</div>

								@if ($cart->size)
								<div class="order-col">
                                    <div>size: {{$cart->size}}</div>
                                    @elseif ($cart->color)
									<div>product color: {{$cart->color}}</div>			
								</div>
                                @endif
							</div>
							

                            
                       

							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">{{$total}} tk</strong></div>
							</div>
						</div>
                        @endforeach
                        <button type="submit" class="primary-btn order-submit">Place order</button>
						
					
					</div>
					
                    
				</form>
                    
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection