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

    public function addAgePolicyDetails(bool $addDescription = false): static
    {
        $details = null;

        if($agePolicy = $this->policies->getAgePolicy()) {

            if($addDescription) {
                $details['description'] = [
                    $agePolicy->infantAgeDefinition(),
                    $agePolicy->childAgeDefinition(),
                    $agePolicy->adultAgeDefinition(),
                ];
            }

            $details['infantAgeThreshold'] = $agePolicy->getInfantAgeThreshold();
            $details['childAgeThreshold'] = $agePolicy->getChildAgeThreshold();
            $details['freeChildAgeThreshold'] = $agePolicy->getFreeChildAgeThreshold();
            $details['noOfFreeChildGranted'] = $agePolicy->getNoOfFreeChildGranted();
        }

        return $this->appendData([
            'agePolicy' => $details
        ]);
    }

    public function addCheckInPolicyDetails(bool $addDescription = false): PropertyPolicyDataGenerator
    {
        $details = null;

        if($checkInPolicy = $this->policies->getCheckInPolicy()) {
            $details = [
                'dailyStandardTime' => $checkInPolicy->getDailyStandardTime(),
                'earlyCheckInStatus' => $checkInPolicy->getEarlyCheckInStatus()?->value,
                'details' => $checkInPolicy->getDetails(),
            ];

            if($addDescription) {
                $details['checkInDescription'] = $checkInPolicy->checkInTimeDescription();
                $details['earlyCheckInDescription'] = $checkInPolicy->earlyCheckInDescription();
                $details['fullDescription'] = $checkInPolicy->fullDescription();
            }
        }

        return $this->appendData([
            'checkInPolicy' => $details
        ]);
    }

    public function addCheckOutPolicyDetails(bool $addDescription = false): PropertyPolicyDataGenerator
    {
        $details = null;

        if($checkOutPolicy = $this->policies->getCheckOutPolicy()) {
            $details = [
                'dailyStandardTime' => $checkOutPolicy->getDailyStandardTime(),
                'earlyCheckInStatus' => $checkOutPolicy->getLateCheckOutStatus()?->value,
                'details' => $checkOutPolicy->getDetails(),
            ];

            if($addDescription) {
                $details['checkInDescription'] = $checkOutPolicy->checkOutTimeDescription();
                $details['earlyCheckInDescription'] = $checkOutPolicy->lateCheckoutDescription();
                $details['fullDescription'] = $checkOutPolicy->fullDescription();
            }
        }

        return $this->appendData([
            'checkOutPolicy' => $details
        ]);
    }
}
