#!/usr/bin/php -q
<?php

require 'vendor/autoload.php';

use TrekkSoft\Potomoco\Compiler as POCompiler;

$localeDir = realpath( __DIR__ . '/locale' );

function run()
{
	global $localeDir;
	$items = scandir( $localeDir );

	foreach( $items as $item ) {
		if( $item[0] === '.' ) {
			continue;
		}

		generateMOFileForLang( $item );
	}
}

function generateMOFileForLang( $lang )
{
	global $localeDir;
	$poFilePath = rtrim($localeDir, '/') . '/' . $lang . "/LC_MESSAGES/messages.po";

	if( ! file_exists( $poFilePath ) ) {
		echo "Skipping '$lang'. No PO file found.\n";
		return;
	}

	( new POCompiler() )->compile( $poFilePath );
	echo "Successfully compiled '$lang'.\n";
}

run();

?>
