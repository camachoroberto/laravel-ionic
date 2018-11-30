<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

class CreateUserAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\User::create([
            'name' => env('ADMIN_DEFAULT_NAME', 'Administrador'),
            'email' => env('ADMIN_DEFAULT_EMAIL', 'admin@user.com'),
            'password' => bcrypt(env('ADMIN_DEFAULT_PASSWORD', 'secret')),
            'role' => \App\Models\User::ROLE_ADMIN
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::where('email', '=', env('ADMIN_DEFAULT_EMAIL', 'admin@user . com'))->first();
        if($user instanceof User){
            $user->delete();
        }
    }

}
