<?php

namespace Ps14\Teaser\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
/**
 * The repository for the domain model Pages
 */
class PageRepository extends \Ps\Xo\Domain\Repository\PageRepository {

	/**
	 * override the storagePid settings (do not use storagePid) of extbase
	 */
	public function initializeObject() {
		$this->defaultQuerySettings = $this->objectManager->get(Typo3QuerySettings::class);
		$this->defaultQuerySettings->setRespectStoragePage(false);
	}
}
