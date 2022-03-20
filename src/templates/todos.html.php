<div>
    <h1>TODO List</h1>
</div>

<!-- 
<form action="/todos" method="POST">
    <input type="text" name="name" placeholder="Todo name" />
    <input type="checkbox" name="active" value="1" />
    <input type="submit" value="Add todo" />
</form> -->
<div class="child-container p-4">
    <div class="input-group">
        <input id="user-input" name="user-input" type="text" class="form-control" placeholder="Что тебе надо выполнить?">
        <a href="#" id="btn-submit" class="btn btn-outline-secondary">Сохранить</a>
    </div>


    <div class="py-2">
        <h3>Will do</h3>
        <ul id="list-will-do">
            <!-- Вот сюда будет добавляться список задач -->
        </ul>
    </div>

    <div class="py-2">
        <h3>Done</h3>
        <ul id="list-done">
            <!-- Вот сюда будет добавляться список завершенных задач -->
        </ul>
    </div>
</div>
