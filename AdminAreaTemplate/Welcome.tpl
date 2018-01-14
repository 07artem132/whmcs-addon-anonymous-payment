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
        width: 435px;
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
        min-width: 430px;
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
        <div id="welcome">{$LangModule::Translate('PreparingForInstallation')}</div>
        <div id="Line"></div>
        {$LangModule::Translate('ModuleDescription')}
        <div id="Line"></div>
        <a href="{$ModuleLink}&page=checkminimumrequirements">
            <button>{$LangModule::Translate('CheckMinimumRequirements')}</button>
        </a>
    </div>
</div>


