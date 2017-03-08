<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{!! Theme::getKeywords() !!}">
        <meta name="description" content="{!! Theme::getDescription() !!}">
		<meta name="author" content="{!! Theme::getAuthor() !!}">

		<title>{!! Theme::getTitle() !!}</title>

		{!! Theme::asset()->styles() !!}
		
	</head>

	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

		<!-- Navigation -->
		{!! Theme::partial('nav') !!}

		{!! Theme::content() !!}

		{!! Theme::partial('footer') !!}

		{!! Theme::asset()->scripts() !!}

	</body>

</html>
