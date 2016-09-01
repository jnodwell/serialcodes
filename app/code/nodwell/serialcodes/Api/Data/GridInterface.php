<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/25/16
 * Time: 6:38 AM
 */

namespace nodwell\serialcodes\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const SERIALCODES_ID = 'serialcodes_id';
    const CODE = 'code';
    const SKU = 'sku';
    const TYPE = 'type';
    const STATUS = 'status';
    const ORDER_ID = 'order_id';
    const ORDER_ITEM_ID = 'order_item_id';
    const NOTE = 'note';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';

    /**
     * Get SerialcodesId.
     *
     * @return int
     */
    public function getSerialcodesId();

    /**
     * Set SerialcodesId.
     */
    public function setSerialcodesId($serialcodesId);

    /**
     * Get Code.
     *
     * @return varchar
     */
    public function getCode();

    /**
     * Set Code.
     */
    public function setCode($code);

    /**
     * Get Sku.
     *
     * @return varchar
     */
    public function getSku();

    /**
     * Set Sku.
     */
    public function setSku($sku);

    /**
     * Get Type.
     *
     * @return varchar
     */
    public function getType();

    /**
     * Set Type.
     */
    public function setType($type);

    /**
     * Get Note.
     *
     * @return varchar
     */
    public function getNote();

    /**
     * Set Note.
     */
    public function setNote($note);

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set Status.
     */
    public function setStatus($status);

    /**
     * Get OrderId.
     *
     * @return int
     */
    public function getOrderId();

    /**
     * Set OrderId.
     */
    public function setOrderId($orderId);

    /**
     * Get OrderItemId.
     *
     * @return int
     */
    public function getOrderItemId();

    /**
     * Set OrderItemId.
     */
    public function setOrderItemId($orderItemId);

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime();

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime);

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}