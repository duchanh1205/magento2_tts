<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Model;

use Tigren\Portfolio\Model\ResourceModel\Category\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $categoryCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $categoryCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $categoryCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData(): array
    {
        return [];

    }
}

//declare(strict_types=1);
//
//namespace Tigren\Portfolio\Model\Category;
//
//use Tigren\Portfolio\Model\Category;
//use Tigren\Portfolio\Model\CategoryFactory;
//use Tigren\Portfolio\Model\ResourceModel\Category as CategoryResource;
//use Tigren\Portfolio\Model\ResourceModel\Category\CollectionFactory;
//use Magento\Framework\App\RequestInterface;
//use Magento\Ui\DataProvider\Modifier\PoolInterface;
//use Magento\Ui\DataProvider\ModifierPoolDataProvider;
//
//class DataProvider extends ModifierPoolDataProvider
//{
//    /**
//     * @var array
//     */
//    private array $loadedData;
//
//    /**
//     * DataProvider Constructor.
//     * @param $name
//     * @param $primaryFieldName
//     * @param $requestFieldName
//     * @param CollectionFactory $collectionFactory
//     * @param CategoryResource $resource
//     * @param CategoryFactory $categoryFactory
//     * @param RequestInterface $request
//     * @param array $meta
//     * @param array $data
//     * @param PoolInterface|null $pool
//     */
//
//    public function __construct(
//        $name,
//        $primaryFieldName,
//        $requestFieldName,
//        CollectionFactory $collectionFactory,
//        private CategoryResource $resource,
//        private CategoryFactory $categoryFactory,
//        private RequestInterface $request,
//        array $meta = [],
//        array $data = [],
//        PoolInterface $pool = null
//    ) {
//        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
//        $this->collection = $collectionFactory->create();
//    }
//
//    /**
//     * @retrun Category
//     */
//
//    public function getData(): array
//    {
//        if (isset($this->loadedData)) {
//            return $this->loadedData;
//
//        }
//        $category = $this->getCurrentPost();
//        $this->loadedData[$category->getId()] = $category->getData();
//
//        return $this->loadedData;
//    }
//
//    /**
//     * @return Category
//     */
//    private function getCurrentPost(): Category
//    {
//        $categoryId = $this->getPostId();
//        $category = $this->categoryFactory->create();
//        if (!$categoryId) {
//            return $category;
//        }
//        $this->resource->load($category, $categoryId);
//
//        return $category;
//    }
//
//    /**
//     * @return int
//     */
//    private function getPostId(): int
//    {
//        //return (int)$this->request->getParam($this->getRequestFieldName());
//
//        return (int)$this->request->getParam('category_id');
//    }
//}
