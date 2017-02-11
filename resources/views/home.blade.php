@extends('layouts.admin')

@section('content')
@if(Session::has('admin')) its admin @else its not admin @endif
<div class="row-fluid">
  <div class="span12">
    <img src="assets/img/unitywebwallpaper.png" widht="100%" style="width: 100%"/>
  </div>
<script type="text/javascript">
  $(document).ready(function() {
      var table = $('#example3').dataTable({
          processing: true,
          serverSide: true,
          ajax: 'datatables.data',
          columns: [
              { data: 'p_title', name: 'p_title' },
              { data: 'source', name: 'source' },
              { data: 'lang', name: 'lang' },
              { data: 'insert_date', name: 'insert_date' },
              { data: 'update_date', name: 'update_date' }
          ],
          "language": {
              "url": "/assets/datatableI18n/{{Session::get('lang')}}.json"
          },
          "initComplete": function(settings, json) {
            $('#example3_wrapper .dataTables_filter input').addClass("input-medium ");
            $('#example3_wrapper .dataTables_length select').addClass("select2-wrapper span12");
            $(".select2-wrapper").select2({minimumResultsForSearch: -1});

            $('#example3_wrapper tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('row_selected') ) {
                    $(this).removeClass('row_selected');
                }
                else {
                    table.$('tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                }
            });
          }
      });
  });
</script>
@endsection
