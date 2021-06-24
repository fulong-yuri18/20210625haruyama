
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="{{ secure_asset('/css/reset.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('/css/style.css') }}">
</head>

<body>
  <div class="container">
    <div class="card">
      <p class="title mb-15">Todo List</p>
        <div class="todo">
        <form action="/add" method="post" class="flex between mb-30">
          @csrf
          <input type="text" class="input-add" name="content" />
          <input class="button-add" type="submit" value="追加" />
        </form>
        @if (count($items) > 0)
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($items as $item)
					<input type="hidden" name="id">
          <tr>
            <td>
              {{$item->created_at}}
            </td>
            <form action="edit" method="post">
              @csrf
              <td>
                <input type="text" class="input-update" value={{$item->task_name}} name="content" />
              </td>
              <td>
                <button class="button-update">更新</button>
              </td>
            </form>
            <td>
              <form action="delete" method="post">
                @csrf
                <button class="button-delete">削除</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        @endif
      </div>
    </div>
  </div>
  </div>
</body>

</html>
