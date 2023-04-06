<?php

namespace Tigren\Example\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $displayText = $observer->getData('text');
        echo $displayText->getText() . " - Event </br>";
        $displayText->setText('Execute event successfully.');
        return $this;
    }
}
