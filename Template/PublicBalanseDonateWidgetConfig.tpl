<style>
    .form-control{
        width: 35%;
    }
</style>
<form>
    <div class="form-group">
        <label class="col-form-label" for="formGroupExampleInput">Текст заголовка виджета</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="formGroupExampleInput2">Сумма пополнения по умолчанию</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="formGroupExampleInput2">Текст кнопки пополнить</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> Показывать баланс
        </label>
    </div>
</form>
<h2>Код для встраивания на сайт:</h2><br/>
<code>
    &lt;span id="teamspeak_viewer" &gt;&lt;/span&gt;
    &lt;script type="text/javascript" &gt;

    (function() {
    document.getElementById("teamspeak_viewer").innerHTML = '&lt;object type="text/html"
    data="http://billing.service-voice.com//modules/servers/teamspeak3/viewer.php?sid=9541" &gt;&lt;/object&gt;';
    })();

    &lt;/script&gt;
</code>
<h2>Отображаемый вариант:</h2><br/>

<div class="panel panel-default" style="width: 300px; margin:auto;">
    <div class="panel-heading text-center">Донат на TS3</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="grouppay.php" target="_blank">
            <input type="hidden" name="token" value="47fe55911e7442f26798b30a3533a2a8c5d1c736">
            <input type="hidden" name="hash" value="a87ff679">
            <input type="hidden" name="pay" value="widget">
            <div class="form-group">
                <label for="input" class="col-xs-3 control-label" style="margin-top: 10px;">Сумма</label>
                <div class="col-xs-9">
                    <div class="input-group">
                        <input type="text" name="sum" class="form-control" id="input"
                               placeholder="{$DefaultAddBalanceSum}" value="{$DefaultAddBalanceSum}">
                        <span class="input-group-addon">
							<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
						</span>
                    </div>
                    <span class="help-block" style="font-size: xx-small;">минимум {$MinAddBalanceSum}
                        , максимум {$MaxAddBalanceSum}</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-3">
                    <button type="submit" class="btn btn-default">Пополнить</button>
                </div>
            </div>

            <div class="well well-sm text-center">Текущий баланс <strong>1924.5</strong></div>
        </form>
    </div>
</div>