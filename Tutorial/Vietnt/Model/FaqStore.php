<?php
namespace Tutorial\Vietnt\Model;


use \Tutorial\Vietnt\Api\Data\FaqStoreInterface;

class FaqStore extends \Magento\Framework\Model\AbstractModel implements \Tutorial\Vietnt\Api\Data\FaqStoreInterface
{
	const CACHE_TAG = 'tutorial_vietnt_faqstore';

	protected $_cacheTag = 'tutorial_vietnt_faqstore';

	protected $_eventPrefix = 'tutorial_vietnt_faqstore';

	protected function _construct()
	{
		$this->_init('Tutorial\Vietnt\Model\ResourceModel\FaqStore');
	}

    public function getIdTab()
    {
        return $this->getData(self::IDTAB);
    }

    public function setIdTab($id_tab)
    {
        return $this->setData(self::IDTAB, $id_tab);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getStoreId()
    {
        return $this->getData(self::STOREID);
    }

    public function setStoreId($store_id)
    {
        return $this->setData(self::STOREID, $store_id);
    }


}
