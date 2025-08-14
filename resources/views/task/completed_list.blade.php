@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contents')
<a href="/task/list">タスク一覧に戻る</a><br>
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
        @endforeach
        </table>
        <a href="/logout">ログアウト</a><br>
        @endsection