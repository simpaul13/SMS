<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class CreateProcessCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:process {name}';

    protected $files;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new process';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        $this->files=$files;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $process = $this->argument('name');

        if(empty($process)) {
            return $this->error('Process Name Invalid..!');
        }

$processContents =
'<?php
namespace App\Processes;

use Illuminate\Http\Request;
use App\Models\ '.$process.';
use Illuminate\Support\Facades\DB;

class '.$process.'Process
{
    protected $request, $'.strtolower($process).';

    public function __construct($request = null)
    {
        $this->request = $request ? (object) $request : request();
    }

    public function find($id)
    {
        $this->'.strtolower($process).' = '.$process.'::findOrFail($id);

        return $this;
    }

    public function '.strtolower($process).'()
    {
        return $this->'.strtolower($process).';
    }

    public function create()
    {
        DB::transaction(function(){
            $this->create'.$process.'();
        });
    }

    public function update()
    {
        DB::transaction(function(){
            $this->update'.$process.'();
        });
    }

    public function create'.$process.'()
    {
        $this->request->validate([
        ]);

        $this->'.strtolower($process).' = '.$process.'::create([
        ]);

        return $this;
    }

    public function update'.$process.'()
    {
        $this->request->validate([
        ]);

        $this->'.strtolower($process).'->update([
        ]);

        return $this;
    }

}';

        if ($this->confirm('Do you wish to create '.$process.' Composer file?')) {
            $file = "${process}Process.php";
            $path=app_path();

            $file=$path."/Processes/$file";
            $composerDir=$path."/Processes";

            if($this->files->isDirectory($composerDir)){
                if($this->files->isFile($file))
                    return $this->error($process.' File Already exists!');

                if(!$this->files->put($file, $processContents))
                    return $this->error('Something went wrong!');
                $this->info("$process generated!");
            }
            else{
                $this->files->makeDirectory($composerDir, 0777, true, true);

                if(!$this->files->put($file, $processContents))
                    return $this->error('Something went wrong!');
                $this->info("$process generated!");
            }

        }
    }
}
