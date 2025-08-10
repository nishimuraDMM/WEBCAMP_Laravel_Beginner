<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
     public function list()
    { // 1Page辺りの表示アイテム数を設定
        $per_page = 2;
             // 一覧の取得
        $list = TaskModel::where('user_id', Auth::id())
        ->orderBy('priority', 'DESC')
        ->orderBy('period')
        ->orderBy('created_at')
        ->get();
$sql = TaskModel::where('user_id', Auth::id())
        ->orderBy('priority', 'DESC')
        ->orderBy('period')
        ->orderBy('created_at')
        ->toSql();
//echo "<pre>\n"; var_dump($sql, $list); exit;
var_dump($sql);

return view('task.list', ['list' => $list]);

        }
        public function register(TaskRegisterPostRequest $request)
{  // validate済みのデータの取得
     // validate済みのデータの取得
     $datum = $request->validated();
     //
     //$user = Auth::user();
     //$id = Auth::id();
     //var_dump($datum, $user, $id); exit;

     // user_id の追加
     $datum['user_id'] = Auth::id();

     // テーブルへのINSERT
     try {
         $r = TaskModel::create($datum);
         // var_dump($r); exit;
     } catch(\Throwable $e) {
         // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
         echo $e->getMessage();
         exit;
     }

     // タスク登録成功
     $request->session()->flash('front.task_register_success', true);

     // リダイレクト
     return redirect('/task/list');
 }
   /**
     * タスクの詳細閲覧
     */
    public function detail($task_id)
    {
        // task_idのレコードを取得する
        $task = TaskModel::find($task_id);
        if ($task === null) {
            return redirect('/task/list');
        }
        if ($task->user_id !== Auth::id()) {
            return redirect('/task/list');
        }
        // テンプレートに「取得したレコード」の情報を渡す
        return view('task.detail', ['task' => $task]);
    }
}