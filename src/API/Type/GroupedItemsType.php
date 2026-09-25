<?php

namespace garethp\ews\API\Type;

use Countable;
use ArrayAccess;
use IteratorAggregate;

use garethp\ews\API\Type;

/**
 * Class representing GroupedItemsType
 *
 *
 * XSD Type: GroupedItemsType
 *
 * @method string getGroupIndex()
 * @method GroupedItemsType setGroupIndex(string $groupIndex)
 * @method ArrayOfRealItemsType getItems()
 * @method GroupedItemsType setItems(ArrayOfRealItemsType $items)
 */
class GroupedItemsType extends Type implements Countable, ArrayAccess, IteratorAggregate
{

    /**
     * @var string
     */
    protected $groupIndex = null;

    /**
     * @var \garethp\ews\API\Type\ArrayOfRealItemsType
     */
    protected $items = null;

    #[\ReturnTypeWillChange]
    public function count()
    {
        return count($this->items);
    }

    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return $this->items->getIterator();
    }
}
