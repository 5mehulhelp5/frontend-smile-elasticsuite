<?php

declare(strict_types=1);

namespace Magexperts\ViraSmileElasticsuite\Observer;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Event\Observer as Event;
use Magento\Framework\Event\ObserverInterface;

class RegisterModuleForMagexpertsConfig implements ObserverInterface
{
    /**
     * @var ComponentRegistrar
     */
    private $componentRegistrar;

    public function __construct(ComponentRegistrar $componentRegistrar)
    {
        $this->componentRegistrar = $componentRegistrar;
    }

    public function execute(Event $event)
    {
        $config = $event->getData('config');
        $extensions = $config->hasData('extensions') ? $config->getData('extensions') : [];

        $path = $this->componentRegistrar->getPath(ComponentRegistrar::MODULE, 'Magexperts_ViraSmileElasticsuite');

        // Only use the path relative to the Magento base dir
        $extensions[] = ['src' => substr($path, strlen(BP) + 1)];

        $config->setData('extensions', $extensions);
    }
}
