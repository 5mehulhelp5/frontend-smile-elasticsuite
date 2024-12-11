<?php

/**
 * Copyright - elgentos ecommerce solutions (https://elgentos.nl)
 */

declare(strict_types=1);

namespace Magexperts\ViraSmileElasticsuite\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\StoreManagerInterface;

class Store implements ArgumentInterface
{
    /** @var StoreManagerInterface */
    private $storeManager;

    /**
     * Constructor.
     *
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
    }

    /**
     * Get the store by its ID.
     *
     * @param int|null $storeId
     *
     * @return StoreInterface
     */
    public function getStore(int $storeId = null): StoreInterface
    {
        return $this->storeManager->getStore($storeId);
    }
}
