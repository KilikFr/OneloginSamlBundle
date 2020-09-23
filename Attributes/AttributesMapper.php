<?php

namespace Hslavich\OneloginSamlBundle\Attributes;

class AttributesMapper
{
    /**
     * @var array
     */
    private $attributesMap;

    public function __construct(array $attributesMap)
    {
        $this->attributesMap = $attributesMap;
    }

    public function resolveAttributes($idpName, array $attributes)
    {
        if (!isset($this->attributesMap[$idpName])) {
            return $attributes;
        }

        $map = $this->attributesMap[$idpName];

        $newAttributes = $attributes;
        foreach ($attributes as $key => $value) {
            if (isset($map[$key])) {
                $newAttributes[$map[$key]] = $value;
            }
        }

        return $newAttributes;
    }
}
