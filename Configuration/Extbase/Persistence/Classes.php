<?php
declare(strict_types=1);

return [
	\Ps14\Teaser\Domain\Model\Page::class => [
		'tableName' => 'pages',
		'properties' => [
			'abstractLong' => [
				'fieldName' => 'tx_teaser_abstract_long'
			],
			'teaserTitle' => [
				'fieldName' => 'tx_teaser_title'
			],
			'teaserReadmore' => [
				'fieldName' => 'tx_teaser_readmore'
			],
		]
	],
];
