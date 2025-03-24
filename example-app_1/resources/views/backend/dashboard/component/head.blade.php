<head>
    <base href= "{{ config('app.url') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INSPINIA | Dashboard v.2</title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="backend/css/customize.css">
    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @if(isset($config['css']) && is_array($config['css']))
    @foreach ($config['css'] as $key => $val)
       {!! '<Link rel="stylesheet" href="'.$val.'">' !!}
        
    @endforeach
    @endif
   
    <script src="backend/js/jquery-3.1.1.min.js"></script>
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">
</head>


<script>
    var BASE_URL = '{{ config('app.url') }}';
    var SUFFIX = '{{ config('apps.general.suffix') }}'
</script>

