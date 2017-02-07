@php $counter = 0 @endphp
@foreach($weblink as $item)
    @if($counter == 0)
        <div>
    @endif

    <article class="post post-tp-9">
        <figure>
            <a href="">
                <img src="{{$item->img}}" alt="{{$item->source}}" class="adaptive" style="height: 85px;" height="85" width="115">
            </a>
        </figure>
        <h3 class="title-6"><a target="_blank" href="{{$item->link}}">{{$item->source}}</a></h3>
    </article>

    @php $counter++  @endphp

    @if($counter == 3)
      @php $counter = 0  @endphp
      </div>
    @endif

    @if($loop->last)
      </div>
    @endif

@endforeach
