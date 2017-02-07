<form action="/listsearch" method="get">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  @if($vwType == "menu")
      <div class="hdm-search-user">
          <div class="hd-search">
              <a href="#search-block" class="st-btn-1 fa-flip-horizontal js-hd-search">
                  <i class="li_search"></i>
              </a>
              <div class="hd-search-block js-hd-search-block">
                  <div class="search">
                      <div class="search-input">
                          <input type="search" name="keyword" placeholder="{{trans('resource.keyword')}}">
                      </div>
                      <div class="search-btn">
                          <button>{{trans('resource.search')}}</button>
                      </div>
                  </div>
              </div>
          </div>
          <div class="tb-sing-login" style="font-family: arial; font: none; font-weight: bold">
              {{trans('resource.language')}}: <a href="#" onclick="langFuncs.change('mn')" class="">{{trans('resource.mn')}}</a> / <a href="#" onclick="langFuncs.change('en')" class="">{{trans('resource.en')}}</a>
          </div>
      </div>
  @elseif($vwType == "top")
  <div class="hd-search">
      <a href="#search-block" class="st-btn-1 fa-flip-horizontal js-hd-search">
          <i class="li_search"></i>
      </a>
      <div class="hd-search-block js-hd-search-block">
          <div class="search">
              <div class="search-input">
                  <input type="search" name="keyword" placeholder="{{trans('resource.keyword')}}">
              </div>
              <div class="search-btn">
                  <button>{{trans('resource.search')}}</button>
              </div>
          </div>
      </div>
  </div>
  @endif
</form>
