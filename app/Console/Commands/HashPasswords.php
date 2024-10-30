<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    protected $signature = 'hash:passwords';
    protected $description = 'Hash plain text passwords in the login table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = DB::table('login')->get();

        foreach ($users as $user) {
            // Check if the password is already hashed
            if (!Hash::needsRehash($user->password)) {
                continue;
            }

            // Hash the password and update the record
            $hashedPassword = Hash::make($user->password);
            DB::table('login')->where('empleado_id', $user->empleado_id)->update(['password' => $hashedPassword]);

            $this->info("Password hashed for user: {$user->username}");
        }

        $this->info('All passwords have been hashed.');
    }
}
