<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Akash Dutta">
    <!-- CSRF Token -->

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Baazar') }}</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />


    <!-- Styles -->
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/fonts/boxicons.css') }}" />
    <link href="{{ url('assets/administrator/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('assets/administrator/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/administrator/css/own.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/css/pages/page-auth.css') }}" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('assets/administrator/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('assets/administrator/js/config.js') }}"></script>
    @yield('style')
</head>

<body class="">
    
        @if(auth()->check())
            <!-- Layout wrapper -->
            <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
            @include('administrator.includes.sidebar')
        @else

		@endif
        
       
          @if(auth()->check())
            <!-- Layout container -->
            <div class="layout-page">
            <!-- Navbar -->
            @include('administrator.includes.navbar')
          @endif
          <!-- / Navbar -->
            @if(auth()->check())
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                @include('administrator.includes.breadcrumbs')
            @else
            <div class="container-xxl">
            @endif
            @yield('content')
            </div>
            <!-- / Content -->
            @include('administrator.includes.footer')
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
<!-- All Jquery -->
<script>
    let globalUrl = "{{ env("APP_URL") }}"
</script>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ url('assets/administrator/vendor/libs/jquery/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="{{ url('assets/administrator/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ url('assets/administrator/vendor/js/bootstrap.js') }}"></script>
<script src="{{ url('assets/administrator/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
<script src="{{ url('assets/administrator/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ url('assets/administrator/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
<!-- Main JS -->
<script src="{{ url('assets/administrator/js/main.js') }}"></script>
<!-- Page JS -->
<script src="{{ url('assets/administrator/js/dashboards-analytics.js') }}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--Wave Effects -->
<script src="{{ url('assets/administrator/js/own.js') }}"></script>
<script>
    $('#zero_config').DataTable();
    tinymce.init({
        selector : ".editor",
        plugins: 'emoticons wordcount help code lists',
        menubar : true,
        toolbar: "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck"
    });

</script>

<script>
    Dropzone.options.dropzonewidget = { 
        maxFilesize: 150, // 2 MB
        success: function(file, response){ // Dropzone upload response
            var html = '<div class="file-content text-center"><a href="#imageBox" class="image-thumbnail open-popup-link" data-id="'+response.id+'"><img src="'+`${globalUrl}`+response.path+'/thumb_'+response.filename+'" alt="" style="width:100%"><span> '+response.name+' </span></a><a target="_blank" href="'+`${globalUrl}`+'administrator/view-file/'+response.id+'" style="display:block">Edit</a></div>';
            $(".image-thumbnail-container").prepend(html);
        }
    };
</script>
@yield('script')
</body>
</html>