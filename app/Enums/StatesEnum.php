<?php

namespace App\Enums;

enum StatesEnum: string
{
    // Malaysia
    case JOHOR = 'johor';
    case KEDAH = 'kedah';
    case KELANTAN = 'kelantan';
    case MALACCA = 'malacca';
    case NEGERI_SEMBILAN = 'negeri sembilan';
    case PAHANG = 'pahang';
    case PENANG = 'penang';
    case PERAK = 'perak';
    case PERLIS = 'perlis';
    case SABAH = 'sabah';
    case SARAWAK = 'sarawak';
    case SELANGOR = 'selangor';
    case TERENGGANU = 'terengganu';
    case KUALA_LUMPUR = 'kuala lumpur';
    case LABUAN = 'labuan';
    case PUTRAJAYA = 'putrajaya';

    public function label(): string
    {
        return match ($this) {
            static::JOHOR => 'Johor',
            static::KEDAH => 'Kedah',
            static::KELANTAN => 'Kelantan',
            static::MALACCA => 'Malacca (Melaka)',
            static::NEGERI_SEMBILAN => 'Negeri Sembilan',
            static::PAHANG => 'Pahang',
            static::PENANG => 'Penang',
            static::PERAK => 'Perak',
            static::PERLIS => 'Perlis',
            static::SABAH => 'Sabah',
            static::SARAWAK => 'Sarawak',
            static::SELANGOR => 'Selangor',
            static::TERENGGANU => 'Terengganu',
            static::KUALA_LUMPUR => 'Kuala Lumpur',
            static::LABUAN => 'Labuan',
            static::PUTRAJAYA => 'Putrajaya',
        };
    }
}
