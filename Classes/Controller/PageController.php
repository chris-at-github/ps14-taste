<?php

declare(strict_types=1);

namespace Ps14\Teaser\Controller;


use Ps14\Teaser\Domain\Model\Page;
use Ps14\Teaser\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "Ps14 Teaser" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Christian Pschorr <pschorr.christian@gmail.com>
 */


/**
 * PageController
 */
class PageController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var PageRepository
	 */
	protected $pageRepository = null;

	/**
	 * @param PageRepository $pageRepository
	 */
	public function injectPageRepository(PageRepository $pageRepository) {
		$this->pageRepository = $pageRepository;
	}

	/**
	 * @param array $overwrite
	 * @return array
	 */
	protected function getDemand($overwrite = []) {
		$options = [
			'not' => []
		];

		if($this->settings['source'] === 'pages' && empty($this->settings['pages']) === false) {
			$options['records'] = GeneralUtility::trimExplode(',', $this->settings['pages'], true);
		}

		if($this->settings['source'] === 'categories' && empty($this->settings['categories']) === false) {
			$options['categories'] = GeneralUtility::trimExplode(',', $this->settings['categories'], true);
		}

		// eigene Seite ausschliessen
		$options['not']['records'] = [$GLOBALS['TSFE']->id];

		return $options;
	}

	/**
	 * @return mixed
	 */
	public function indexAction() {
		$demand = $this->getDemand();
		$pages = $this->pageRepository->findAll($this->getDemand());

		if($this->settings['source'] === 'pages') {
			$pages = \Ps\Xo\Utilities\GeneralUtility::sortIterableByField($pages, $demand['records'], function($value) {
				if($value instanceof Page) {
					return $value->getUid();
				}

				return null;
			});
		}

		$this->settings['xo'] = $this->objectManager->get(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::class)->getConfiguration(
			\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
			'xo'
		);

		$this->view->assign('pages', $pages);
		$this->view->assign('settings', $this->settings);
	}
}
