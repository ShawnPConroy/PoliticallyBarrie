		<title><?php echo !empty($page->htmlTitle) ? $page->htmlTitle." &mdash; ".$app->siteName : $app->siteName; ?></title>
        <meta property="og:title" content="<?php echo $page->ogTitle; ?>" />
        <meta property="og:description" content="<?php echo $page->ogDescription; ?>" />
        <meta property="og:image" content="<?php echo $page->ogImage; ?>" />
        <meta property="og:image:width" content="500" />
        <meta property="og:image:height" content="261" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="en_CA" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="stylesheet" href="/assets/css/politicallybarrie.css" />
		<link rel="stylesheet" href="/assets/css/grid.css" />
		<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-25612594-6"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-25612594-6');
        </script>