<?php

if(defined('TYPO3') === false) {
	die('Access denied.');
}

// ---------------------------------------------------------------------------------------------------------------------
// Plugins

// Address
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ps14Teaser',
	'Frontend',
	[
		\Ps14\Teaser\Controller\PageController::class => 'index'
	],
	[]
);