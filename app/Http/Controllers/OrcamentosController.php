<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\OrcamentosCreateRequest;
use App\Http\Requests\OrcamentosUpdateRequest;
use App\Repositories\OrcamentosRepository;
use App\Validators\OrcamentosValidator;

/**
 * Class OrcamentosController.
 *
 * @package namespace App\Http\Controllers;
 */
class OrcamentosController extends Controller
{
    /**
     * @var OrcamentosRepository
     */
    protected $repository;

    /**
     * @var OrcamentosValidator
     */
    protected $validator;

    /**
     * OrcamentosController constructor.
     *
     * @param OrcamentosRepository $repository
     * @param OrcamentosValidator $validator
     */
    public function __construct(OrcamentosRepository $repository, OrcamentosValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $orcamentos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $orcamentos,
            ]);
        }

        return view('orcamentos.index', compact('orcamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrcamentosCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(OrcamentosCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $orcamento = $this->repository->create($request->all());

            $response = [
                'message' => 'Orcamentos created.',
                'data'    => $orcamento->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orcamento = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $orcamento,
            ]);
        }

        return view('orcamentos.show', compact('orcamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orcamento = $this->repository->find($id);

        return view('orcamentos.edit', compact('orcamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OrcamentosUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(OrcamentosUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $orcamento = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Orcamentos updated.',
                'data'    => $orcamento->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Orcamentos deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Orcamentos deleted.');
    }
}
