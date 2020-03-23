<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Welcome')</title>

   @include('admin.partials._styles')
   @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        {{--include nav bar here--}}
        @include('admin.partials.nav._navbar')

        <div id="page-wrapper">
            @include('admin.partials.session._success')
            @include('admin.partials.session._error')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page-header-title', 'Dashboard')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            @yield('content')


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

     @include('admin.partials._scripts')
     <script type="text/javascript">

        //select2js for programming languages
          $('.category-select').select2()
          $('.offer-select').select2()
          $('.item-select').select2()
    </script>

</body>

</html>
