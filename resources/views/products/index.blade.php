<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f6f9; color: #333; }
        .container { max-width: 1000px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        h1 { margin: 0; color: #2c3e50; }
        .btn { display: inline-block; padding: 10px 15px; color: #fff; background-color: #3498db; border-radius: 5px; text-decoration: none; font-weight: bold; }
        .btn:hover { background-color: #2980b9; }
        .btn-danger { background-color: #e74c3c; }
        .btn-danger:hover { background-color: #c0392b; }
        .alert { padding: 15px; background-color: #2ecc71; color: white; border-radius: 5px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; color: #555; }
        tr:hover { background-color: #f1f2f6; }
        .actions { display: flex; gap: 10px; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Gerenciamento de Produtos</h1>
        <!-- Link para a rota de criação de produtos -->
        <a href="{{ route('products.create') }}" class="btn">+ Novo Produto</a>
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
                <th>Nome do Produto</th>
                <th>Preço Base</th>
                <th>Unidade</th>
                <th>Qtd de Variações (Itens)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><strong>{{ $product->nome }}</strong></td>
                    <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                    <td>{{ $product->und_medida }}</td>
                    <!-- Conta quantos itens estão relacionados a este produto -->
                    <td>{{ $product->productItem->count() }} variação(ões)</td>
                    <td class="actions">
                        <!-- Links para ver detalhes, editar e deletar -->
                        <a href="{{ route('products.show', $product->id) }}" class="btn" style="background-color: #2ecc71;">Ver</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn" style="background-color: #f1c40f;">Editar</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="border: none; cursor: pointer;">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #888;">Nenhum produto cadastrado. Rode as seeds ou crie um novo!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
