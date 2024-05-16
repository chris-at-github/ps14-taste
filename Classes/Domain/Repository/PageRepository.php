<?php

namespace Ps14\Teaser\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
/**
 * The repository for the domain model Pages
 */
class PageRepository extends \Ps14\Foundation\Domain\Repository\PageRepository {

	/**
	 * override the storagePid settings (do not use storagePid) of extbase
	 */
	public function initializeObject() {
//		$this->defaultQuerySettings = $this->objectManager->get(Typo3QuerySettings::class);
//		$this->defaultQuerySettings->setRespectStoragePage(false);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
	 * @param array $options
	 * @return array
	 */
	protected function getMatches($query, $options) {
		$matches = parent::getMatches($query, $options);

		// Kategorien (SysCategory)
		if(isset($options['categories']) === true) {

			// Overlay um die korrekte Uebersetzung zu laden -> die Kategorie sind in der Hauptsprache der Seite definiert
			// @see: https://docs.typo3.org/m/typo3/book-extbasefluid/master/en-us/9-CrosscuttingConcerns/1-localizing-and-internationalizing-an-extension.html#typo3-v9-and-higher
//			$query->getQuerySettings()->setRespectSysLanguage(false);
			$query->getQuerySettings()->setLanguageOverlayMode('hideNonTranslated');
		}

		return $matches;
	}
}
