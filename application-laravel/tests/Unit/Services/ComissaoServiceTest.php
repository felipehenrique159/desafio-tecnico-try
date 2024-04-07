<?php

namespace Unit\Services;

use App\Services\ComissaoService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ComissaoServiceTest extends TestCase
{
    private $comissaoService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->comissaoService = (new ComissaoService());
    }

    protected function tearDown(): void
    {
        $this->comissaoService = null;

        parent::tearDown();
    }

    public static function providerCalculoDeComissao()
    {
        return [
            'Comissao com taxa 8.5% e valor venda R$ 100' => [8.5, 100, 8.50],
            'Comissao com taxa 8.5% e valor venda R$ 350' => [8.5, 350, 29.75],
            'Comissao com taxa 8.5% e valor venda R$ 700' => [8.5, 700, 59.50],
            'Comissao com taxa 8.5% e valor venda R$ 1250' => [8.5, 1250, 106.25],
            'Comissao com taxa 8.5% e valor venda R$ 1420,30' => [8.5, 1420.30, 120.73]
        ];
    }

    #[DataProvider('providerCalculoDeComissao')]

    public function testCalculoDeComissao(float $porcentagemComissao,float $valorVenda, float $valorCalculadoComissaoEsperada)
    {
        $comissaoCalculada = $this->comissaoService->calcularComissao($porcentagemComissao, $valorVenda);

        $this->assertEquals($valorCalculadoComissaoEsperada, $comissaoCalculada);
    }
}
