@extends('layouts.main') {{-- Chama o Layout criado no caso o main --}}
@section('title', 'PoktWeb') {{-- Define o Titulo da Pagina --}}
@section('content') {{-- Define o conteudo da pagina --}}

    @if($id != null)
        <p>Exibindo Produto Id: {{ $id }}</p>
    @endif


@endsection {{-- Determina o fim da Section de Conteudo da Pagina --}}