<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\PropertyPolicies;

class PropertyPolicyDataGenerator
{
    use Helpers;

    protected PropertyPolicies $policies;

    protected function __construct(PropertyPolicies $policies)
    {
        $this->policies = $policies;
    }
    
    public function addGeneralPolicyDetails(): static
    {
        $details = null;

        if($generalPolicy = $this->policies->getGeneralPolicy()) {
            $details = [
                'description' => $generalPolicy->getDetails(),
                'showcaseType' => $generalPolicy->getShowcaseType()
            ];
        }

        return $this->appendData([
            'generalPolicy' => $details
        ]);
    }

    public function addAgePolicyDetails(): static
    {
        $details = null;

        if($agePolicy = $this->policies->getAgePolicy()) {
            $details = [
                'description' => [
                    $agePolicy->infantAgeDefinition(),
                    $agePolicy->childAgeDefinition(),
                    $agePolicy->adultAgeDefinition(),
                ]
            ];
        }

        return $this->appendData([
            'agePolicy' => $details
        ]);
    }
}
