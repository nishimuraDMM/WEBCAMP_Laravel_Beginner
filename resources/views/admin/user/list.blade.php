@extends('admin.layout')

{{-- メインコンテンツ --}}
@section('contents')
      
 <h1>ユーザ一覧</h1>
 <table border="1">
    <tr>
        <th>ユーザーID</th>
        <th>ユーザー名</th>
        <th>タスク件数</th>

    </tr>
    <tr>
        <td>1</td>
        <td>WEB太郎</td>
        <td>１０</td>

    </tr>
    <tr>
        <td>２</td>
        <td>DMM　次郎</td>
        <td>４２</td>

    </tr>
    <tr>
        <td>４</td>
        <td>CAMP　三郎</td>
        <td>５</td>

    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}
            <td>{{ $user->name }}
            <td>{{ $user->task_num }}
    @endforeach
 </table>
  @endsection