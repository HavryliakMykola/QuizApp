@include('head') 
    <div class="container">
    <form action="add_question" method="POST">
            @csrf
            <input name="question" type="text" placeholder="Add your question" required/>
            <input name="answer1" type="text" placeholder="Add your first choice" required/>
            <input name="answer2" type="text" placeholder="Add your second choice" required/>
            <input name="answer3" type="text" placeholder="Add your third choice" required/>
            <input name="answer4" type="text" placeholder="Add your fourth choice" required/>
            <input name="score" type="number" placeholder="Score" required/>
            <input name="correctAnswer" type="number" placeholder="Correct Answer" required/>
            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>