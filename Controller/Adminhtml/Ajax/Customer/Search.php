<?php
/**
 * Abm
 *
 * Author : Tony Liu
 * Blog: https://www.abmbio.xin
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @package Loyalty_PointsMall
 */

namespace Loyalty\PointsMall\Controller\Adminhtml\Ajax\Customer;

class Search extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;

    protected $jsonHelper;

    protected $search;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context  $context
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Loyalty\PointsMall\Model\Customer\Search $search
    ){

        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        $this->search = $search;

        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {

            $id = $this->getRequest()->getParam('id');
            $query = $this->getRequest()->getParam('q');
            $page = ($this->getRequest()->getParam('page')) ? $this->getRequest()->getParam('page') : 1;

            if($this->getRequest()->getParam('search')){
                $this->search = $this->_objectManager->create('Loyalty\PointsMall\Model\Virtual\\' . $this->getRequest()->getParam('search'));
            }

            if($query) {
                $items = $this->search->searchCollection($query,$page);
            }

            if($id){
                $items = $this->search->loadInitialValue($id);
            }

            if($query || $id){
                $response = [
                    'query'=> $query,
                    'total_count' => count($items),
                    'page' => $page,
                    'items'=> $items
                ];
                return $this->jsonResponse($response);
            };

            return $this->jsonResponse([]);
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            return $this->jsonResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->jsonResponse($e->getMessage());
        }
    }

    /**
     * Create json response
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function jsonResponse($response = '')
    {
        return $this->getResponse()->representJson(
            $this->jsonHelper->jsonEncode($response)
        );
    }
}