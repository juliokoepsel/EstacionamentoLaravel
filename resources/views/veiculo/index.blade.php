@extends('veiculo.layout')

@section('titulo','Veiculo')

@section('conteudo')

<form action="{{ route('veiculo.index') }}" method="get">
  <fieldset>
    <legend>Consultar Veiculos</legend>
    @method('GET')
    <label for="find">Placa</label>
    <br>
    <input type="text" name="find" id="find">
    <br>
    <br>
    <button class="btn btn-primary" type="submit">Consultar</button>
  </fieldset>
</form>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">PLACA</th>

      <th scope="col">EDITAR</th>
      <th scope="col">EXCLUIR</th>
    </tr>
  </thead>
  </tbody>
  @foreach ($dados as $item)
  <tr>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->placa }}</td>

    <td><a href="{{ route('veiculo.edit',$item->id) }}"><button class="btn btn-sm btn-secondary">Editar</button></a></td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('veiculo.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-secondary" type="submit">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
@endsection