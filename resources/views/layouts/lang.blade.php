<div class="tb-sing-login" style="font-family: arial; font: none; font-weight: bold">
    @if($lang == 'ch')
      {{trans('resource.language')}}: <a href="#" onclick="langFuncs.change('mn')" class="">{{trans('resource.mn')}}</a> / <a href="#" onclick="langFuncs.change('en')" class="">{{trans('resource.en')}}</a>
    @elseif($lang == 'mn')
      {{trans('resource.language')}}: <a href="#" onclick="langFuncs.change('en')" class="">{{trans('resource.en')}}</a> / <a href="#" onclick="langFuncs.change('ch')" class="">{{trans('resource.china')}}</a>
    @elseif($lang == 'en')
      {{trans('resource.language')}}: <a href="#" onclick="langFuncs.change('mn')" class="">{{trans('resource.mn')}}</a> / <a href="#" onclick="langFuncs.change('ch')" class="">{{trans('resource.china')}}</a>
    @endif
</div>
