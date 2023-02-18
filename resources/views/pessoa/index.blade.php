<x-layout :mensagem-sucesso="$mensagemSucesso">

  <x-slot:title>Pessoas</x-slot>
  
  <div class="mt-2 mb-2">
    <form class="d-flex" role="search">
      <a href="{{ route('pessoa.create') }}" class="btn btn-success me-2">Adicionar</a>
      <input class="form-control me-2 w-25" type="search" placeholder="Descrição" name="fil_desc" value="{{ $filtro['fil_desc'] }}">
      <button class="btn btn-primary" type="submit">Pesquisar</button>
    </form>
  </div>
  
  <div class="table-responsive">
    <table class="table table-striped table-hover caption-top">
      <caption>Lista de Pessoas</caption>
      <thead>
        <tr>
          <th>Cód.</th>
          <th>Nome</th>
          <th>Data Cad.</th>
          <th>Data Upd.</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($result as $row)
      <tr>
        <td>{{ $row->pes_id }}</td>
        <td>{{ $row->pes_nom }}</td>
        <td>{{ $row->pes_datcad }}</td>
        <td>{{ $row->updated_at }}</td>
        <td>
          <form action="{{ route('pessoa.destroy', $row->pes_id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('pessoa.edit', $row->pes_id) }}" class="btn btn-primary btn-sm">editar</a>
              <button class="btn btn-danger btn-sm">excluir</button>
          </form>
        </td>
      </tr>  
      @endforeach
      </tbody>
    </table>
    {{ $result->links('vendor.pagination.bootstrap-5-my') }}
  </div>

  
</x-layout>