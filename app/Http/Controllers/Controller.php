<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Support\Message;
use App\Support\Seo;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $message;
    protected $seo;
    protected $Configuracoes;

    public function __construct()
    {
        $this->message = new Message();
        $this->seo = new Seo();
        //$this->configuracoes = \App\Models\Configuracoes::find(1);
    }
}
