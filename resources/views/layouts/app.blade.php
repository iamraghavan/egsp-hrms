<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">


    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/font-awesome.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/icofont.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/themify.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/flag-icon.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/feather-icon.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/slick.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/slick-theme.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/scrollbar.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/animate.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/sweetalert2.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/owlcarousel.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/vendors/bootstrap.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/style.css") }}">
    <link id="color" rel="stylesheet" href="{{ asset("/assets/css/color-1.css") }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/responsive.css") }}">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==' crossorigin='anonymous'/>




</head>

<body> 



    @yield('content')

    <script src="{{ asset("/assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset("/assets/js/bootstrap/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("/assets/js/icons/feather-icon/feather.min.js") }}"></script>
    <script src="{{ asset("/assets/js/icons/feather-icon/feather-icon.js") }}"></script>
    <script src="{{ asset("/assets/js/scrollbar/simplebar.js") }}"></script>
    <script src="{{ asset("/assets/js/scrollbar/custom.js") }}"></script>
    <script src="{{ asset("/assets/js/config.js") }}"></script>
    <script src="{{ asset("/assets/js/sidebar-menu.js") }}"></script>
    <script src="{{ asset("/assets/js/sidebar-pin.js") }}"></script>
    <script src="{{ asset("/assets/js/slick/slick.min.js") }}"></script>
    <script src="{{ asset("/assets/js/slick/slick.js") }}"></script>
    <script src="{{ asset("/assets/js/header-slick.js") }}"></script>
    <script src="{{ asset("/assets/js/chart/morris-chart/raphael.js") }}"></script>
    <script src="{{ asset("/assets/js/chart/morris-chart/morris.js") }}"> </script>
    <script src="{{ asset("/assets/js/chart/morris-chart/prettify.min.js") }}"></script>
    <script src="{{ asset("/assets/js/chart/apex-chart/apex-chart.js") }}"></script>
    <script src="{{ asset("/assets/js/chart/apex-chart/stock-prices.js") }}"></script>
    <script src="{{ asset("/assets/js/chart/apex-chart/moment.min.js") }}"></script>
    <script src="{{ asset("/assets/js/notify/bootstrap-notify.min.js") }}"></script>
    <script src="{{ asset("/assets/js/dashboard/default.js") }}"></script>
    <script src="{{ asset("/assets/js/notify/index.js") }}"></script>
    <script src="{{ asset("/assets/js/datatable/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("/assets/js/datatable/datatables/datatable.custom.js") }}"></script>
    <script src="{{ asset("/assets/js/datatable/datatables/datatable.custom1.js") }}"></script>
    <script src="{{ asset("/assets/js/owlcarousel/owl.carousel.js") }}"></script>
    <script src="{{ asset("/assets/js/owlcarousel/owl-custom.js") }}"></script>
    <script src="{{ asset("/assets/js/typeahead/handlebars.js") }}"></script>
    <script src="{{ asset("/assets/js/typeahead/typeahead.bundle.js") }}"></script>
    <script src="{{ asset("/assets/js/typeahead/typeahead.custom.js") }}"></script>
    <script src="{{ asset("/assets/js/typeahead-search/handlebars.js") }}"></script>
    <script src="{{ asset("/assets/js/typeahead-search/typeahead-custom.js") }}"></script>
    <script src="{{ asset("/assets/js/height-equal.js") }}"></script>
    <script src="{{ asset("/assets/js/script.js") }}"></script>


    <script src="{{ asset("/assets/js/sweet-alert/sweetalert.min.js") }}"></script>
    <script src="{{ asset("/assets/js/sweet-alert/app.js") }}"></script>

    <script>
		// Function to format the current date and time
		function getCurrentDateTime() {
			var currentDate = new Date();
			var options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
			return currentDate.toLocaleString(undefined, options);
		}

		// Update the 'datetime' element with the current date and time
		function updateDateTime() {
			document.getElementById("datetime").innerHTML = getCurrentDateTime();
		}

		// Call the updateDateTime function every second
		setInterval(updateDateTime, 1000);




	</script>
</body>
</html>
