<?php

if(defined('TYPO3') === false) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ps14Teaser',
	'Frontend',
	'LLL:EXT:ps14_teaser/Resources/Private/Language/locallang_plugin.xlf:teaser.title',
	'ps14-module-teaser'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['ps14teaser_frontend'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('ps14teaser_frontend', 'FILE:EXT:ps14_teaser/Configuration/FlexForms/Frontend.xml');