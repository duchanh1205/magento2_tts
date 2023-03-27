<?php

/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

declare(strict_types=1);

namespace Tigren\Portfolio\Controller\Adminhtml\Details;

use Magento\Framework\Exception\LocalizedException;
use Tigren\Portfolio\Model\DetailsFactory;
use Tigren\Portfolio\Model\ResourceModel\Details as DetailsResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultInterface;

class  Save extends Action implements HttpPostActionInterface
{
    public function __construct(
        Context $context,
        private DetailsResource $resource,
        private DetailsFactory $detailsFactory
    ) {
        parent::__construct($context);
    }

    public function execute(): ResultInterface
    {


        // TODO: Implement execute() method.
        $data = $this->getRequest()->getPostValue();
        $image = $data['thumbnail_image'][0];
        if (isset($image['name']) && $image['name'] != '') {
            try {
                $uploader = $this->_fileUploaderFactory->create(['fileId' => 'thumbnail_image']);
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);
                $path = $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface')
                    ->getStore()
                    ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
                $result = $uploader->save($path . 'thumbnail_image');
                $data['thumbnail_image'] = $result['file'];
            } catch (\Exception $e) {
                $data['thumbnail_image'] = $image['name'];
            }
        } else {
            if (isset($image['value'])) {
                $data['thumbnail_image'] = $image['value'];
            } else {
                $data['thumbnail_image'] = '';
            }
        }
        $image = $data['base_image'][0];
        if (isset($image['name']) && $image['name'] != '') {
            try {
                $uploader = $this->_fileUploaderFactory->create(['fileId' => 'base_image']);
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);
                $path = $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface')
                    ->getStore()
                    ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
                $result = $uploader->save($path . 'base_image');
                $data['base_image'] = $result['file'];
            } catch (\Exception $e) {
                $data['base_image'] = $image['name'];
            }
        } else {
            if (isset($image['value'])) {
                $data['base_image'] = $image['value'];
            } else {
                $data['base_image'] = '';
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $model = $this->detailsFactory->create();
            if (empty($data['portfolio_id'])) {
                $data['portfolio_id'] = null;
            }
            $model->setData($data);
            try {
                $this->resource->save($model);
                $this->messageManager->addSuccessMessage(__('You Saved the new Details.'));
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $exception) {
                $this->messageManager->addExceptionMessage($exception);
            } catch (\Throwable $e) {
                $this->messageManager->addErrorMessage(__('Something went wrong while saving a new details!'));
            }
        }
        return $resultRedirect->setPath('*/*/');

    }
}
