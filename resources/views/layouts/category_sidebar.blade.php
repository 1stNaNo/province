@if(count($model) > 0)
  @if(isset($parent[0]))
    <h2>{{$parent[0]->source}}</h2>
  @endif
  <ul class="category-sidebar pst-block-head">
    @foreach ($model as $item)
      @php
        $tmpUrl = $item->url;

        if($tmpUrl == "#\$cat\$#"){
          $tmpUrl = "/listcategory/".$item->ca_id;
        }

      @endphp
      <li><a class="{{ ($item->ca_id == $cat_id) ? ' active' : '' }}" href="{{$tmpUrl}}" target="{{$item->target}}"> - {{$item->source}}</a></li>
    @endforeach
  </ul>
@endif
