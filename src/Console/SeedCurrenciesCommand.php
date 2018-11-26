<?php

namespace Dalab\Currencies\Console;

use Artisan;
use Illuminate\Console\Command;

class SeedCurrenciesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:currencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавляем демо данные для валют';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $class = "\\Dalab\\Currencies\\Database\\Seed\\DatabaseSeeder";

        Artisan::call('db:seed', ['--class' => $class]);
    }
}
