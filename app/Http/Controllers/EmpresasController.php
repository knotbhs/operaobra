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
use App\Repositories\ServicosRepository;
use App\Repositories\MateriaisRepository;

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
     * @var OrcamentosValidator
     */
    protected $orcamentos;
    /**
     * @var ClientesValidator
     */
    protected $cliente;
    /**
     * @var ServicosValidator
     */
    protected $servicos;
    /**
     * @var MateriaisValidator
     */
    protected $materiais;

    /**
     * EmpresasController constructor.
     *
     * @param EmpresaRepository $repository
     * @param EmpresaValidator $validator
     * @param OrcamentosValidator $orcamentos
     * @param ClientesValidator $cliente
     * @param ServicosValidator $servicos
     * @param MateriaisValidator $materiais
     */
    public function __construct(EmpresaRepository $repository, EmpresaValidator $validator, OrcamentosRepository $orcamentos, ClientesRepository $cliente, ServicosRepository $servicos, MateriaisRepository $materiais)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->orcamentos  = $orcamentos;
        $this->cliente  = $cliente;
        $this->servicos  = $servicos;
        $this->materiais  = $materiais;
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
                    
                    $endereco_obra = $orcamentos[$i]->endereco_obra;
                    $cliente = $this->cliente->find($orcamentos[$i]->cliente_id);     
                    $result["orcamentos"][$i]["id"] = $orcamentos[$i]->id;
                    $result["orcamentos"][$i]["valor"] = $orcamentos[$i]->valor;
                    $result["orcamentos"][$i]["data_inicio"] = $orcamentos[$i]->data_inicio;
                    $result["orcamentos"][$i]["etapa"] = $this->getEtapa($orcamentos[$i]->etapa);
                    $result["orcamentos"][$i]["text"] = $cliente['name']." - ".$endereco_obra['rua'];
                }     
            }
        }
        return view('empresas.home-painel', $result);
    }
    public function orcamento($empresa_id, $orcamento_id)
    {
        $orcamento = $this->orcamentos->find($orcamento_id);
        $servicos = $this->servicos->findWhere(["orcamento_id" => $orcamento_id]);
        $materiais = $this->materiais->findWhere(["orcamento_id" => $orcamento_id]);
        $result = [];
        $result["empresa"] = $this->repository->find($orcamento['empresa_id']);
        $result["cliente"] = $this->cliente->find($orcamento['cliente_id']);
        $result["orcamento"] = $this->orcamentos->find($orcamento_id);
        $result["orcamento"]["servicos"] = $servicos;
        $result["orcamento"]["materiais"] = $materiais;
        $result["orcamento"]["etapa"] = $this->getEtapaNoFormat($result["orcamento"]["etapa"]);
        $result["valor_servicos"] = 0;
        $result["valor_materiais"] = 0;
        //Somando valores dos serviços
        for ($i=0; $i < count($servicos); $i++) 
        { 
            $result["valor_servicos"] += $servicos[$i]["valor"];
        }
        for ($i=0; $i < count($materiais); $i++) 
        { 
            $result["valor_materiais"] += $materiais[$i]["valor"];
        }
        $result["valor_total"] = number_format($result["valor_servicos"] + $result["valor_materiais"],2,",",".");

        $result["valor_servicos"] = number_format($result["valor_servicos"],2,",",".");
        $result["valor_materiais"] = number_format($result["valor_materiais"],2,",",".");        
        
        return view('empresas.home-servico', $result);
    }

    public function editar($id, $orcamento_id)
    {
        $result = [];
        $result["empresa_id"] = $id;
        $orcamento = $this->orcamentos->find($orcamento_id);
        $servicos = $this->servicos->findWhere(["orcamento_id" => $orcamento_id]);
        $materiais = $this->materiais->findWhere(["orcamento_id" => $orcamento_id]);
        $result = [];
        $result["empresa"] = $this->repository->find($orcamento['empresa_id']);
        $result["cliente"] = $this->cliente->find($orcamento['cliente_id']);
        $result["orcamento"] = $this->orcamentos->find($orcamento_id);
        $result["orcamento"]["servicos"] = $servicos;
        $result["orcamento"]["materiais"] = $materiais;
        $result["orcamento"]["etapa"] = $this->getEtapaNoFormat($result["orcamento"]["etapa"]);
        $result["valor_servicos"] = 0;
        $result["valor_materiais"] = 0;
        //Somando valores dos serviços
        for ($i=0; $i < count($servicos); $i++) 
        { 
            $result["valor_servicos"] += $servicos[$i]["valor"];
        }
        for ($i=0; $i < count($materiais); $i++) 
        { 
            $result["valor_materiais"] += $materiais[$i]["valor"];
        }
        $result["valor_total"] = number_format($result["valor_servicos"] + $result["valor_materiais"],2,",",".");

        $result["valor_servicos"] = number_format($result["valor_servicos"],2,",",".");
        $result["valor_materiais"] = number_format($result["valor_materiais"],2,",",".");


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
    public function getEtapaNoFormat($etapa)
    {
        switch ($etapa) {
            case 1:
                $etapa = 'Orçamento';
                break;
                case 2:                
                    $etapa = 'Andamento';
                    break;
                case 3:                
                    $etapa = 'Finalizado';
                    break;
            
            default:
                $etapa = 'Orçamento';
                break;
        }

        return $etapa;
    }
}
