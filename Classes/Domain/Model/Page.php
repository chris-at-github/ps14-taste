<?php

declare(strict_types=1);

namespace Ps14\Taste\Domain\Model;


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
class Page extends \Ps\Xo\Domain\Model\Page
{

    /**
     * txTasteAbstractLong
     *
     * @var string
     */
    protected $txTasteAbstractLong = '';

    /**
     * Returns the txTasteAbstractLong
     *
     * @return string $txTasteAbstractLong
     */
    public function getTxTasteAbstractLong()
    {
        return $this->txTasteAbstractLong;
    }

    /**
     * Sets the txTasteAbstractLong
     *
     * @param string $txTasteAbstractLong
     * @return void
     */
    public function setTxTasteAbstractLong(string $txTasteAbstractLong)
    {
        $this->txTasteAbstractLong = $txTasteAbstractLong;
    }
}
