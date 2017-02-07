<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8" />
<title>{{ config('app.name', 'Unity WEB v1.0') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script type="text/javascript">
  var messages = {};
  messages.saved = '{!! trans('resource.saved') !!}';
  messages.removed = '{!! trans('resource.message.deleted') !!}';
  messages.fill = '{!! trans('resource.message.fill') !!}';

  var categoryres = {};
  categoryres.news = '{!! trans('resource.news.title') !!}';
  categoryres.self = '{{trans('resource.category.self')}}';
  categoryres.blank = '{{trans('resource.category.blank')}}';

  var mainres = {};
  mainres.active = '{!! trans('resource.main.active') !!}';
  mainres.deactive = '{{trans('resource.main.deactive')}}';
  mainres.confirm = '{{trans('resource.confirm')}}';

  var weblinkres = {};
  weblinkres.sums = '{!! trans('resource.weblinks.sums') !!}';
  weblinkres.agency = '{{trans('resource.weblinks.agency')}}';
  weblinkres.others = '{{trans('resource.weblinks.others')}}';

  var decisions = {};
  decisions.kindposi = '{!! trans('resource.decision.positive') !!}';
  decisions.kindnega = '{!! trans('resource.decision.negative') !!}';
  decisions.done = '{!! trans('resource.decision.done') !!}';
  decisions.undone = '{!! trans('resource.decision.undone') !!}';

  var polls = {};
  polls.active = '{!! trans('resource.poll.active') !!}';
  polls.inactive = '{!! trans('resource.poll.inactive') !!}';
  polls.makeactive = '{!! trans('resource.poll.makeactive') !!}';
  polls.makeinactive = '{!! trans('resource.poll.makeinactive') !!}';

  var shorters = {};
  shorters.self = '{!! trans('resource.category.self') !!}';
  shorters.blank = '{!! trans('resource.category.blank') !!}';
</script>

<!-- BEGIN PLUGIN CSS -->
<link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/animate.min.css" rel="stylesheet" type="text/css" />
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/jquery-superbox/css/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="/js/summernote/summernote.css" rel="stylesheet">
<!-- END CSS TEMPLATE -->

<!-- BEGIN CORE JS FRAMEWORK-->
<script src="/js/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="/assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-superbox/js/superbox.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
{{-- <script src="/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script> --}}
<script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script type="text/javascript" src="/js/summernote/summernote.js"></script>
<script type="text/javascript" src="/assets/js/jquery.serialize-object.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
{{-- <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form> --}}
<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  {{-- <div class="page-sidebar" id="main-menu">
    <p class="menu-title"> <span class="pull-right"></span></p>
    <ul>
      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">{{trans('resource.main.basicmenu')}}</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li> <a href="/admin/category"> {{trans('resource.category.title')}} </a> </li>
          <li> <a href="/admin/news"> {{trans('resource.news.title')}} </a> </li>
          <li> <a href="/admin/weblink">{{trans('resource.weblinks.link')}}</a> </li>
          <li> <a href="/admin/decision">{{trans('resource.decision.menu')}}</a> </li>
          <li> <a href="/admin/poll">{{trans('resource.polling')}}</a> </li>
          <li> <a href="/admin/banner">{{trans('resource.banner.banner')}}</a> </li>
          <li> <a href="/admin/shorter">{{trans('resource.main.shorter')}}</a> </li>
          <li> <a href="/admin/newscat">{{trans('resource.contentcat.contentcat')}}</a> </li>
        </ul>
      </li>

      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">{{trans('resource.upload.title')}}</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li> <a href="/admin/upload/1"> {{trans('resource.upload.imageUpload')}} </a> </li>
          <li> <a href="/admin/upload/2"> {{trans('resource.upload.thumbUpload')}} </a> </li>
          <li> <a href="/admin/upload/3"> {{trans('resource.upload.bannerUpload')}} </a> </li>
          <li> <a href="/admin/gallery/basic"> {{trans('resource.upload.gallery')}} </a> </li>
        </ul>
      </li>
    </ul>
    <a href="#" class="scrollup">Scroll</a>
    <div class="clearfix"></div>
  </div> --}}
  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content" style="margin: 0px;">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    {{-- <div class="dropdown menu">
      <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
      <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
        <li role="presentation" class="divider"></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
      </ul>
    </div> --}}
    <div class="dropdown menu">
      <button onclick="window.location.href='/admin/category'" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.category.title')}}
      </button>
    </div>
    <div class="dropdown menu">
      <button onclick="window.location.href='/admin/news'" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.news.title')}}
      </button>
    </div>
    <div class="dropdown menu">
      <button onclick="window.location.href='/admin/weblink'" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.weblinks.link')}}
      </button>
    </div>
    <div class="dropdown menu">
      <button onclick="window.location.href='/admin/decision'" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.decision.menu')}}
      </button>
    </div>
    <div class="dropdown menu">
      <button onclick="window.location.href='/admin/poll'" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.polling')}}
      </button>
    </div>
    <div class="dropdown menu">
      <button onclick="window.location.href='/admin/banner'" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.banner.banner')}}
      </button>
    </div>
    <div class="dropdown menu">
      <button onclick="window.location.href='/admin/shorter'" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.main.shorter')}}
      </button>
    </div>
    <div class="dropdown menu">
      <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
          {{trans('resource.main.conf')}}<span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/admin/newscat">{{trans('resource.main.home')}}</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/admin/upload/2">{{trans('resource.upload.thumbUpload')}}</a></li>
      </ul>
    </div>
    <div class="dropdown menu">
      <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">{{trans('resource.weblinks.img')}}
      <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/admin/upload/1">{{trans('resource.upload.imageUpload')}}</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/admin/upload/2">{{trans('resource.upload.thumbUpload')}}</a></li>
        <li role="presentation" class="divider"></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/admin/gallery/basic">{{trans('resource.upload.gallery')}}</a></li>
      </ul>
    </div>
    <div class="dropdown menu">
      <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">{{trans('resource.file.files')}}
      <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/admin/upload/1">{{trans('resource.file.type')}}</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/admin/upload/2">{{trans('resource.file.file')}}</a></li>
      </ul>
    </div>



    <div class="clearfix"></div>
    <div class="content">
        @yield('content')
    </div>
      @yield('hidden_form')
  </div>
<!-- END CHAT -->
<!-- END CONTAINER -->
<script src="/assets/js/datatables.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/assets/js/core.js" type="text/javascript"></script>
<script src="/assets/js/main.js" type="text/javascript"></script>
<script type="text/javascript">
      baseGridFunc.lang = "/assets/datatableI18n/{{Session::get('lang')}}.json";
</script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->

</body>
