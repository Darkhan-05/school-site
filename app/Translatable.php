<?php

namespace App;

use Illuminate\Support\Facades\App;

trait Translatable
{
    protected $defaultLocale = 'ru';
    public function __($originFieldName)
    {
        $locale = App::getLocale() ?? $this->defaultLocale;
        if ($locale === 'kk') {
            $fieldName = $originFieldName . '_kk';
        } else {
            $fieldName = $originFieldName;
        }
        $attributes = array_keys($this->attributes);
        if (!in_array($fieldName, $attributes)) {
            throw new \LogicException('no such attribute for model ' . get_class($this));
        }
        if ($locale === 'kk' && (is_null($this->$fieldName) || empty($this->$fieldName))) {
            return $this->$originFieldName;
        }
        return $this->$fieldName;
    }
}
