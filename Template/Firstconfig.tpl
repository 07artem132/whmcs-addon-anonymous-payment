<script>
    $('#contentarea >> h1').remove();
</script>

<style type="text/css">
    .ModuleContainer {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background-color: #006eac;
        min-height: 562px;
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
        text-indent: 10px;
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
        <form role="form" action="{$basheURL}&page=firstconfig" method="post">
            <div id="welcome">[1/1] Настройка модуля</div>
            <div id="Line"></div>
            Текст кнопки
            <input type="text" name="ButtonMessage"
                   placeholder="Скопировать ссылку для публичной оплаты этого счёта в буфер обмена"
                   value="Скопировать ссылку для публичной оплаты этого счёта в буфер обмена">
            Текст сообщения после успешного скопирования ссылки в буфер обмена
            <input type="text" name="AlertSuccess"
                   placeholder="Следующий текст успешно скопирован в буфер обмена:"
                   value="Следующий текст успешно скопирован в буфер обмена:">
            Сss стиль кнопки
            <textarea name="ButtonStyle"></textarea>
            <div id="Line"></div>
            <a href="{$basheURL}&page=firstconfig">
                <button>Завершить настройку модуля</button>
            </a>
        </form>
    </div>
</div>

