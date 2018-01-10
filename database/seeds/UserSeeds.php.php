<?php

use Illuminate\Database\Seeder;

class UserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = factory(App\Entity\User::class, 10000)
            ->create()
            ->each(function ($u) {
                $u->items()->saveMany(factory(App\Entity\UserOrder::class, rand(10, 30))->create(['user_id' => $u->user_id]));
            });
    }
}
