@if($SlideshowConfig)
		<!-- slideshow -->
		<div id="carousel-home" class="carousel slide" data-ride="carousel"
			style="margin-top: 2px;">
			<!-- Indicators -->
			<ol class="carousel-indicators">
          <?php 
          $topSlideShowArr = array();
          ?>
          @if(!empty($banner))
                <?php $i=0;?>
                @foreach($banner as $ban)
                    @if($ban->ban_position == 'top-c')
                        @if($ban->ban_enddate >= $currentDate)
                        <li data-target="#carousel-home"
					data-slide-to="{{$i}}" class="{{$i==0 ? 'active':''}}"></li>
                        <?php $i++;?>
                        <?php array_push($topSlideShowArr, $i);?>
                     @endif
                    @endif
                @endforeach
            @endif
            @if(count($topSlideShowArr)<1)
            	<li data-target="#carousel-home" data-slide-to="0"
					class="active"></li>
				<li data-target="#carousel-home" data-slide-to="1" class=""></li>
				<li data-target="#carousel-home" data-slide-to="1" class=""></li>
				@endif
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
          @if(!empty($banner))
                <?php $i=0;?>
                @foreach($banner as $ban)
                    @if($ban->ban_position == 'top-c')
                        @if($ban->ban_enddate >= $currentDate)
                        <div class="item {{$i==0 ? 'active':''}}">
					<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
						src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
                        <?php $i++;?>
                        @endif
                    @endif
                @endforeach
            @endif
            
            @if(count($topSlideShowArr)<1)
            <div class="item active">
					<a class="banner-link" href="#"><img
						src="https://placeholdit.imgix.net/~text?txtsize=60&txt=[1]+750+x+200&w=750&h=200"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
				<div class="item">
					<a class="banner-link" href="#"><img
						src="https://placeholdit.imgix.net/~text?txtsize=60&txt=[2]+750+x+200&w=750&h=200"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
				<div class="item">
					<a class="banner-link" href="#"><img
						src="https://placeholdit.imgix.net/~text?txtsize=60&txt=[3]+750+x+200&w=750&h=200"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
				@endif
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-home" role="button"
				data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
				aria-hidden="true"></span> <span class="sr-only">Previous</span>
			</a> <a class="right carousel-control" href="#carousel-home"
				role="button" data-slide="next"> <span
				class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		@endif