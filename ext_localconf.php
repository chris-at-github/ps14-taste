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

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    teaser_frontend {
                        iconIdentifier = teaser-plugin-frontend
                        title = LLL:EXT:teaser/Resources/Private/Language/locallang_db.xlf:tx_teaser_frontend.name
                        description = LLL:EXT:teaser/Resources/Private/Language/locallang_db.xlf:tx_teaser_frontend.description
                        tt_content_defValues {
                            CType = list
                            list_type = teaser_frontend
                        }
                    }
                }
                show = *
            }
       }'
	);

	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	$iconRegistry->registerIcon(
		'teaser-plugin-frontend',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:teaser/Resources/Public/Icons/user_plugin_frontend.svg']
	);
});
