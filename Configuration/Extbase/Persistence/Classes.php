<?php
declare(strict_types=1);

return [
	\Ps14\Taste\Domain\Model\Page::class => [
		'tableName' => 'pages',
		'properties' => [
			'abstractLong' => [
				'fieldName' => 'tx_taste_abstract_long'
			],
		]
	],
];
