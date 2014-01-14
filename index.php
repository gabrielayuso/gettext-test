<?php
	bindtextdomain( "messages", realpath( __DIR__ . '/locale' ) );
	textdomain( "messages" );

	$locale = 'en_US';

	if( isset( $_GET['lang'] ) ) {
		$locale = $_GET['lang'];	
	}
	
	putenv("LC_MESSAGES=$locale");
	setlocale(LC_MESSAGES, $locale);

	echo _('Hello World');
?>
