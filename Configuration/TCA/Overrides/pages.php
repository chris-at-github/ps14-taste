<?php
defined('TYPO3_MODE') || die();

$tmpPageTeaserColumns = [
	'tx_teaser_abstract_long' => [
		'exclude' => true,
		'label' => 'LLL:EXT:teaser/Resources/Private/Language/locallang_tca.xlf:tx_teaser_domain_model_page.tx_teaser_abstract_long',
		'config' => [
			'type' => 'text',
			'enableRichtext' => true,
			'richtextConfiguration' => 'xoMinimal',
			'fieldControl' => [
				'fullScreenRichtext' => [
					'disabled' => false,
				],
			],
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim',
		],
	],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tmpPageTeaserColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'xoTeaser', '--linebreak--, tx_teaser_abstract_long,', 'after:abstract');