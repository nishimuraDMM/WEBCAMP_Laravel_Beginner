@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contents')
<h1>完了タスクの一覧</h1>
<a href="/task/list">タスク一覧に戻る</a><br>
<table border="1">
        <tr>
            <th>タスク名
            <th>期限
            <th>重要度
                <th>タスク終了日
        @foreach ($list as $task)
        <tr>
            <td>{{ $task->name }}
            <td>{{ $task->period }}
            <td>{{ $task->getPriorityString() }}
            <td>{{ $task->created_at }}

        @endforeach
        </table>
        <a href="/logout">ログアウト</a><br>
        @endsection