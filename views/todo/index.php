<div class="box-task container rounded border">
    <h3>LIST</h3>
    <form action="" class="row container">
        <input type="text" placeholder="type youre task" id="inp" class="form-control rounded col-10">
        <button type="submit" id="btn" class="btn btn-info col-2">Send</button>
    </form>
    <div class="tasks m-5">
        <ul>
            <?php
            foreach ($result as $i) {
                $state = ($i['state']) ?  'Выполнено' : 'Выполнить';
                $class = ($i['state']) ?  'success' : 'primary';
                echo '<div class="row gx-3 container border mb-3">
                <a href="http://localhost:8888/todo/web/?r=todo/edit&id=' . $i['id'] . '" class="col-1 btn btn-warning">edit</a>
                <div class="col-8 text-left" contenteditable="true" data-id="' . $i['id'] . '">
            ' . $i['name'] . '
                </div>
                <a href="http://localhost:8888/todo/web/?r=todo/update&id=' . $i['id'] . '" class="btn-' . $class . ' btn col-2">
            ' . $state . '
                </a>
                <a href="`http://localhost:8888/todo/web/?r=todo/delete&id=' . $i['id'] . '" class="btn-danger btn col-1">delete</a>
                </div>';
            }
            ?>
        </ul>
    </div>

    <a href="http://localhost:8888/todo/web/?r=todo/deletedone" class="btn-secondary btn">Delete done</a>
</div>
<script>
    const btn = document.querySelector('#btn');
    const inp = document.querySelector('#inp');
    const task = document.querySelector('.task-wrapper');
    let modalEdit = document.createElement('div');
    modalEdit.classList.add('modalEdit');



    btn.addEventListener('click', (e) => {

        if (inp.value !== "") {
            e.preventDefault();
            window.location.href = `http://localhost:8888/todo/web/?r=todo/add&name=${inp.value}`
        } else {
            e.preventDefault();
            inp.classList.add('border-danger');
            setTimeout(() => {
                inp.classList.remove('border-danger');
            }, 1000)
        }
    })
    let contents = document.querySelectorAll('[contenteditable="true"]')
    for (i = 0; i < contents.length; i++) {
        contents[i].addEventListener('keyup', (e) => {
            if (e.keyCode === 13) {
                console.log(e.target.textContent);
                let id = e.target.getAttribute("data-id");
                window.location.href = `http://localhost:8888/todo/web/?r=todo/changes&id=${id}&name=${e.target.textContent}`;
            }
        })
    }
</script>