<style>
    .form-control {
        width: 35%;
    }
</style>
<script>
    $(function () {
        $('input').on('input keyup change', function (e) {
            console.log($(e.currentTarget).attr('name'));
            if ($(e.currentTarget).attr('name') === 'WidgetShowBalance') {
                $('#WidgetBalance').toggle()
            }
            if ($(e.currentTarget).attr('name') === 'WidgetButtonText') {
                $('#WidgetButtonText').html($(e.currentTarget).val())
            }
            if ($(e.currentTarget).attr('name') === 'WidgetDefaultAddBalanceSum') {
                $('#DefaultAddBalanceSum').val($(e.currentTarget).val());
            }
            if ($(e.currentTarget).attr('name') === 'WidgetTitle') {
                $('#WidgetTitle').text($(e.currentTarget).val());
            }
        });
    });
</script>
<h2>Настройки виджета:</h2><br/>
<form method="post">
    <div class="form-group">
        <label class="col-form-label" for="WidgetTitle">Текст заголовка виджета</label>
        <input type="text" name="WidgetTitle" class="form-control"  placeholder=""
               value="{$WidgetTitle}">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="WidgetDefaultAddBalanceSum">Сумма пополнения по умолчанию</label>
        <input type="number" class="form-control" name="WidgetDefaultAddBalanceSum"
               placeholder="" max="{$MaxAddBalanceSum}"
               value="{$WidgetDefaultAddBalanceSum}">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="WidgetButtonText">Текст кнопки пополнить</label>
        <input type="text" class="form-control" name="WidgetButtonText"  placeholder=""
               value="{$WidgetButtonText}">
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox"
                   name="WidgetShowBalance" {if $WidgetShowBalance eq 1} checked {/if}> Показывать баланс
        </label>
    </div>
    <br/>
    <input class="btn btn-primary" type="submit" name="save" value="Сохранить изменения">
</form>
<h2>Код для встраивания на сайт:</h2><br/>
<b>Разместите код приведенный ниже там где необходимо показывать виджет</b><br/>
<code>
    &lt;span id="public_balance_donate" &gt;&lt;/span&gt;
</code>
<br/><br/>
<b>Разместите код приведенный ниже между тегами &lt;head&gt;&lt;/head&gt;</b><br/>
<code>
    &lt;script type="text/javascript" &gt;
    (function() {
    document.getElementById("public_balance_donate").innerHTML = '&lt;object type="text/html"
    data="{$WHMCSSystemURL}/public/balance/{$widget_id}" &gt;&lt;/object&gt;';
    })();
    &lt;/script&gt;
</code>
<h2>Отображаемый вариант:</h2><br/>

<div class="panel panel-default" style="width: 300px; margin:auto;">
    <div id="WidgetTitle" class="panel-heading text-center">{$WidgetTitle}</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="grouppay.php" target="_blank">
            <div class="form-group">
                <label for="input" class="col-xs-3 control-label" style="margin-top: 10px;">Сумма</label>
                <div class="col-xs-9">
                    <div class="input-group">
                        <input type="number" name="DefaultAddBalanceSum" class="form-control" id="DefaultAddBalanceSum"
                               placeholder="{$WidgetDefaultAddBalanceSum}" max="{$MaxAddBalanceSum}" value="{$WidgetDefaultAddBalanceSum}">
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
                    <button id="WidgetButtonText" type="submit" class="btn btn-default">{$WidgetButtonText}</button>
                </div>
            </div>
            <div {if $WidgetShowBalance === 0} style="display: none" {/if} id="WidgetBalance" class="well well-sm text-center">Текущий баланс <strong>{$BalanceSum}</strong></div>
        </form>
    </div>
</div>
<br/>