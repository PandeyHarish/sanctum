<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            ['name' => 'Ram Bahadur', 'email' => 'ram@example.com', 'phone' => '9876543210'],
            ['name' => 'Sita Sharma', 'email' => 'sita@example.com', 'phone' => '9812345678'],
            ['name' => 'Gopal Thapa', 'email' => 'gopal@example.com', 'phone' => '9856789012'],
            ['name' => 'Rita Karki', 'email' => 'rita@example.com', 'phone' => '9801122334'],
            ['name' => 'Krishna Bhandari', 'email' => 'krishna@example.com', 'phone' => '9823456789'],
            ['name' => 'Bina Shrestha', 'email' => 'bina@example.com', 'phone' => '9845678901'],
            ['name' => 'Dipak Magar', 'email' => 'dipak@example.com', 'phone' => '9867890123'],
            ['name' => 'Sunita Rai', 'email' => 'sunita@example.com', 'phone' => '9802233445'],
            ['name' => 'Prakash Gurung', 'email' => 'prakash@example.com', 'phone' => '9811122334'],
            ['name' => 'Anjali Tamang', 'email' => 'anjali@example.com', 'phone' => '9871123456'],
        ];


        Customer::insert($customers);
    }
}
