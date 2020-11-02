<?php

namespace Shivani\LoginHistory\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\HTTP\Header;
use Magento\Framework\Stdlib\DateTime\DateTime;

class CustomerLogin implements ObserverInterface
{
    public function __construct(
        RemoteAddress $remoteAddress,
        Header $httpHeader,
        DateTime $date
    ) {
        $this->remoteAddress = $remoteAddress;
        $this->httpHeader = $httpHeader;
        $this->date = $date;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $model = $_objectManager->create('Shivani\LoginHistory\Model\Post');
        $customer = $observer->getEvent()->getCustomer();
        $id = $customer->getId();
        $model->setData([
            'customer_id' => $id,
            'user_agent' => $this->httpHeader->getHttpUserAgent(),
            'ip_address' => $this->remoteAddress->getRemoteAddress(),
        ]);
        $model->save();
    }
}