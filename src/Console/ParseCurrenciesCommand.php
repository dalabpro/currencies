<?php

namespace Dalabpro\Currencies\Console;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ParseCurrenciesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:currencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсим валюты';

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
        $link = 'http://www.tcmb.gov.tr/wps/wcm/connect/en/tcmb+en/main+page+site+area/today';
        $html = file_get_contents($link);

        // Create new instance for parser.
        $crawler = new Crawler($html);
//        $crawler->addHtmlContent($html, 'UTF-8');

        $title = $crawler->filter("header")->text();
        dd($title);

    }
}
