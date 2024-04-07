<?php

namespace App\Console\Commands;

use App\Repositories\VendasRepository;
use App\Services\Mail\RelatorioVendasDiariaMailService;
use Illuminate\Console\Command;

class RelatorioVendasCommand extends Command
{
    protected $signature = 'relatorio:vendas';

    protected $description = 'Relatório de vendas do dia';

    public function handle()
    {
        (new RelatorioVendasDiariaMailService(
            (new VendasRepository)
        ))->exec();

        $this->info('E-mail enviado com sucesso ...');
    }
}
