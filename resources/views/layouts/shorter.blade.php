  <div class="trending-posts-line">
      <div class="container">
          <div class="trending-line">
              <div class="trending-now"><strong>{{trans('resource.shorter')}}</strong></div>
              <div class="tl-slider" id="shorter{{$type}}">
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
              @if($type == 1)
                <div class="tl-slider-control" id="tl-slider-control{{$type}}"></div>
              @else
                <div class="tl-slider-control" id="tl-slider-control{{$type}}"></div>
              @endif
          </div>
      </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
      var slider = $('#shorter{!!$type!!}');

      slider.slick({
          fade: true,
          speed: 800,
          autoplay: true,
          appendArrows: $('#tl-slider-control{!!$type!!}'),
          prevArrow: '<span class="arr-left-dark-ic tls-prev"><i></i></span>',
          nextArrow: '<span class="arr-right-dark-ic tls-next"><i></i></span>'
      });
  });
  </script>
