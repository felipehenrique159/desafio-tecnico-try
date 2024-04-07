<?php

namespace Unit\Services;

use App\Http\Resources\ListarVendasPorVendedorResource;
use App\Http\Resources\NovaVendaResource;
use App\Models\Vendas;
use App\Repositories\VendasRepository;
use App\Services\ComissaoService;
use App\Services\VendasService;
use PHPUnit\Framework\TestCase;

class VendasServiceTest extends TestCase
{
    private $vendasRepositoryMock;
    private $vendasService;
    private $vendas;
    private $comissaoServiceMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->vendasRepositoryMock = $this->createMock(VendasRepository::class);
        $this->comissaoServiceMock = $this->createMock(ComissaoService::class);

        $this->vendasService = (new VendasService(
            $this->vendasRepositoryMock,
            $this->comissaoServiceMock
        ));

        $this->vendas = (new Vendas());
    }

    protected function tearDown(): void
    {
        $this->vendasRepositoryMock = null;
        $this->vendasService = null;
        $this->vendas = null;
        $this->comissaoServiceMock = null;

        parent::tearDown();
    }

    public function testNovaVenda()
    {
        $this->vendas->id = 1;
        $this->vendas->valor_da_venda = 100;
        $this->vendas->comissao = 8.5;

        $this->comissaoServiceMock->expects($this->once())
            ->method('calcularComissao')
            ->willReturn(8.5);

        $this->vendasRepositoryMock->expects($this->once())
            ->method('salvar')
            ->willReturn($this->vendas);

        $retorno = $this->vendasService->novaVenda([
            'id_vendedor' => 1,
            'valor_da_venda' => 100
        ]);

        $this->assertInstanceOf(NovaVendaResource::class, $retorno);
    }

    public function testVendasPorVendedor()
    {
        $this->vendasRepositoryMock->expects($this->once())
            ->method('listarVendasPorVendedor')
            ->willReturn([
                [
                    'id' => 1,
                    'nome' => 'Teste',
                    'email' => 'teste@teste.com',
                    'comissao' => 100.00,
                    'valor_da_venda' => 1000.00,
                    'data_da_venda' => '2024-04-07 17:52:24'
                ],
            ]);

        $responseArray = $this->vendasService->listarVendasPorVendedor(1);

        $this->assertEquals(ListarVendasPorVendedorResource::class, $responseArray->collects);
    }
}
