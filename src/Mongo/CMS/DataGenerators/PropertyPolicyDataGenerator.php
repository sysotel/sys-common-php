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

                $details['infantAgeDefinition'] = $agePolicy->childAgeDefinition();
                $details['childAgeDefinition'] = $agePolicy->childAgeDefinition();
                $details['adultAgeDefinition'] = $agePolicy->childAgeDefinition();
                $details['freeChildDefinition'] = $agePolicy->freeChildDefinition();

                $details['description'] = array_filter([
                    $agePolicy->infantAgeDefinition(),
                    $agePolicy->childAgeDefinition(),
                    $agePolicy->adultAgeDefinition(),
                    $agePolicy->freeChildDefinition(),
                ]);
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
                'lateCheckOutStatus' => $checkOutPolicy->getLateCheckOutStatus()?->value,
                'details' => $checkOutPolicy->getDetails(),
            ];

            if($addDescription) {
                $details['checkInDescription'] = $checkOutPolicy->checkOutTimeDescription();
                $details['lateCheckOutDescription'] = $checkOutPolicy->lateCheckoutDescription();
                $details['fullDescription'] = $checkOutPolicy->fullDescription();
            }
        }

        return $this->appendData([
            'checkOutPolicy' => $details
        ]);
    }

    public function addRules(bool $addDescription = false): PropertyPolicyDataGenerator
    {
        $rules = $this->policies->getRules();

        $details = [
            'guestDocumentRule' => [
                'isDocumentsRequiredOnCheckIn' => $rules?->getGuestDocumentRule()?->isDocumentsRequiredOnCheckIn(),
                'isLocalIdAllowed' => $rules?->getGuestDocumentRule()?->isLocalIdAllowed(),
                'acceptableIdentityProofs' => $rules?->getGuestDocumentRule()?->getAcceptableIdentityProofs(),
            ],
            'unmarriedCoupleRule' => [
                'isAllowed' => $rules?->getUnmarriedCoupleRule()?->isAllowed(),
                'details' => $rules?->getUnmarriedCoupleRule()?->getDetails(),
            ],
            'bachelorsRule' => [
                'isAllowed' => $rules?->getBachelorsRule()?->isAllowed(),
                'details' => $rules?->getBachelorsRule()?->getDetails(),
            ],
            'petsRule' => [
                'isAllowed' => $rules?->getPetsRule()?->isAllowed(),
                'details' => $rules?->getPetsRule()?->getDetails(),
            ],
            'outsideRule' => [
                'isAllowed' => $rules?->getOutsideFoodRule()?->isAllowed(),
                'details' => $rules?->getOutsideFoodRule()?->getDetails(),
            ]
        ];

        if($addDescription) {
            $details['guestDocumentRule']['description'] = $rules?->getGuestDocumentRule()?->description();
            $details['unmarriedCoupleRule']['description'] = $rules?->getUnmarriedCoupleRule()?->description();
            $details['bachelorsRule']['description'] = $rules?->getBachelorsRule()?->description();
            $details['petsRule']['description'] = $rules?->getPetsRule()?->description();
            $details['outsideRule']['description'] = $rules?->getOutsideFoodRule()?->description();
            $details['description'] = [];

            foreach($details as $ruleName => $ruleDetails) {
                if(isset($ruleDetails['description'])) {
                    $details['description'][] = $ruleDetails['description'];
                }
            }
        }

        return $this->appendData([
            'rules' => $details
        ]);
    }
}
