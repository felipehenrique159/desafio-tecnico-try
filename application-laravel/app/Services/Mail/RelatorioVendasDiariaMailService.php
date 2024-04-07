<?php

namespace App\Services\Mail;

use App\Mail\RelatorioVendasDiariaMail;
use App\Repositories\VendasRepository;
use Illuminate\Support\Facades\Mail;

class RelatorioVendasDiariaMailService
{
    public function __construct(
        private readonly VendasRepository $vendasRepository
    ) {}

    public function exec(): void
    {
        $valorTotalVendas = $this->buscarTotalVendasDiaAtual();
        $this->enviarEmailTotalVendas($valorTotalVendas);
    }

    private function enviarEmailTotalVendas(float $totalVendas): void
    {
        Mail::to(env('MAIL_TO_RELATORIO_VENDAS_DIARIA'))->send(
            new RelatorioVendasDiariaMail($totalVendas)
        );
    }

    private function buscarTotalVendasDiaAtual(): float
    {
        return $this->vendasRepository->buscarTotalVendasDiaAtual();
    }
}
