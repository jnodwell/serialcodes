<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/25/16
 * Time: 6:59 AM
 */

/**
 * Grid Grid Collection.
 * @category    nodwell
 * @author      nodwell.net
 */
namespace nodwell\serialcodes\Model\ResourceModel\Grid\Serialcodes;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'serialcodes_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('nodwell\serialcodes\Model\SerialcodesGridInterface', 'nodwell\serialcodes\Model\ResourceModel\Grid\Serialcodes');
    }
}