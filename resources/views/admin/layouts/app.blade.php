<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="Kutim">
  <meta name="author" content="Katapanda">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    
  <title>Kutim | @yield('title')</title>
  
  @include('admin.includes.style')

</head>
<body class="sidebar-mini fixed">

  <div class="loader-bg">
      <div class="loader-bar">
      </div>
  </div>
  
  <div class="wrapper">

    @include('admin.includes.header')

    @include('admin.includes.sidebar')

  </div> 

  <div class="content-wrapper">
    <div class="container-fluid">
  
      @yield('content')

    </div>
  </div>
  
  @include('admin.includes.script')

  @stack('scripts')
   
</body>
</html>