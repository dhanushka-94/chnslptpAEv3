<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /** Simple local/dev admin password. Change this before using on a live site. */
    public const ADMIN_PASSWORD = 'admin123';

    public const ADMIN_EMAIL = 'admin@chancelaptops.ae';

    public const CUSTOMER_EMAIL = 'customer@chancelaptops.ae';

    public const CUSTOMER_PASSWORD = 'customer123';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        User::create([
            'name' => 'Chance Laptops Admin',
            'email' => self::ADMIN_EMAIL,
            'password' => self::ADMIN_PASSWORD,
            'role' => 'admin',
            'status' => 'active',
            'phone' => '971581811579',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Demo Customer',
            'email' => self::CUSTOMER_EMAIL,
            'password' => self::CUSTOMER_PASSWORD,
            'role' => 'customer',
            'status' => 'active',
            'phone' => '971581811579',
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin: '.self::ADMIN_EMAIL.' / '.self::ADMIN_PASSWORD);
        $this->command->info('Customer: '.self::CUSTOMER_EMAIL.' / '.self::CUSTOMER_PASSWORD);
    }
}
