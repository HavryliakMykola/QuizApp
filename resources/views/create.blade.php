@include('head') 
    <div class="container">
        <form action="add_quiz" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Add your quiz name" required/>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>