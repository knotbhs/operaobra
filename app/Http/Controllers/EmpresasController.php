<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmpresaCreateRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Repositories\EmpresaRepository;
use App\Validators\EmpresaValidator;
use App\Repositories\OrcamentosRepository;
use App\Repositories\ClientesRepository;

/**
 * Class EmpresasController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmpresasController extends Controller
{
    /**
     * @var EmpresaRepository
     */
    protected $repository;

    /**
     * @var EmpresaValidator
     */
    protected $validator;
    /**
     * @var EmpresaValidator
     */
    protected $orcamentos;
    /**
     * @var EmpresaValidator
     */
    protected $cliente;

    /**
     * EmpresasController constructor.
     *
     * @param EmpresaRepository $repository
     * @param EmpresaValidator $validator
     * @param EmpresaValidator $orcamentos
     * @param EmpresaValidator $cliente
     */
    public function __construct(EmpresaRepository $repository, EmpresaValidator $validator, OrcamentosRepository $orcamentos, ClientesRepository $cliente)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->orcamentos  = $orcamentos;
        $this->cliente  = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = $this->repository->all();
        $result = [];
        $result['empresas'] = [];
        $i = 0;
        foreach($empresas as $empresa)
        {
            $result['empresas'][$i]["empresa-nome"] = $empresa->name;
            $result['empresas'][$i]["empresa-descricao-breve"] = $empresa->obs;
            $result['empresas'][$i]["empresa-notificacoes-count"] = 14;
            $result['empresas'][$i]["empresa-id"] = $empresa->id;
            $i++;
        }
        $empresas = [["empresa-nome" => "Calhas", "empresa-descricao-breve"=>"Calhas e Telhados", "empresa-notificacoes-count" => 50, "empresa-id" => 1], 
                    ["empresa-nome" => "Pinturas", "empresa-descricao-breve"=>"Pinturas em Geral", "empresa-notificacoes-count" => 22, "empresa-id" => 2], 
                    ["empresa-nome" => "Serralheria", "empresa-descricao-breve"=>"Ferragens em Geral", "empresa-notificacoes-count" => 15, "empresa-id" => 3]];
                    
          
        //dd($empresas);
        return view('empresas.home-empresa', $result);
    }

    public function painel($id)
    {        
        $empresa = $this->repository->find($id);
        if($empresa)
        {
            $result = [];
            $result["empresa_id"] = $id;
            $result["name_empresa"] = $empresa->name;

            $orcamentos = $this->orcamentos->findWhere(["empresa_id" => $id]);
            if(count($orcamentos) > 0)
            {
                $result["orcamentos"] = [];
                for ($i=0; $i < count($orcamentos); $i++) 
                {       
                    
                    $endereco_obra = json_decode($orcamentos[$i]->endereco_obra, true);
                    $cliente = $this->cliente->find($orcamentos[$i]->cliente_id);     
                    $result["orcamentos"][$i]["id"] = $orcamentos[$i]->id;
                    $result["orcamentos"][$i]["valor"] = $orcamentos[$i]->valor;
                    $result["orcamentos"][$i]["data_inicio"] = $orcamentos[$i]->data_inicio;
                    $result["orcamentos"][$i]["etapa"] = $this->getEtapa($orcamentos[$i]->etapa);
                    $result["orcamentos"][$i]["text"] = $endereco_obra["rua"].", ".$endereco_obra["numero"]." - ".$cliente['name'];
                }     
            }
        }
        return view('empresas.home-painel', $result);
    }
    public function servico($id)
    {
        $result = [];
        $result["empresa_id"] = $id;
        return view('empresas.home-servico', $result);
    }

    public function editar($id)
    {
        $result = [];
        $result["empresa_id"] = $id;
        return view('empresas.edit-servico', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmpresaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmpresaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $empresa = $this->repository->create($request->all());

            $response = [
                'message' => 'Empresa created.',
                'data'    => $empresa->toArray(),
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
        $empresa = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $empresa,
            ]);
        }

        return view('empresas.show', compact('empresa'));
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
        $empresa = $this->repository->find($id);

        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmpresaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmpresaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $empresa = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Empresa updated.',
                'data'    => $empresa->toArray(),
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
                'message' => 'Empresa deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Empresa deleted.');
    }
    public function getEtapa($etapa)
    {
        switch ($etapa) {
            case 1:
                $etapa = '<span class="badge bg-warning">Orçamento</span>';
                break;
                case 2:                
                    $etapa = '<span class="badge bg-success">Andamento</span>';
                    break;
                case 3:                
                    $etapa = '<span class="badge bg-primary">Finalizado</span>';
                    break;
            
            default:
                $etapa = '<span class="badge bg-warning">Orçamento</span>';
                break;
        }

        return $etapa;
    }
}
