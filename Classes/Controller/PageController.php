<?php

declare(strict_types=1);

namespace Ps14\Teaser\Controller;


use Ps14\Teaser\Domain\Model\Page;
use Ps14\Teaser\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Database\QueryGenerator as QueryGeneratorAlias;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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
		$this->pageRepository->setQuerySettings(['respectStoragePage' => false]);
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
			if($this->settings['pagesProcessing'] === 'subpages') {
				$options['parent'] = GeneralUtility::trimExplode(',', $this->settings['pages'], true);

			} else {
				$options['records'] = GeneralUtility::trimExplode(',', $this->settings['pages'], true);
			}
		} elseif($this->settings['source'] === 'categories' && empty($this->configurationManager->getContentObject()->data['pages']) === false) {
			$depth = (int) $this->configurationManager->getContentObject()->data['recursive'];
			$queryGenerator = GeneralUtility::makeInstance( QueryGeneratorAlias::class);

			$children = $queryGenerator->getTreeList($this->configurationManager->getContentObject()->data['pages'], $depth, 0, 1);
			$options['parent'] = GeneralUtility::intExplode(',', $children, true);
		}

		if($this->settings['source'] === 'categories' && empty($this->settings['categories']) === false) {
			$options['categories'] = GeneralUtility::trimExplode(',', $this->settings['categories'], true);
		}

		// eigene Seite ausschliessen
		$options['not']['records'] = [$GLOBALS['TSFE']->id];

		// hide_nav Datensaetze per Default nicht anzeigen
		if((int) $this->settings['hiddenEnabled'] !== 1) {
			$options['hiddenEnabled'] = false;
		}

		return $options;
	}

	/**
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function indexAction() {
		$demand = $this->getDemand();
		$pages = $this->pageRepository->findAllByOption($demand);

		if($this->settings['source'] === 'pages' && $this->settings['pagesProcessing'] === 'pages') {
			$pages = \Ps14\Foundation\Utilities\ArrayUtility::sortByField($pages, $demand['records'], function($value) {
				if($value instanceof Page) {
					return $value->getUid();
				}

				return null;
			});
		}

		$this->view->assign('pages', $pages);
		$this->view->assign('record', $this->request->getAttribute('currentContentObject')->data);

		return $this->htmlResponse();
	}
}
