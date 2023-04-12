<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;

use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\PropertyPolicies;

class PropertyPolicyDataGenerator extends ArrayDataGenerator
{

    private PropertyPolicies $policies;

    public function __construct(PropertyPolicies $policies)
    {
        $this->policies = $policies;
    }

    public static function create(PropertyPolicies $policies): static
    {
        return new static($policies);
    }

    public function addGeneralPolicyDetails(): static
    {
        $details = null;

        if($generalPolicy = $this->policies->generalPolicy) {
            $details = [
                'description' => $generalPolicy->details,
                'showcaseType' => $generalPolicy->showcaseType
            ];
        }

        return $this->appendData([
            'generalPolicy' => $details
        ]);
    }

    public function addAgePolicyDetails(bool $addDescription = false): static
    {
        $details = null;

        if($agePolicy = $this->policies->agePolicy) {

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

            $details['infantAgeThreshold'] = $agePolicy->infantAgeThreshold;
            $details['childAgeThreshold'] = $agePolicy->childAgeThreshold;
            $details['freeChildAgeThreshold'] = $agePolicy->freeChildAgeThreshold;
            $details['noOfFreeChildGranted'] = $agePolicy->noOfFreeChildGranted;
        }

        return $this->appendData([
            'agePolicy' => $details
        ]);
    }

    public function addCheckInPolicyDetails(bool $addDescription = false): PropertyPolicyDataGenerator
    {
        $details = null;

        if($checkInPolicy = $this->policies->checkInPolicy) {
            $details = [
                'dailyStandardTime' => $checkInPolicy->dailyStandardTime,
                'earlyCheckInStatus' => $checkInPolicy->earlyCheckInStatus?->value,
                'details' => $checkInPolicy->details,
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

        if($checkOutPolicy = $this->policies->checkOutPolicy) {
            $details = [
                'dailyStandardTime' => $checkOutPolicy->dailyStandardTime,
                'lateCheckOutStatus' => $checkOutPolicy->lateCheckOutStatus?->value,
                'details' => $checkOutPolicy->details,
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
        $rules = $this->policies->rules;

        $details = [
            'guestDocumentRule' => [
                'isDocumentsRequiredOnCheckIn' => $rules?->guestDocumentRule?->isDocumentsRequiredOnCheckIn,
                'isLocalIdAllowed' => $rules?->guestDocumentRule?->isLocalIdAllowed,
                'acceptableIdentityProofs' => $rules?->guestDocumentRule?->getAcceptableIdentityProofs,
            ],
            'unmarriedCoupleRule' => [
                'isAllowed' => $rules?->unmarriedCoupleRule?->isAllowed,
                'details' => $rules?->unmarriedCoupleRule?->details
            ],
            'bachelorsRule' => [
                'isAllowed' => $rules?->bachelorsRule?->isAllowed,
                'details' => $rules?->bachelorsRule?->getDetails,
            ],
            'petsRule' => [
                'isAllowed' => $rules?->petsRule?->isAllowed,
                'details' => $rules?->petsRule?->details,
            ],
            'outsideRule' => [
                'isAllowed' => $rules?->outsideFoodRule?->isAllowed,
                'details' => $rules?->outsideFoodRule?->details,
            ]
        ];

        if($addDescription) {
            $details['guestDocumentRule']['description'] = $rules?->guestDocumentRule?->description;
            $details['unmarriedCoupleRule']['description'] = $rules?->unmarriedCoupleRule?->description;
            $details['bachelorsRule']['description'] = $rules?->bachelorsRule?->description;
            $details['petsRule']['description'] = $rules?->petsRule?->description;
            $details['outsideRule']['description'] = $rules?->outsideFoodRule?->description;
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
