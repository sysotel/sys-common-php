<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\PropertyPolicies;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct\PropertyProduct;

class PropertyPolicyDataGenerator
{
    use Helpers;

    protected PropertyPolicies $policies;

    protected function __construct(PropertyPolicies $policies)
    {
        $this->policies = $policies;
    }
    
    public function addGeneralPolicy(): static
    {
        $data = [
            'generalPolicy' => null
        ];

        if($generalPolicy = $this->policies->getGeneralPolicy()) {
            $data['generalPolicy'] = [
                'generalPolicy' => $generalPolicy->getDetails(),
                'showcaseType' => $generalPolicy->getShowcaseType()
            ];
        }

        return $this->appendData($data);
    }
}
