<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/24/16
 * Time: 12:44 AM
 *
 * nodwell serialcodes Serialcodes Grid
 * @category nodwell
 * @package serialcodes
 * @author nodwell.net
 */

namespace nodwell\serialcodes\Model;

use nodwell\serialcodes\Api\Data\GridInterface;

class SerialcodesGridInterface extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'serialcodes';

    /**
     * @var string
     */
    protected $_cacheTag = 'serialcodes';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'serialcodes';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
       // $this->_init('nodwell\serialcodes\Model\ResourceModel\Grid\Serialcodes\Collection');
        // last change UNDO??
        $this->_init('nodwell\serialcodes\Model\ResourceModel\Serialcodes');
        //we are intializing with the appropriate resource model for this model
    }
    /**
     * Get SerialcodesId.
     *
     * @return int
     */
    public function getSerialcodesId()
    {
        return $this->getData(self::SERIALCODES_ID);
    }

    /**
     * Set SerialcodesId.
     */
    public function setSerialcodesId($serialcodesId)
    {
        return $this->setData(self::SERIALCODES_ID, $serialcodesId);
    }

    /**
     * Get Code.
     *
     * @return varchar
     */
    public function getCode() {
        return $this->getData(self::CODE);
    }

    /**
     * Set Code.
     */
    public function setCode($code) {
        return $this->setData(self::CODE, $code);
    }

    /**
     * Get Sku.
     *
     * @return varchar
     */
    public function getSku() {
        return $this->getData(self::SKU);
    }

    /**
     * Set Sku.
     */
    public function setSku($sku) {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Get Type.
     *
     * @return varchar
     */
    public function getType() {
        return $this->getData(self::TYPE);
    }

    /**
     * Set Type.
     */
    public function setType($type) {
        return $this->setData(self::TYPE, $type);
    }

    /**
     * Get Note.
     *
     * @return varchar
     */
    public function getNote() {
        return $this->getData(self::NOTE);
    }

    /**
     * Set Note.
     */
    public function setNote($note) {
        return $this->setData(self::NOTE,$note);
    }

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus() {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Status.
     */
    public function setStatus($status) {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get OrderId.
     *
     * @return int
     */
    public function getOrderId() {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * Set OrderId.
     */
    public function setOrderId($orderId) {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * Get OrderItemId.
     *
     * @return int
     */
    public function getOrderItemId() {
        return $this->getData(self::ORDER_ITEM_ID);
    }

    /**
     * Set OrderItemId.
     */
    public function setOrderItemId($orderItemId) {
        return $this->setData(self::ORDER_ITEM_ID, $orderItemId);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getSerialcodesId(), self::CACHE_TAG . '_' . $this->getSerialcodesId()];
    }    
}
