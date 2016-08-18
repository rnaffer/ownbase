<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModuleAPITest extends TestCase
{
    use MakeModuleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;
    /**
     * @test
     */
    public function testCreateModule()
    {
        $module = $this->fakeModuleData();
        $this->json('POST', '/api/v1/modules', $module);

        $this->assertApiResponse($module);
    }

    /**
     * @test
     */
    public function testReadModule()
    {
        $module = $this->makeModule();
        $this->json('GET', '/api/v1/modules/'.$module->id);

        $this->assertApiResponse($module->toArray());
    }

    /**
     * @test
     */
    public function testUpdateModule()
    {
        $module = $this->makeModule();
        $editedModule = $this->fakeModuleData();

        $this->json('PUT', '/api/v1/modules/'.$module->id, $editedModule);

        $this->assertApiResponse($editedModule);
    }

    /**
     * @test
     */
    public function testDeleteModule()
    {
        $module = $this->makeModule();
        $this->json('DELETE', '/api/v1/modules/'.$module->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/modules/'.$module->id);

        $this->assertResponseStatus(404);
    }
}
