<?php

namespace App\Enums;

enum BanksEnum: string
{
    case MAYBANK = 'maybank';
    case CIMB = 'cimb';
    case PUBLIC_BANK = 'public bank';
    case RHB_BANK = 'rhb bank';
    case HONG_LEONG_BANK = 'hong leong bank';
    case AMBANK = 'ambank';
    case UOB = 'uob';
    case BANK_RAKYAT = 'bank rakyat';
    case OCBC_BANK = 'ocbc bank';
    case HSBC_BANK = 'hsbc bank';
    case BANK_ISLAM = 'bank islam';
    case AFFIN_BANK = 'affin bank';
    case ALLIANCE_BANK = 'alliance bank';
    case STANDARD_CHARTED_BANK = 'standard charted bank';
    case MBSB_BANK = 'mbsb bank';
    case CITIBANK = 'citibank';
    case BSN = 'bsn';
    case AGROBANK = 'agrobank';

    public function label(): string
    {
        return match ($this) {
            static::MAYBANK => 'Malayan Banking Berhad',
            static::CIMB => 'CIMB Group Holdings',
            static::PUBLIC_BANK => 'Public Bank Berhad',
            static::RHB_BANK => 'RHB Bank',
            static::HONG_LEONG_BANK => 'Hong Leong Bank',
            static::AMBANK => 'AmBank',
            static::UOB => 'UOB Malaysia',
            static::BANK_RAKYAT => 'Bank Rakyat',
            static::OCBC_BANK => 'OCBC Bank Malaysia',
            static::HSBC_BANK => 'HSBC Bank Malaysia',
            static::BANK_ISLAM => 'Bank Islam Malaysia',
            static::AFFIN_BANK => 'Affin Bank',
            static::ALLIANCE_BANK => 'Alliance Bank Malaysia Berhad',
            static::STANDARD_CHARTED_BANK => 'Standard Chartered Bank Malaysia',
            static::MBSB_BANK => 'MBSB Bank Berhad',
            static::CITIBANK => 'Citibank Malaysia',
            static::BSN => 'Bank Simpanan Nasional (BSN)',
            static::AGROBANK => 'Agrobank',
        };
    }
}
