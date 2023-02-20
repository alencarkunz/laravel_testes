<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaRequest;
use App\Jobs\CriarPessoas;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PessoaController extends Controller
{

  public function index(Request $request)
  {
    $pessoa = new Pessoa();
    $fil_desc = $request->input('fil_desc', '');

    if ($fil_desc > '') {
      $result =  $pessoa::where('pes_nom', 'like', '%' . $fil_desc . '%')->paginate(); //->get();
    }

    //$result = $pessoa::all();
    if (!isset($result)) $result = DB::table('PESSOA')->paginate();

    $mensagemSucesso = session('mensagem.sucesso');

    return view('pessoa.index')
      ->with('result', $result)
      ->with('filtro', ['fil_desc' => $fil_desc])
      ->with('mensagemSucesso', $mensagemSucesso);
  }

  public function create()
  {
    return view('pessoa.create');
  }

  public function store(PessoaRequest $request)
  {
    //dd($pessoa);
    //dd($request->all());
    $request['pes_datcad'] = date('Y-m-d H:i:s');
    $pessoa = Pessoa::create($request->all());

    return to_route('pessoa.index')
      ->with('mensagem.sucesso', "Pessoa '{$pessoa->pes_nom}' criada com sucesso");
  }

  public function edit(Pessoa $pessoa)
  {
    //dd($pessoa);
    return view('pessoa.edit')->with('pessoa', $pessoa);
  }

  public function update(Pessoa $pessoa, PessoaRequest $request)
  {
    //dd($pessoa);
    //dd($request->all());
    $pessoa->fill($request->all());
    $pessoa->save();

    return to_route('pessoa.index')
      ->with('mensagem.sucesso', "Pessoa '{$pessoa->pes_nom}' atualizada com sucesso");
  }

  public function show()
  {
    return redirect('pessoas');
  }

  public function destroy(Pessoa $pessoa)
  {
    $pessoa->delete();

    return to_route('pessoa.index')
      ->with('mensagem.sucesso', "Série '{$pessoa->pes_nom}' removida com sucesso");
  }

  public function executarjob() // enviar método para fila de execução
  {
    CriarPessoas::dispatch();
  }
}
