<h1><?= $result['name'] ?></h1>



<input type="text" placeholder="Введите изменения" id="value" />

<button onclick="save(<?= $result['id']; ?>)">Save Change</button>


<script>
 

    function save(e) {
        const value = document.querySelector('#value').value;
        window.location.href = `http://localhost:8888/todo/web/?r=todo/change&id=${e}&name=${value}`;
    }
</script>