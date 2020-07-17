<?php

namespace Repositories;

use App\Repositories\AdRepository;
use Illuminate\Support\Facades\App;
use Mockery\Mock;
use PHPUnit\Framework\TestCase;

class AdRepositoryTest extends TestCase
{
    protected $adMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->adMock = \Mockery::mock('ad');
        $this->adMock->id = 1;
    }

    /** @test */
    public function it_fetch_an_ad()
    {
        $this->adMock->shouldReceive('showBy')->with($this->adMock->id)->andReturn('foo');
        $adRepository = App::make(App\Repositories\AdRepository::class, array($this->adMock));
        $this->assertEquals('foo', $adRepository->showBy($this->adMock->id));
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

}
