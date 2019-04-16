<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="width: 170px">ID</th>
        <th>Vista previa</th>
        <th>Titulo</th>
        <th>Ventas</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($items as $item)
        <tr is="table-row" id="{{ $item->id() }}"></tr>
    @endforeach

    @if ($items->isEmpty())
        <tr>
            <td colspan="4" class="text-center">
                No se encontraron resultados
            </td>
        </tr>
    @endif

    </tbody>
</table>

<div class="text-xs-center">
    {!! $items->links() !!}
</div>
