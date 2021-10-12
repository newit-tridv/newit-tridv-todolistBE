@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
	@foreach($category_name as $k => $category_name_id)
		<h2 class="title text-center">{{$category_name_id->category_name}}</h2>
	@endforeach
    @foreach($category_by_id as $k => $v)
	<a href="{{URL::to('/chi-tiet-san-pham/'. $v->product_id)}}">
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('/uploads/product/'. $v->product_image)}}" alt="img-pro" style="width: 300px; height: 200px; object-fit:cover;"/>
							<h2>{{number_format($v->product_price).' VNĐ'}}</h2>
							<p>{{$v->product_name}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
						</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-heart"></i>Yêu thích</a></li>
						<li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
					</ul>
				</div>
			</div>
		</div>
	</a>
	@endforeach
</div><!--features_items-->

@endsection