<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Enums\BanksEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = $this->getBanks();

        foreach ($banks as $bank) {
            Bank::firstOrCreate([
                'name' => $bank['name']
            ]);
        }
    }

    private function getBanks(): array
    {
        return [
            [
                'name' => BanksEnum::MAYBANK->label()
            ],
            [
                'name' => BanksEnum::CIMB->label()
            ],
            [
                'name' => BanksEnum::PUBLIC_BANK->label()
            ],
            [
                'name' => BanksEnum::RHB_BANK->label()
            ],
            [
                'name' => BanksEnum::HONG_LEONG_BANK->label()
            ],
            [
                'name' => BanksEnum::AMBANK->label()
            ],
            [
                'name' => BanksEnum::UOB->label()
            ],
            [
                'name' => BanksEnum::BANK_RAKYAT->label()
            ],
            [
                'name' => BanksEnum::OCBC_BANK->label()
            ],
            [
                'name' => BanksEnum::HSBC_BANK->label()
            ],
            [
                'name' => BanksEnum::BANK_ISLAM->label()
            ],
            [
                'name' => BanksEnum::AFFIN_BANK->label()
            ],
            [
                'name' => BanksEnum::ALLIANCE_BANK->label()
            ],
            [
                'name' => BanksEnum::STANDARD_CHARTED_BANK->label()
            ],
            [
                'name' => BanksEnum::MBSB_BANK->label()
            ],
            [
                'name' => BanksEnum::CITIBANK->label()
            ],
            [
                'name' => BanksEnum::BSN->label()
            ],
            [
                'name' => BanksEnum::AGROBANK->label()
            ],
        ];
    }
}
