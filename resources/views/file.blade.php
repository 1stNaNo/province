@include('layouts.main_temp_top')
  <div class="main">
      <!-- Content -->


      <div class="main-content">
          <div class="trending-posts-line" style="height: 20px;"></div>
          <div class="section">
              <div class="row">
                <div class="content">
                  <div class="pst-block">
                    <div class="pst-block-main">
                      <div class="post-content">
                        <table width="100%" class="files-table">
                          <caption style="text-align: left;">
                            <h3>{{ $type[0]->source }}</h3>
                          </caption>
                          <thead>
                            <tr>
                              <th>{{trans('resource.name')}}</th>
                              <th>{{trans('resource.weblinks.id')}}</th>
                              <th>{{trans('resource.main.confirm_date')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($files as $file)
                            <tr class="files-item">
                              <td width="50%">{{$file->source}}</td>
                              <td>{{$file->number}}</td>
                              <td>{{$file->confirm_date}}</td>
                              <td style="display:none" class="file-path">{{$file->path}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                  <aside class="side-bar sticky-wrap">

                      @include('layouts.weather')

                  </aside>
              </div>
          </div>
      </div>
      <style>
        table.files-table th{
          font-weight: bolder;
          text-align: left;
          padding : 8px 0px 8px 0px;
        }
        table.files-table td{
          padding : 5px 0px 5px 5px;
        }
        .files-item td{
          border-top:0.5px solid #ccc;
          border-bottom:0.5px solid #ccc;
        }
        .files-item:hover{
          cursor: pointer;
          background-color: rgba(224, 224, 235, 0.5);
        }
      </style>

      <script>
        $('.files-item').on('click', function(){
          var url = window.location.href.split('/');
          window.open(url[0] + '//' + url[2] + '' + $(this).find('.file-path').text());
        });
      </script>
      <!-- Content END -->
      <!-- Footer -->
      @include('layouts.main_temp_footer')
      <!-- Footer END -->
@include('layouts.main_temp_bot')
