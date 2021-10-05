<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Teaser',
		'Frontend',
		[
			\Ps14\Teaser\Controller\PageController::class => 'index'
		],
		// non-cacheable actions
		[
			\Ps14\Teaser\Controller\PageController::class => ''
		]
	);

	// PageTs
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:teaser/Configuration/TSConfig/Page.t3s">'
	);

	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	$iconRegistry->registerIcon(
		'teaser-plugin-frontend',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:teaser/Resources/Public/Icons/user_plugin_frontend.svg']
	);
});
