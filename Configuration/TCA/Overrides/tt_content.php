<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Teaser',
	'Frontend',
	'Teaser Frontend'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['teaser_frontend'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('teaser_frontend', 'FILE:EXT:teaser/Configuration/FlexForms/Frontend.xml');