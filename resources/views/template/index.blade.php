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

@yield('content')

@include('template.footer')
</body>
</html>