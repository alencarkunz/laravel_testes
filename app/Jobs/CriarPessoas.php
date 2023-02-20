<?php

namespace App\Jobs;

use App\Models\Pessoa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CriarPessoas implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  public $tries = 5;
  public $timeout = 240;

  /**
   * Create a new job instance.
   */
  public function __construct()
  {
    //
  }

  /**
   * Execute the job.
   */
  public function handle() //: void
  {
    $insert = [];
    $insert['pes_nom'] = 'Job - ' . date('Y-m-d H:i:s');
    $insert['pes_datcad'] = date('Y-m-d H:i:s');
    return Pessoa::create($insert);
  }
}
