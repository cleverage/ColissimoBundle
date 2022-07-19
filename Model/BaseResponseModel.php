<?php

namespace CleverAge\ColissimoBundle\Model;

abstract class BaseResponseModel
{
    private const SETTER_PREFIX = 'set';

    public function populate(array $data): self
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (!is_array(reset($value)) && count($value) > 1) {
                    $setter = self::SETTER_PREFIX . ucfirst($key);
                    if (method_exists($this, $setter)) {
                        $this->$setter($value);
                    }
                } else {
                    foreach ($value as $item) {
                        $setter = self::SETTER_PREFIX . ucfirst($key);
                        if (method_exists($this, $setter)) {
                            $this->$setter($item);
                        }
                    }
                }
            } else {
                $setter = self::SETTER_PREFIX . ucfirst($key);
                if (method_exists($this, $setter)) {
                    $this->$setter($value);
                }
            }
        }

        return $this;
    }
}
