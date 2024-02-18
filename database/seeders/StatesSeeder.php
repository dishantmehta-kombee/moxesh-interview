<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        State::create(['name' => 'New York', 'status' => 1]);
//        State::create(['name' => 'California', 'status' => 1]);

        DB::table('states')->insert([
            ['name' => 'ANDHRA PRADESH'],
            ['name' => 'ASSAM'],
            ['name' => 'ARUNACHAL PRADESH'],
            ['name' => 'BIHAR'],
            ['name' => 'GUJRAT'],
            ['name' => 'HARYANA'],
            ['name' => 'HIMACHAL PRADESH'],
            ['name' => 'JAMMU & KASHMIR'],
            ['name' => 'KARNATAKA'],
            ['name' => 'KERALA'],
            ['name' => 'MADHYA PRADESH'],
            ['name' => 'MAHARASHTRA'],
            ['name' => 'MANIPUR'],
            ['name' => 'MEGHALAYA'],
            ['name' => 'MIZORAM'],
            ['name' => 'NAGALAND'],
            ['name' => 'ORISSA'],
            ['name' => 'PUNJAB'],
            ['name' => 'RAJASTHAN'],
            ['name' => 'SIKKIM'],
            ['name' => 'TAMIL NADU'],
            ['name' => 'TRIPURA'],
            ['name' => 'UTTAR PRADESH'],
            ['name' => 'WEST BENGAL'],
            ['name' => 'DELHI'],
            ['name' => 'GOA'],
            ['name' => 'PONDICHERY'],
            ['name' => 'LAKSHDWEEP'],
            ['name' => 'DAMAN & DIU'],
            ['name' => 'DADRA & NAGAR'],
            ['name' => 'CHANDIGARH'],
            ['name' => 'ANDAMAN & NICOBAR'],
            ['name' => 'UTTARANCHAL'],
            ['name' => 'JHARKHAND'],
            ['name' => 'CHATTISGARH'],
        ]);
    }
}
