<div class="design-pst">
    <div class="pst-block">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{$model[0]->ca_title}}</strong></h2>
            {{-- <div class="filters">
                <ul class="filters-list-1 xs-hide">
                    <li><a href="" class="active">all</a></li>
                    <li><a href="">business</a></li>
                    <li><a href="">gadgets</a></li>
                    <li><a href="">design</a></li>
                    <li><a href="">fachion</a></li>
                    <li><a href="">video</a></li>
                </ul>
                <div class="filters-more">
                    <div class="filters-btn js-fl-btn">
                        <i class="li_settings"></i>
                        <div class="filters-drop js-fl-block">
                            <i class="arr"></i>
                            <ul>
                                <li><a href="">Latest</a></li>
                                <li><a href="" class="active">Popular</a></li>
                                <li><a href="">Recent</a></li>
                                <li><a href="">Most comment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="pst-block-main">
            <div class="col-row">

              @php
                  $counter = 0;
              @endphp

              @foreach($model as $item)
                @if($counter < 2)
                  <div class="col-half xs-half mb-ls-full">
                      <article class="post post-tp-5">
                          <figure>
                              <a href="/post/{{$item->id}}">
                                  <img src="{{$item->thumbnail}}" height="242" width="345" alt="{{$item->title}}" class="adaptive" />
                              </a>
                              <div class="ptp-5-overlay">
                                  <div class="ptp-5-data">
                                      <a href="">
                                          <i class="li_eye"></i>{{$item->views}}
                                      </a>
                                      <a href="">
                                          <i class="li_bubble"></i>{{$item->comment_count}}
                                      </a>
                                  </div>
                              </div>
                          </figure>
                          <h3 class="title-5"><a href="">{{$item->title}}</a></h3>
                          <div class="meta-tp-2">
                              <div class="date"><span>{{$item->insert_date}}</span></div>
                              <div class="category">
                                  {{-- <a href=""><i class="li_user"></i><span>admin</span></a> --}}
                              </div>
                          </div>
                          {{-- <p class="p">{{$item->source}}</p> --}}
                      </article>
                  </div>

                  @php $counter++;  @endphp
                @endif
              @endforeach
            </div>
            <hr class="pst-block-hr">
            <div class="col-row">
              @for($i=2; $i < count($model); $i++)
                  @if($counter > 1)
                    <div class="col-half">
                      <article class="post post-tp-6">
                          <figure>
                              <a href="/post/{{$model[$i]->id}}">
                                  <img style="height: 85px" src="{{$model[$i]->thumbnail}}" height="85" width="115" alt="{{$model[$i]->title}}" class="adaptive" />
                              </a>
                          </figure>
                          <h3 class="title-6"><a href="">{{$model[$i]->title}}</a></h3>
                          <div class="date-tp-2">{{$model[$i]->insert_date}}</div>
                      </article>
                    </div>
                  @endif
              @endfor
            </div>
        </div>
        <div class="pst-block-foot">
            <a href="/listcategory/{{$model[0]->cat_id}}">{{trans('resource.more')}}</a>
        </div>
    </div>
</div>
