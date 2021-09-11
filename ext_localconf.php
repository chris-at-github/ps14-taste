<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Taste',
        'Frontend',
        [
            \Ps14\Taste\Controller\PageController::class => 'index'
        ],
        // non-cacheable actions
        [
            \Ps14\Taste\Controller\PageController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    frontend {
                        iconIdentifier = taste-plugin-frontend
                        title = LLL:EXT:taste/Resources/Private/Language/locallang_db.xlf:tx_taste_frontend.name
                        description = LLL:EXT:taste/Resources/Private/Language/locallang_db.xlf:tx_taste_frontend.description
                        tt_content_defValues {
                            CType = list
                            list_type = taste_frontend
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'taste-plugin-frontend',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:taste/Resources/Public/Icons/user_plugin_frontend.svg']
    );
});
