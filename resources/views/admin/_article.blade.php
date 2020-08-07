<tr>
  <th scope="row">{{ $article->id }}</th>
  <td>{{ $article->title }}</td>
  <td>{{ $article->user_id }}</td>
  <td>{{ $article->created_at }}</td>
  <td class="delete button">
   
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('您确定要删除本条微博吗？');">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <a href="{{route('show',$article->id)}}" style="font-size: 13px; top:5px">查看</a>
      <a href="{{route('articles.edit',$article->id)}}" style="font-size: 13px; top:5px">编辑</a>
      <span>
      <button type="submit" class="btn btn-link" style="color: red;  font-size:13px " >删除</button>
      </span>
      <!-- <button type="submit" class="btn btn-sm btn-danger">删除</button> -->
    </form>
    
  </td>
</tr>