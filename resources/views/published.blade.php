@include('head') 

    <div class="container">
        <ul>
            @foreach ($quizes as $item)
            <li>
                <h2>{{$item['name']}}</h2>
                <a href="/app/take/{{$item['firstQuestionId']}}">Start quiz</a>
                <p>You can get up to {{$item['maxScore']}} points </p>
                <h3>Good Luck!</h3>
                <span>{{$item['created']}}</span>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>