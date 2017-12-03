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
        width: 300px;
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
        min-width: 200px;
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

    .ModuleContainer button:hover {
        background-color: #039df4;
    }
</style>
<div class="ModuleContainer">
    <div>
        <div id="welcome">Подготовка к установке</div>
        <div id="Line"></div>
        Данный модуль позволяет клиентам делиться публичной ссылкой на оплату счета.
        <div id="Line"></div>
        <a href="{$basheURL}&page=firstconfig">
            <button>Установить</button>
        </a>
    </div>
</div>


