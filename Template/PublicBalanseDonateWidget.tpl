<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="panel panel-default">
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