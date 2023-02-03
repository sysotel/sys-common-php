<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum StateSlug: string
{
    use BackedEnumHelpers;

    case JHARKHAND = 'jharkhand';
    case TRIPURA = 'tripura';
    case PUBJAB = 'punjab';
    case ANDHRA_PRADESH = 'andhra-pradesh';
    case GUJARAT = 'gujarat';
    case IN_WEST_BENGAL = 'west-bengal';
    case IN_MAHARASHTRA = 'maharashtra';
    case IN_DAMAN_DIU = 'daman-diu';
    case IN_RAJASTHAN = 'rajasthan';
    case IN_TELANGANA = 'telangana';
    case IN_KARNATAKA = 'karnataka';
    case IN_KERALA = 'kerala';
    case IN_ASSAM = 'assam';
    case IN_DELHI = 'delhi';
    case IN_TAMIL_NADU = 'tamil-nadu';
    case IN_MANIPUR = 'manipur';
    case IN_HARYANA = 'haryana';
    case IN_LAKSHADWEEP = 'lakshadweep';
    case IN_ANDAMAN_NICOBAR = 'andaman-nicobar';
    case IN_BIHAR = 'bihar';
    case IN_NAGALAND = 'nagaland';
    case IN_DADRA_NAGAR_HAVELI = 'dadra-nagar-haveli';
    case IN_HIMACHAL_PRADESH = 'himachal-pradesh';
    case IN_ARUNACHAL_PRADESH = 'arunachal-pradesh';
    case IN_PONDICHERRY = 'pondicherry-state';
    case IN_JAMMU_KASHMIR = 'jammu-kashmir';
    case IN_UTTARAKHAND = 'uttarakhand';
    case IN_ORISSA = 'orissa';
    case IN_CHANDIGARH = 'chandigarh';
    case IN_MADHYA_PRADESH = 'madhya-pradesh';
    case IN_UTTAR_PRADESH = 'uttar-pradesh';
    case IN_MIZORAM = 'mizoram';
    case IN_MEGHALAYA = 'meghalaya';
    case IN_CHHATTISGARH = 'chhattisgarh';
    case IN_SIKIIM = 'sikkim';
    case IN_GOA = 'goa';
}
