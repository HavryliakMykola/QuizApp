@include('head') 
    <div class="container">
        <h2>{{$question->question}}</h2>
        {{-- answer 1  --}}


        <form action="" method="POST">
            @csrf
            <label for="Answer1">{{$question->answer1}}</label>
            <input type="radio" value="1" name="answer" class="question">

            <label for="Answer2">{{$question->answer2}}</label>
            <input type="radio" value="2" name="answer" class="question">

            <label for="Answer3">{{$question->answer3}}</label>
            <input type="radio" value="3" name="answer" class="question">

            <label for="Answer4">{{$question->answer4}}</label>
            <input type="radio" value="4" name="answer" class="question">

            <button type="submit">Answer</button>
        </form>
    </div>
</body>
</html>