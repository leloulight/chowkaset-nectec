@extends('app')

@section('title', 'หน้าหลัก')

@section('content')
	{!! $map['js'] !!}

<!-- Map Area -->
	<div style="height:100%;width:100%;position: fixed;padding: 0px;">
		{!! $map['html'] !!}
	</div>

<!-- Map Detail Area -->
    @include('maps.map_detail_kaset')
<!-- Add Crop in Map  Area -->
    @include('maps.map_add_crop')
<!-- Detail map Detail Crop in Map  Area -->
    @include('maps.detail_map_detail_kaset')
<!-- Sidebar Area-->
<div class="sidebar-area" style="width: 30%;height: 100%;">
  <div class="sidebars">
    <div style="height:100%;position:fixed;width: 300px;" class="sidebar left">
      @include('maps.map_config_sidebar')
    </div>
  </div>
</div>

  <script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        window.location.hash = '';
    }
  </script>
@stop
