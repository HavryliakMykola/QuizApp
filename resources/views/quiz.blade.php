@include('head') 
    <div class="container">
        <h2>Title of Quiz {{$quiz->name}}</h2>
        <a href="/admin/quiz/{{$quiz->id}}/add">Add questions</a>
    </div>
    <div class="container">

        <ol>
        @foreach ($quiz->quizQuestions as $item)
        <li>
            {{$item->question}}
        </li>
        @endforeach
        </ol>
    </div>
</body>
</html>