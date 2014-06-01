<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>{{ Config::get('site.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        {{ HTML::style('bootstrap/css/bootstrap.css') }}
        {{-- HTML::style('bootstrap/css/bootstrap-responsive.min.css') --}}
        {{ HTML::style('font-awesome/css/font-awesome.min.css') }}

    </style>
</head>

<body>

    <div class="container" id="main-content">
        @yield('content')
    </div><!-- /container -->

<!-- Footer
==================================================
<div id="footer" class="container">
    <p>&copy; 2013 - Investors Alliance</p>
</div>
-->


        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        {{-- HTML::script('bootstrap/js/bootstrap.min.js') --}}

</body>
</html>