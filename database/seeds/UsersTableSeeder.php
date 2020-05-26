<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Defualt users account password
     * 
     * @var string
     */
    private const PASSWORD = 'test1234';
    
    /**
     * Developemt user account
     * 
     * @var array
     */
    private const USERS = [
        ['username' => 'themba.ngubeni', 'name' => 'Themba', 'surname' => 'Ngubeni', 'email' => 'thembangubeni04@gmail.com'],
        ['username' => 'musa.ngubeni', 'name' => 'Musa', 'surname' => 'Ngubeni', 'email' => 'musa@gmail.com'],
        ['username' => 'gugulethu.mkwanazi', 'name' => 'Gugulethu', 'surname' => 'Mkwanazi', 'email' => 'gugulethu@gmail.com']
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::USERS as $user) {
            User::create([
                'profile_picture' => 'http://localhost:8000/default/image/' . User::PROFILE_PICTURE,
                'username' => $user['username'],
                'email' => $user['email'],
                'name' => $user['name'],
                'surname' => $user['surname'],
                'password' => Hash::make(self::PASSWORD),
            ]);
        }
    }
}
