@include('head') 
    <div class="container">
        <a href="/admin/quiz/add" class="add_new">Add new quiz</a>
        <ul class="items">
            @foreach ($list as $item)
            <li class="item">
                <a href="/admin/quiz/{{$item->id}}">
                    <span>{{$item->name}}</span>
                    <p>{{$item->created}}</p>
                </a>
                <strong>Status : {{$item->status}}</strong>
                <a href="/admin/change_status/{{$item->id}}">Toggle status</a>
                <a href="/admin/delete_quiz/{{$item->id}}">Delete</a>
            </li>
            @endforeach
        </ul>
        <a href="/admin/quiz/add" class="add_new">Add new quiz</a>
    </div>
</body>
</html>