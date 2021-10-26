<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Image;

class StorageClear extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'storage:clear';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Refresh storage state';

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
    $path = public_path() . '/storage';

    //List all external files created in storage
    $numberOfFiles = 0;
    if (is_dir($path)) {
      if ($dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
          if ($file !== '.' && $file !== '..' && $file !== '.gitignore') {
            File::deleteDirectory($path.'/'.$file);
            $numberOfFiles++;
          }
        }
        closedir($dh);
      }
    }

    $this->line('<fg=green>Removed '.$numberOfFiles.' folders.</>');

    if (is_dir($path)) {
      if ($dh = opendir($path)) {
        File::makeDirectory($path.'/images',0777,true);
        Image::make(resource_path().'/images/default-avatar.png')->save($path.'/images/default-avatar.png');
        closedir($dh);
      }
    }
  }
}
