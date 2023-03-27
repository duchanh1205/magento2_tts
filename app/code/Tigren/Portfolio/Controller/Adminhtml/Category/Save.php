<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
declare(strict_types=1);

namespace Tigren\Portfolio\Controller\Adminhtml\Category;

use Magento\Framework\Exception\LocalizedException;
use Tigren\Portfolio\Model\CategoryFactory;
use Tigren\Portfolio\Model\ResourceModel\Category as CategoryResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultInterface;

class  Save extends Action implements HttpPostActionInterface
{
    public function __construct(
        Context $context,
        private CategoryResource $resource,
        private CategoryFactory $categoryFactory
    ) {
        parent::__construct($context);
    }

    public function execute(): ResultInterface
    {
        // TODO: Implement execute() method.
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $model = $this->categoryFactory->create();
            if (empty($data['category_id'])) {
                $data['category_id'] = null;
            }
            $model->setData($data);
            try {
                $this->resource->save($model);
                $this->messageManager->addSuccessMessage(__('You Saved the new Category.'));
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $exception) {
                $this->messageManager->addExceptionMessage($exception);
            } catch (\Throwable $e) {
                $this->messageManager->addErrorMessage(__('Something went wrong while saving a new category!'));
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
