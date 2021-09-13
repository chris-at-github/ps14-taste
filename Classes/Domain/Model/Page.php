<?php

declare(strict_types=1);

namespace Ps14\Taste\Domain\Model;


use Ps\Xo\Domain\Model\Category;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "Ps14 Taste" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Christian Pschorr <pschorr.christian@gmail.com>
 */


/**
 * Page
 */
class Page extends \Ps\Xo\Domain\Model\Page {

	/**
	 * @var string
	 */
	protected $abstractLong = '';

	/**
	 * @var array
	 */
	protected $badges = [];

	/**
	 * Returns the abstractLong
	 *
	 * @return string $abstractLong
	 */
	public function getAbstractLong() {
		return $this->abstractLong;
	}

	/**
	 * Sets the abstractLong
	 *
	 * @param string $abstractLong
	 * @return void
	 */
	public function setAbstractLong(string $abstractLong) {
		$this->abstractLong = $abstractLong;
	}

	/**
	 * @return array
	 */
	public function getBadges() {
		if(empty($this->badges) === true) {
			$settings = $this->getSettings();
			$badgeParentCategories = GeneralUtility::intExplode(',', $settings['badgeParentCategories']);

			/** @var Category $category */
			foreach($this->getCategories() as $category) {
				if($category->getParent() !== null && in_array($category->getParent()->getUid(), $badgeParentCategories) === true) {
					$this->badges[] = $category;
				}
			}
		}

		return $this->badges;
	}

	/**
	 * liefert die TypoScript Plugin Einstellungen
	 *
	 * @return object
	 */
	public function getSettings() {
		return GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::class)->getConfiguration(
			\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
			'taste'
		);
	}
}
