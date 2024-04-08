<?php

namespace Unit\Services;

use App\Http\Resources\VendedoresResource;
use App\Models\Vendedor;
use App\Repositories\VendedorRepository;
use App\Services\VendedorService;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\TestCase;

class VendedorServiceTest extends TestCase
{
    private $vendedorRepositoryMock;
    private $vendedorService;
    private $vendedor;

    protected function setUp(): void
    {
        parent::setUp();

        $this->vendedorRepositoryMock = $this->createMock(VendedorRepository::class);
        $this->vendedorService = (new VendedorService(
            $this->vendedorRepositoryMock
        ));
        $this->vendedor = (new Vendedor);
    }

    protected function tearDown(): void
    {
        $this->vendedorRepositoryMock = null;

        parent::tearDown();
    }

    public function testNovoVendedor()
    {
        $vendedor = $this->vendedor;
        $vendedor->id = 1;
        $vendedor->nome = 'teste';
        $vendedor->email = 'teste@teste.com';

        $this->vendedorRepositoryMock->expects($this->once())
            ->method('salvarNovoVendedor')
            ->willReturn($vendedor);

        $retorno = $this->vendedorService->criarVendedor([
            'nome' => 'teste',
            'email' => 'teste@teste.com'
        ]);

        $this->assertInstanceOf(Vendedor::class, $retorno);
    }

    public function testListarTodosComComissao()
    {
        $colecao = new Collection();

        $colecao->push([
            'id' => 1,
            'nome' => 'Teste',
            'email' => 'teste@teste.com'
        ]);

        $this->vendedorRepositoryMock->expects($this->once())
            ->method('listarTodosComComissao')
            ->willReturn($colecao);

        $responseArray = $this->vendedorService->listarTodosComComissao();

        $this->assertEquals(VendedoresResource::class, $responseArray->collects);
    }
}
