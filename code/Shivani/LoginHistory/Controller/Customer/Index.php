<?php
namespace Shivani\LoginHistory\Controller\Customer;

class Index extends \Magento\Framework\App\Action\Action {
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    public function execute() {
        // render the page layout to display data
        $this->_pageFactory->create();
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
?>