</html>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.header')
</head>
<body class="dx-viewport">

    <div class="wrapper">
        <div id="content">

    
@include('template.sidebar')
<script type="text/javascript">
    var base_url = {!! json_encode(url('/')) !!}
</script>

@yield('content')

@include('template.footer')
</body>
</html>