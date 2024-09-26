<?php

(function () {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', [
		'tx_teaser_abstract_long' => [
			'exclude' => true,
			'label' => 'LLL:EXT:ps14_teaser/Resources/Private/Language/locallang_tca.xlf:pages.teaser-abstract-long',
			'config' => [
				'type' => 'text',
				'enableRichtext' => true,
				'richtextConfiguration' => 'ps14Minimal',
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
		'tx_teaser_title' => [
			'exclude' => true,
			'label' => 'LLL:EXT:ps14_teaser/Resources/Private/Language/locallang_tca.xlf:pages.teaser-title',
			'config' => [
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
			],
		],
		'tx_teaser_readmore' => [
			'exclude' => true,
			'label' => 'LLL:EXT:ps14_teaser/Resources/Private/Language/locallang_tca.xlf:pages.teaser-readmore',
			'config' => [
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
			],
		],
	]);
})();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'foundation_teaser', '--linebreak--, tx_teaser_abstract_long,', 'after:abstract');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'foundation_teaser', 'tx_teaser_title, --linebreak--, tx_teaser_readmore, --linebreak--', 'before:media');