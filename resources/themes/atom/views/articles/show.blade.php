@extends('layouts.app')

@push('title', $article->title)

@section('content')
    <x-article.sidebar :article="$article" :articles="$articles" />
    <x-article.base :article="$article" />
@endsection
