<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SampleUsersSeeder extends Seeder
{
    /**
     * Sample customers are disabled — website keeps only the admin account.
     */
    public function run(): void
    {
        $deleted = User::where('role', 'customer')->delete();
        $this->command->info("Sample customers removed ({$deleted}). Use AdminUserSeeder for the admin account.");
    }
}
