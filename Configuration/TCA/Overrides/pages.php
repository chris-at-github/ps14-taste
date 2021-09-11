<?php
defined('TYPO3_MODE') || die();

$tmpPageColumns = [
	'tx_taste_abstract_long' => [
		'exclude' => true,
		'label' => 'LLL:EXT:taste/Resources/Private/Language/locallang_tca.xlf:tx_taste_domain_model_page.tx_taste_abstract_long',
		'config' => [
			'type' => 'text',
			'enableRichtext' => true,
			'richtextConfiguration' => 'default',
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tmpPageColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'miscellaneous', 'tx_taste_abstract_long', 'after:no_search');