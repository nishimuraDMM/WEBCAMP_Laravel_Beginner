@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contents')
<table border="1">
        <tr>
            <th>タスク名
            <th>期限
            <th>重要度
        @foreach ($list as $task)
        <tr>
            <td>{{ $task->name }}
            <td>{{ $task->period }}
            <td>{{ $task->getPriorityString() }}
            <td><a href="./detail.html">詳細閲覧</a>
            <td><a href="./edit.html">編集</a>
            <td><form action="./top.html"><button>完了</button></form>
        @endforeach
        </table>
        @endsection