<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Itens dos Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f6f9; color: #333; }
        .container { max-width: 1000px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        h1 { margin: 0; color: #2c3e50; }
        .btn { display: inline-block; padding: 10px 15px; color: #fff; background-color: #3498db; border-radius: 5px; text-decoration: none; font-weight: bold; font-size: 14px; }
        .btn:hover { background-color: #2980b9; }
        .btn-danger { background-color: #e74c3c; }
        .btn-danger:hover { background-color: #c0392b; }
        .alert { padding: 15px; background-color: #2ecc71; color: white; border-radius: 5px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; color: #555; }
        tr:hover { background-color: #f1f2f6; }
        .actions { display: flex; gap: 10px; }
        .badge-color { display: inline-flex; align-items: center; gap: 6px; padding: 4px 8px; border-radius: 4px; background: #eee; font-size: 13px; font-weight: bold; }
        .color-preview { width: 12px; height: 12px; border-radius: 5px; border: 1px solid #ccc; display: inline-block; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Variações e Itens em Estoque</h1>
        <!-- Link para a rota de criação de itens -->
        <a href="{{ route('items.create') }}" class="btn" style="background-color: #9b59b6;">+ Vincular Novo Item</a>
    </div>

    <!-- Mensagem de Sucesso do Controller -->
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto Pai</th>
                <th>Cor / Variação</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <!-- Exibe o nome do produto pai através do relacionamento -->
                    <td><strong>{{ $item->product->name ?? 'Produto não encontrado' }}</strong></td>
                    <td>
                        <span class="badge-color">
                            <!-- Tenta renderizar um quadradinho com a cor de fundo dinamicamente -->
                            <span class="color-preview" style="background-color: {{ $item->cor }};"></span>
                            {{ ucfirst($item->cor) }}
                        </span>
                    </td>
                    <td>{{ $item->qtd }} {{ $item->product->und_medida ?? 'UN' }}</td>
                    <td>R$ {{ number_format($item->valor, 2, ',', '.') }}</td>
                    <td class="actions">
                        <a href="{{ route('items.edit', $item->id) }}" class="btn" style="background-color: #f1c40f;">Editar</a>

                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover esta variação?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="border: none; cursor: pointer;">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #888;">Nenhum item ou variação cadastrada para os produtos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
