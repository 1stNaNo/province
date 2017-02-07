<div class="trending-posts-line">
    <div class="container">
        <div class="trending-line">
            <div class="trending-now"><strong>{{trans('resource.shorter')}}</strong></div>
            <div class="tl-slider">
                @foreach($model as $item)
                    <div>
                      <a
                        @if($item->url == "")
                           href="#"
                        @else
                           target="_{{$item->target}}" href="{{$item->url}}"
                        @endif
                        >{{$item->source}}
                      </a>
                    </div>
                @endforeach
                {{-- <div><a href="">Fusce ac orci sagittis mattis magna et ultrices</a></div>
                <div><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, consectetur.</a></div>
                <div><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></div> --}}
            </div>
            <div class="tl-slider-control"></div>
        </div>
    </div>
</div>
