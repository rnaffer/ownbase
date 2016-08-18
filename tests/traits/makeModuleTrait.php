<?php

use Faker\Factory as Faker;
use App\Module;
use App\Repositories\ModuleRepository;

trait MakeModuleTrait
{
    /**
     * Create fake instance of Module and save it in database
     *
     * @param array $moduleFields
     * @return Module
     */
    public function makeModule($moduleFields = [])
    {
        /** @var ModuleRepository $moduleRepo */
        $moduleRepo = App::make(ModuleRepository::class);
        $theme = $this->fakeModuleData($moduleFields);
        return $moduleRepo->create($theme);
    }

    /**
     * Get fake instance of Module
     *
     * @param array $moduleFields
     * @return Module
     */
    public function fakeModule($moduleFields = [])
    {
        return new Module($this->fakeModuleData($moduleFields));
    }

    /**
     * Get fake data of Module
     *
     * @param array $postFields
     * @return array
     */
    public function fakeModuleData($moduleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'father_id' => 1,
        ], $moduleFields);
    }
}
