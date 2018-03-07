<?php

namespace Bantenprov\PendidikanDitamatkan\Console\Commands;

use Illuminate\Console\Command;

/**
 * The PendidikanDitamatkanCommand class.
 *
 * @package Bantenprov\PendidikanDitamatkan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PendidikanDitamatkanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:angka-pendidikan-ditamatkan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\PendidikanDitamatkan package';

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
        $this->info('Welcome to command for Bantenprov\PendidikanDitamatkan package');
    }
}
