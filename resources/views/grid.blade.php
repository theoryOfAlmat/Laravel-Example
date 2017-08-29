<div class="container">    
 	<h3>{{$title}}</h3>
  <div class="row">
		@foreach ($products as $product)
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading">{{$product->name}}</div>
					<div class="panel-body" style="word-break:break-all">
						<img src="{{asset($product->image)}}" class="img-responsive" style="width:100%" alt="Image">
						<p>
							{{$product->descr}}
						</p>
						
					</div>
					<div class="panel-footer">
						<h5 style="color: green">{{$product->price}} золотых монет</h5>
						<a href="{{url('/category', [$product->category->id])}}">{{$product->category->name}}</a>
					</div>
				</div>
			</div>
		@endforeach
  </div>
  {{ $products->links() }}
</div>