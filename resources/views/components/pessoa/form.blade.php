
<form action="{{ $action }}" method="post" enctype="multipart/form-data">
  @csrf

  @if($update)
    @method('PUT')
  @endif

  <div class="mb-3">
      <label for="nome" class="form-label">Nome:</label>
      <input type="text"
             id="pes_nom"
             name="pes_nom"
             class="form-control"
             @isset($pessoa->pes_nom ) value="{{ $pessoa->pes_nom }}" @endisset >
  </div>
  
  <button type="submit" class="btn btn-primary">Salvar</button>
  <a href="{{ route('pessoa.index') }}" class="btn btn-danger">Cancelar</a>
</form>
