<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="panel panel-default" style="width: 300px; margin:auto;">
    <div id="WidgetTitle" class="panel-heading text-center">{$WidgetTitle}</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="grouppay.php" target="_blank">
            <div class="form-group">
                <label for="input" class="col-xs-3 control-label" style="margin-top: 10px;">{$LangModule::Translate('Amount')}</label>
                <div class="col-xs-9">
                    <div class="input-group">
                        <input type="number" name="DefaultAddBalanceSum" class="form-control" id="DefaultAddBalanceSum"
                               placeholder="{$WidgetDefaultAddBalanceSum}" max="{$MaxAddBalanceSum}"
                               value="{$WidgetDefaultAddBalanceSum}">
                        <span class="input-group-addon">
							<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
						</span>
                    </div>
                    <span class="help-block" style="font-size: xx-small;">
                        {$LangModule::Translate('Minimum')} {$MinAddBalanceSum}
                        , {$LangModule::Translate('Maximum')} {$MaxAddBalanceSum}
                    </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-3">
                    <button id="WidgetButtonText" type="submit" class="btn btn-default">{$WidgetButtonText}</button>
                </div>
            </div>

            <div {if $WidgetShowBalance}
                style="display: none"
            {/if}
                    id="WidgetBalance" class="well well-sm text-center">
                {$LangModule::Translate('CurrentBalance')} <strong>{$BalanceSum}</strong>
            </div>
        </form>
    </div>
</div>
