<div>
    <h1>TODO List</h1>
</div>

<div class="child-container p-4">
        <div class="input-group">
            <input id="user-input" name="user-input" type="text" class="form-control" placeholder="Что тебе надо выполнить?">
            <a href="#" id="btn-submit" class="btn btn-outline-secondary">Сохранить</a>
        </div>
    
    <div class="py-2">
        <h3>Will do</h3>
        <ul id="list-will-do">
            
            <?php foreach ($variables['items'] as $item) : ?>
                <?php if ($item->isActive() === false): ?>
                    <div class="todo-item">
                        <li class="d-flex justify-content-start align-items-center">
                            <input id="<?php print $item->getId(); ?>" class="form-check-input done" type="checkbox" value="" <?php if ($item->isActive() === true): ?> checked <?php endif; ?>>
                            <?php print $item->getName(); ?>
                            <button id="<?php print $item->getId(); ?>" class="btn btn-delete"><i id="<?php print $item->getId(); ?>" class="fa fa-trash-o" style="font-size:1pem"></i></button>
                        </li>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            
        </ul>
    </div>

    <div class="py-2">
        <h3>Done</h3>
        <ul id="list-done">

            <?php foreach ($variables['items'] as $item) : ?>
                <?php if ($item->isActive() === true): ?>
                    <div class="todo-item">
                        <li class="d-flex justify-content-start align-items-center">
                            <input id="<?php print $item->getId(); ?>" class="form-check-input done" type="checkbox" value="" <?php if ($item->isActive() === true): ?> checked <?php endif; ?>>
                            <?php print $item->getName(); ?>
                            <button id="<?php print $item->getId(); ?>" class="btn btn-delete"><i id="<?php print $item->getId(); ?>" class="fa fa-trash-o" style="font-size:1pem"></i></button>
                        </li>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </ul>
    </div>
</div>
