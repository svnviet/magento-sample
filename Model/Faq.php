<?php

namespace Tutorial\Vietnt\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Tutorial\Vietnt\Api\Data\FaqInterface;

/**
 * Class File
 * @package Toptal\Blog\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Faq extends AbstractModel implements FaqInterface, IdentityInterface
{

    const CACHE_TAG = 'tutorial_vietnt_faq';
    protected $_cacheTag = 'tutorial_vietnt_faq';
    protected $_eventPrefix = 'tutorial_vietnt_faq';
    protected function _construct()
    {
        $this->_init('Tutorial\Vietnt\Model\ResourceModel\Faq');
    }

    public function getDefaultValues()
  	{
  		$values = [];

  		return $values;}

    /**
     * Get Title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function getImage(){
      return $this->getData(self::IMAGE);
    }
    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreateAt()
    {
        return $this->getData(self::CREATE_AT);
    }
    public function getUpdateAt(){
      return $this->getData(self::UPDATE_AT);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }


    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }


    public function getObserver(){
        return $this->getData(self::OBSERVER);

    }


    public function setObserver($observer)
    {
        return $this->setData(self::OBSERVER, $observer);
    }
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }


    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function setImage($image){
      return $this->setData(self::IMAGE,$image);
    }


    public function setCreateAt($create_at)
    {
        return $this->setData(self::CREATED_AT, $create_at);
    }

    public function setUpdateAt($update_at){
      return $this-> setData(self::UPDATE_AT, $update_at);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }
}
