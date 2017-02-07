@include('layouts.main_temp_top')
  <div class="main">
      <!-- Content -->
      <div class="main-content">
          <div class="trending-posts-line" style="height: 20px;"></div>
          <div class="section">
              <div class="row">
                  @if(count($model) > 0)
                    <div class="content">
                      <div class="pst-block">
                          <div class="pst-block-main">
                              <div class="post-content">
                                  <article>
                                      <div class="post-main-img">
                                          <figure>
                                              <img src="{{$model[0]->thumbnail}}" height="582" width="750" alt="{{$model[0]->title}}" class="adaptive" />
                                          </figure>
                                          <div class="post-main-overlay">
                                              <div class="post-main-data">
                                                  {{-- <a href="" class="category-tp-1" tabindex="0">BUSINESS</a> --}}
                                                  <h2 class="title-21">{{$model[0]->title}}</h2>
                                                  <div class="meta-tp-5">
                                                      {{-- <div class="author-tp-2">
                                                          <span class="photo">
                                                              <img src="https://s3.amazonaws.com/weblionmedia-spectr/img/author-img.png" height="18" width="18" alt="Spectr News Theme">
                                                          </span>Admin
                                                      </div> --}}
                                                      <div class="date-tp-4"><i class="li_clock"></i>{{$model[0]->insert_date}}</div>
                                                      <div class="ptp-1-views">
                                                          <a href=""><i class="li_eye"></i><span>{{$model[0]->views}}</span></a>
                                                      </div>
                                                      <div class="ptp-1-comments">
                                                          <a href=""><i class="li_bubble"></i><span>{{$model[0]->comment_count}}</span></a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      {!! $model[0]->source !!}
                                  </article>

                                  <div class="sharing-block">
                                      <div class="post-sharing-tp-2">
                                          <ul>
                                              <li class="fb"><a href="#" onclick="window.open( 'https://www.facebook.com/sharer.php?caption=&description={{$model[0]->title}}&u={{Request::url()}}&picture=https://i.stack.imgur.com/AzSGQ.png', 'Facebook' ); return false" target="_blank"><i class="fa fa-facebook"></i><span class="mb-pt-hide">Facebook</span></a></li>
                                          </ul>
                                          <div class="comments">
                                              <i class="li_bubble"></i>{{$model[0]->comment_count}} {{trans('resource.comments')}}
                                          </div>
                                      </div>
                                  </div>

                                  <div class="comments-block">
                                      <div class="title-blc-2">
                                          <div class="title-blc-inner">
                                              <h4>{{trans('resource.comments')}}</h4>
                                          </div>
                                      </div>
                                      <div class="comments">
                                          <ul class="comment-list">
                                              @foreach($comment as $item)
                                                <li class="comment">
                                                    <article>
                                                        <div class="comment-photo">
                                                            <img src="/img/comment-photo.png" height="49" width="49" alt="{{$item->name}}">
                                                        </div>
                                                        <h6 class="title-20"><a href="">{{$item->name}}</a></h6>
                                                        <p>{{$item->comment}}</p>
                                                        <div class="comment-date">{{$item->insert_date}}</div>
                                                    </article>
                                                </li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="live-comments-block">
                                      <div class="title-blc-2">
                                          <div class="title-blc-inner">
                                              <h4>{{trans('resource.liveAComment')}}</h4>
                                              @if (count($errors) > 0)
                                                @foreach ($errors->all() as $error)
                                                    <p style="color:red">{{ $error }}</p>
                                                @endforeach
                                              @endif
                                          </div>
                                      </div>
                                      <div class="comments-form">
                                          <form action="/comment" method="post">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <input name="post_id" type="hidden" value="{{$model[0]->id}}"/>
                                              <div class="form-control">
                                                  <label>
                                                      {{trans('resource.name')}}*
                                                      <input type="text" name="guest_name" value="{{ old('guest_name') }}">
                                                  </label>
                                              </div>
                                              {{-- <div class="form-control">
                                                  <label>
                                                      EMAIL*
                                                      <input type="email">
                                                  </label>
                                              </div> --}}
                                              {{-- <div class="form-control">
                                                  <label>
                                                      WEBSITE
                                                      <input type="text">
                                                  </label>
                                              </div> --}}
                                              <div class="form-control">
                                                  <label>
                                                      {{trans('resource.comment')}}*
                                                      <textarea name="guest_comment">{{ old('guest_comment') }}</textarea>
                                                  </label>
                                              </div>
                                              <button class="btn-3">{{trans('resource.post')}}</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  @else
                    <img src="/img/noresult.png" style="width: 100%" />
                  @endif
                  <aside class="side-bar sticky-wrap">

                      @if(count($model))
                        @include('layouts.category_sidebar',['cat_id' => $model[0]->cat_id])
                      @endif

                      @include('layouts.weather')

                  </aside>
              </div>
          </div>
      </div>
      <!-- Content END -->
      <!-- Footer -->
      @include('layouts.main_temp_footer')
      <!-- Footer END -->
@include('layouts.main_temp_bot')
