<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {trait}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make trait';

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
     * @return int
     */
    public function handle()
    {
        $trait_name = ucfirst($this->argument('trait'));
        $content = "<?php\n\nnamespace App\Traits;\n\ntrait $trait_name\n{\n\n\t\n\n}";

        if (file_exists(base_path('app/Traits/'.$trait_name.'.php'))) {
            $this->error($trait_name. ' trait already exists!');
            return 0;
        }

        if (!file_exists(base_path('app/Traits'))) {
            mkdir('app/Traits', 0777, true);
        }
        
        $f = fopen('app/Traits/'.$trait_name.'.php', 'wb');
        if (!$f) {
            $this->error('Error creating the file ' . $trait_name);
            return 0;
        }
        fwrite($f,$content);
        fclose($f);
        $this->info("$trait_name trait created successfully.");
        return 0;
    }
}
