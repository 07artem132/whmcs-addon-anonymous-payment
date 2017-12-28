<script>
    $('#contentarea >> h1').remove();
    $(".contentarea").css("padding","0px");
</script>

<style type="text/css">
    .ModuleContainer {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background-color: #006eac;
        min-height: 592px;
        font-family: 'Roboto', sans-serif;
    }

    .ModuleContainer div {
        width: 510px;
        color: white;
        font-family: 'Roboto', sans-serif;
    }

    .ModuleContainer #welcome {
        text-transform: uppercase;
    }

    .ModuleContainer b {
        margin-left: 5px;
        font-size: large;
    }

    .ModuleContainer button {
        min-width: 240px;
        height: 30px;
        background-color: #008fdf;
        color: white;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, .2);
        border: none;
        margin-top: 5px;
        border-radius: 5px;

    }

    .ModuleContainer button:hover {
        cursor: pointer;
    }

    .ModuleContainer #Line {
        height: 1px;
        width: 100%;
        background-color: white;
        opacity: .4;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .ModuleContainer input {
        width: 500px;
        height: 30px;
        border-radius: 5px;
        text-indent: 10px;
        font-family: 'Roboto', sans-serif;
        border: 0;
        margin-top: 5px;
        margin-bottom: 10px;
        opacity: .95;
        color: #006eac;
    }

    .ModuleContainer textarea {
        width: 500px;
        height: 70px;
        border-radius: 5px;
        padding-left: 10px;
        font-family: 'Roboto', sans-serif;
        border: 0;
        margin-top: 5px;
        margin-bottom: 5px;
        opacity: .95;
        color: #006eac;
    }

    .ModuleContainer button:hover {
        background-color: #039df4;
    }
</style>
<div class="ModuleContainer">
    <div>
        <form role="form" action="{$ModuleLink}&page=dashboard" method="post">
            <div id="welcome">Настройка модуля</div>
            <div id="Line"></div>
            В разработке....
            Для изменения настроек нажмите "Удалить данные модуля"
            <div id="Line"></div>
            <button>Сохранить изменения</button>
            <a href="{$ModuleLink}&page=cleardata" class="btn btn-danger">
                Удалить данные модуля
            </a>

        </form>
    </div>
</div>

