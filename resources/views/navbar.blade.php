
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">NavBar</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Категорий <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
												@foreach ($categories as $category)
													@if(count($category->children) > 0)
                 						<li class="dropdown-submenu">
																<a href="{{url('/category', [$category->id])}}" class="dropdown-toggle">{{$category->name}}</a>
																<ul class="dropdown-menu">
																	@foreach ($category->children as $child)
																		<li><a href="{{url('/category', [$child->id])}}">{{$child->name}}</a></li>
																	@endforeach
																</ul>
														</li>
                  				@else
                  					<li><a href="{{url('/category', [$category->id])}}">{{$category->name}}</a></li>
                  				@endif
                   			@endforeach
                    </ul>
                </li>
            </ul>
            {{ Form::open(array('action' => array('HomeController@search'), 'class' => 'navbar-form navbar-right', 'method' => 'get')) }}
							<div class="form-group">
								<input name="search" type="text" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						{{ Form::close() }}
        </div><!--/.nav-collapse -->
    </div>
</div>