<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('SentrySeeder');
        $this->command->info('Sentry tables seeded!');

        $this->call('ContentSeeder');
        $this->command->info('Content tables seeded!');
    }

}