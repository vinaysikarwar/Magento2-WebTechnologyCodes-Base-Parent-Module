<?php
/**
 * @author WebTechnologyCodes Team
 * @copyright Copyright (c) 2017 WebTechnologyCodes (https://www.WebTechnologyCodes.com)
 * @package WebTechnologyCodes_Base
 */

namespace WebTechnologyCodes\Base\Model;

/**
 * Wrapper for Serialize
 */
class Serializer
{
    /**
     * @var null|\Magento\Framework\Serialize\SerializerInterface
     */
    private $serializer;

    /**
     * @var \Magento\Framework\Unserialize\Unserialize
     */
    private $unserialize;

    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\Unserialize\Unserialize $unserialize
    ) {
        if (interface_exists('\Magento\Framework\Serialize\SerializerInterface')) {
            // for magento later then 2.2
            $this->serializer = $objectManager->get('\Magento\Framework\Serialize\SerializerInterface');
        }
        $this->unserialize = $unserialize;
    }

    public function serialize($value)
    {
        if ($this->serializer === null) {
            return serialize($value);
        }

        return $this->serializer->serialize($value);
    }

    public function unserialize($value)
    {
        if ($this->serializer === null) {
            return $this->unserialize->unserialize($value);
        }

        try {
            return $this->serializer->unserialize($value);
        } catch (\InvalidArgumentException $exception) {
            return unserialize($value);
        }
    }
}
