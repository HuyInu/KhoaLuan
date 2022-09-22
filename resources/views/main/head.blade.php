<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{$title}}</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Fonts and icons -->
<script src="/template/Atlantis/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/template/Atlantis/css/fonts.min.css']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="/template/Atlantis/css/bootstrap.min.css">
<link rel="stylesheet" href="/template/Atlantis/css/atlantis.min.css">

<link rel="stylesheet" href="/template/Atlantis/css/atlantis.min.css">

<!-- CSS -->
<link rel="stylesheet" href="/css/Admin/main.css">