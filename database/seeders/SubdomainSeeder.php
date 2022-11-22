<?php

namespace Database\Seeders;

use App\Models\Subdomain;
use Illuminate\Database\Seeder;

class SubdomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subdomains = [
            [
                'name' => 'Main',
                'subdomain' => 'artefact.localtest.me',
                'status' => 'enable'
            ],[
                'name' => 'Poltava',
                'subdomain' => 'poltava.localtest.me',
                'status' => 'enable'
            ],
[
                'name' => 'Kyiv',
                'subdomain' => 'kyiv.localtest.me',
                'status' => 'enable'
            ],
[
                'name' => 'Ternopil',
                'subdomain' => 'ternopil.localtest.me',
                'status' => 'enable'
            ],

        ];

        foreach ($subdomains as $subdomain) {
            Subdomain::create($subdomain);
        }
    }
}
