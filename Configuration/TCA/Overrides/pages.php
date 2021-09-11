<?php
defined('TYPO3_MODE') || die();


if (!isset($GLOBALS['TCA']['pages']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['pages']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_taste_pages = [];
    $tempColumnstx_taste_pages[$GLOBALS['TCA']['pages']['ctrl']['type']] = [
        'exclude' => true,
        'label' => 'LLL:EXT:taste/Resources/Private/Language/locallang_db.xlf:tx_taste.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['', ''],
                ['Page', 'Tx_Taste_Page']
            ],
            'default' => 'Tx_Taste_Page',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumnstx_taste_pages);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    $GLOBALS['TCA']['pages']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['pages']['ctrl']['label']
);





$tmp_taste_columns = [


    'tx_taste_abstract_long' => [
        'exclude' => true,
        'label' => 'LLL:EXT:taste/Resources/Private/Language/locallang_db.xlf:tx_taste_domain_model_page.tx_taste_abstract_long',
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


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$tmp_taste_columns);


// inherit and extend the show items from the parent class
if (isset($GLOBALS['TCA']['pages']['types']['1']['showitem'])) {
    $GLOBALS['TCA']['pages']['types']['Tx_Taste_Page']['showitem'] = $GLOBALS['TCA']['pages']['types']['1']['showitem'];
} elseif (is_array($GLOBALS['TCA']['pages']['types'])) {
    // use first entry in types array
    $pages_type_definition = reset($GLOBALS['TCA']['pages']['types']);
    $GLOBALS['TCA']['pages']['types']['Tx_Taste_Page']['showitem'] = $pages_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['pages']['types']['Tx_Taste_Page']['showitem'] = '';
}
$GLOBALS['TCA']['pages']['types']['Tx_Taste_Page']['showitem'] .= ',--div--;LLL:EXT:taste/Resources/Private/Language/locallang_db.xlf:tx_taste_domain_model_page,';
$GLOBALS['TCA']['pages']['types']['Tx_Taste_Page']['showitem'] .= 'tx_taste_abstract_long';


$GLOBALS['TCA']['pages']['columns'][$GLOBALS['TCA']['pages']['ctrl']['type']]['config']['items'][] = [
    'LLL:EXT:taste/Resources/Private/Language/locallang_db.xlf:pages.tx_extbase_type.Tx_Taste_Page',
    'Tx_Taste_Page'
];
