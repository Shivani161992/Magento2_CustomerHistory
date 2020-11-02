<?php


namespace Shivani\LoginHistory\Block;


class Index extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    protected $customerSession;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Shivani\LoginHistory\Model\PostFactory $postFactory
    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function getPostCollection()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $objectManager->create("Magento\Customer\Model\Session");
        $id = $customerSession->getCustomerId();
        $post = $this->_postFactory->create();

        return $post->getCollection()
            ->addFieldToFilter('customer_id', $id);
    }
}