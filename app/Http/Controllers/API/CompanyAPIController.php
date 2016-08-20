<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Response;

/**
 * Class CompanyAPIController
 * @package App\Http\Controllers\API
 */

class CompanyAPIController extends Controller
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     */
    public function index(Request $request)
    {
        $companys = $this->companyRepository->pushCriteria($request)->all();

        return response()->json($companys->toArray());
    }

    /**
     * @param CreateCompanyAPIRequest $request
     * @return Response
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $companys = $this->companyRepository->create($input);

        return response()->json($companys->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function show($id, Request $request)
    {
        /** @var Company $company */
        $company = $this->companyRepository->pushCriteria($request)->find($id);

        if (empty($company)) {
            return response('Company not found', 404);
        }

        return response()->json($company->toArray());
    }

    /**
     * @param int $id
     * @param UpdateCompanyAPIRequest $request
     * @return Response
     *
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return response('Company not found', 404);
        }

        $company = $this->companyRepository->update($input, $id);

        return response()->json($company->toArray());
    }

    /**
     * @param int $id
     * @return Response
     *
     */
    public function destroy($id)
    {
        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return response('Company not found', 404);
        }

        $company->delete();

        return response()->json($id);
    }
}
