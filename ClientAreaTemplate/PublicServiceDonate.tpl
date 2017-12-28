<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<style>
    .PublicInvoiceUrlView.container {
        padding: 15px;
    }

    .PublicInvoiceUrlView.container {
        font-family: "Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;
        max-width: 960px;
        margin: 0 auto;
    }

    .PublicInvoiceUrlView.table th a {
        display: block;
        margin: -10px -10px -9px;
        padding: 10px 10px 9px;
    }

    .PublicInvoiceUrlView.recordslimit select {
        width: 60px;
    }

    .PublicInvoiceUrlView.table tbody tr:hover td, .table tbody tr:hover th {
        background-color: #f5f5f5;;
    }

    .PublicInvoiceUrlView.table-framed {
        border: 1px solid #DDD;
        border-collapse: separate;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        font-size: 13px;
    }

    .PublicInvoiceUrlView.table th {
        font-weight: bold;
    }

    .PublicInvoiceUrlView.label {
        padding: 1px 4px 2px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .PublicInvoiceUrlView.label,
    .PublicInvoiceUrlView.badge {
        font-size: 10.998px;
        font-weight: bold;
        line-height: 14px;
        color: #ffffff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        white-space: nowrap;
        vertical-align: baseline;
        background-color: #999999;
    }

    .PublicInvoiceUrlView.table.table-striped tr td {
        vertical-align: middle;
    }

    .PublicInvoiceUrlView.table.table-centered tr th, table.table-centered tr td {
        text-align: center;
    }

    .PublicInvoiceUrlView.btn {
        display: inline-block;
        *display: inline;
        padding: 4px 10px 4px;
        margin-bottom: 0;
        *margin-left: .3em;
        font-size: 13px;
        line-height: 18px;
        *line-height: 20px;
        color: #333333;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
        cursor: pointer;
        background-color: #f5f5f5;
        *background-color: #e6e6e6;
        background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
        background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        border: 1px solid #cccccc;
        *border: 0;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        border-color: #e6e6e6 #e6e6e6 #bfbfbf;
        border-bottom-color: #b3b3b3;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
        filter: progid:dximagetransform.microsoft.gradient(enabled=false);
        *zoom: 1;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .PublicInvoiceUrlView.table:hover {
        color: #333333;
        text-decoration: none;
        background-color: #e6e6e6;
        *background-color: #d9d9d9;
        /* Buttons in IE7 don't get borders, so darken on hover */

        background-position: 0 -15px;
        -webkit-transition: background-position 0.1s linear;
        -moz-transition: background-position 0.1s linear;
        -ms-transition: background-position 0.1s linear;
        -o-transition: background-position 0.1s linear;
        transition: background-position 0.1s linear;
    }

    .PublicInvoiceUrlView.table:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    .PublicInvoiceUrlView.table.active,
    .PublicInvoiceUrlView.table:active {
        background-color: #e6e6e6;
        background-color: #d9d9d9 \9;
        background-image: none;
        outline: 0;
        -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .PublicInvoiceUrlView.textcenter, .PublicInvoiceUrlView.textcenter td {
        text-align: center !important;
    }

    .PublicInvoiceUrlView.ManageBills {
        background-color: #ECEDEF;
        min-height: 365px;
    }

    .PublicInvoiceUrlView.LeftColumManageBills {
        display: inline-block;
        float: left;
    }

    /* Пополнение баланса */
    .PublicInvoiceUrlView.AddBalance {
        background-color: #DDE6E3;
        min-height: 140px;
        width: 250px;
        float: left;
        margin-top: 10px;
        margin-left: 12px;
        padding-top: 10px;
        clear: both;
    }

    .PublicInvoiceUrlView.AddBalanceDescription {
        font-weight: bolder;
        padding-left: 15px;
    }

    .btn.btn-BalanceSum {
        background-color: #7E7E7E;
        color: #ffffff;
        font-size: 24px;
        line-height: 20px;
    }

    .btn.btn-BalanceSum:hover {
        background-color: #7E7E7E;
        color: #ffffff;
        font-size: 24px;
        line-height: 20px;
    }

    .btn.btn-BalanceAdd {
        background-color: #1D71A0;
        color: #ffffff;
        margin-left: 15px;
        width: 210px;
        margin-top: 10px;

    }

    .btn.btn-BalanceAdd:hover {
        background-color: #1D71A0;
        color: #ffffff;
        margin-left: 15px;
        width: 210px;
        margin-top: 10px;
    }

    .PublicInvoiceUrlView.AddBalanceSumInputGroup {
        width: 210px;
        margin-left: 15px;
        margin-top: 10px;
        text-align: center;
    }

    /* Список счетов*/
    .PublicInvoiceUrlView.InvoiceList {
        float: left;
        padding-top: 10px;
        padding-left: 10px;
        width: 655px;
        padding-right: 13px;
    }

    thead.PublicInvoiceUrlView.InvoiceListTable {
        background-color: #ffffff;
    }

    th.PublicInvoiceUrlView.InvoiceListTable {
        text-align: center;
        padding-top: 6px;
        padding-bottom: 6px;
    }

    td.PublicInvoiceUrlView.InvoiceListTable {
        text-align: center;
        padding-top: 6px;
        padding-bottom: 6px;
    }

    tr.PublicInvoiceUrlView.InvoiceListTable {
        padding-top: 5px;
        background-color: #ffffff;
        border-top: 4px solid #ecedef;

    }

    table.PublicInvoiceUrlView.InvoiceListTable {
        margin-left: 10px;
        width: 100%;
        font-size: 13px;

    }

    /* Status Colors */
    span.PublicInvoiceUrlView.label.Pending {
        background-color: #F89406;
    }

    span.PublicInvoiceUrlView.label.Active {
        background-color: #46A546;
    }

    span.PublicInvoiceUrlView.label.Suspended {
        background-color: #0768B8;
    }

    span.PublicInvoiceUrlView.label.Terminated {
        background-color: #C43C35;
    }

    span.PublicInvoiceUrlView.label.Cancelled {
        background-color: #BFBFBF;
    }

    span.PublicInvoiceUrlView.label.Expired {
        background-color: #888;
    }

    span.PublicInvoiceUrlView.label.Fraud {
        background-color: #000;
    }

    span.PublicInvoiceUrlView.label.Unpaid {
        background-color: #cc0000;
    }

    span.PublicInvoiceUrlView.label.Paid {
        background-color: #779500;
    }

    span.PublicInvoiceUrlView.label.Refunded {
        background-color: #224488;
    }

    span.PublicInvoiceUrlView.label.Collections {
        background-color: #D3C403;
    }

    /* Остаток средств на балансе */
    .PublicInvoiceUrlView.Balance {
        background-color: #CAE4F1;
        min-height: 105px;
        width: 250px;
        float: left;
        margin-top: 10px;
        margin-left: 12px;
        padding-top: 10px;
    }

    .PublicInvoiceUrlView.BalanceSum {
        font-size: 35px;
        font-weight: bolder;
        padding-left: 15px;
        display: inline-block;
    }

    .PublicInvoiceUrlView.BalanceDescription {
        font-weight: bolder;
        padding-left: 15px;
        display: inline-block;
        padding-bottom: 17px;
    }

    .btn.btn-manageServer {
        display: inline-block;
        *display: inline;
        padding: 4px 10px 4px;
        margin-bottom: 0;
        *margin-left: .3em;
        font-size: 13px;
        line-height: 18px;
        *line-height: 20px;
        color: #333333;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
        cursor: pointer;
        background-color: #f5f5f5;
        *background-color: #e6e6e6;
        background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
        background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        border: 1px solid #cccccc;
        *border: 0;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        border-color: #e6e6e6 #e6e6e6 #bfbfbf;
        border-bottom-color: #b3b3b3;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
        filter: progid:dximagetransform.microsoft.gradient(enabled=false);
        *zoom: 1;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .btn.btn-manageServer:hover {
        color: #333333;
        text-decoration: none;
        background-color: #e6e6e6;
        *background-color: #d9d9d9;
        /* Buttons in IE7 don't get borders, so darken on hover */

        background-position: 0 -15px;
        -webkit-transition: background-position 0.1s linear;
        -moz-transition: background-position 0.1s linear;
        -ms-transition: background-position 0.1s linear;
        -o-transition: background-position 0.1s linear;
        transition: background-position 0.1s linear;
    }

    .btn.btn-manageServer:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    .btn.btn-manageServer:active {
        background-color: #e6e6e6;
        background-color: #d9d9d9 \9;
        background-image: none;
        outline: 0;
        -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .btn.btn-viewInvoice {
        display: inline-block;
        *display: inline;
        padding: 4px 10px 4px;
        margin-bottom: 0;
        *margin-left: .3em;
        font-size: 13px;
        line-height: 18px;
        *line-height: 20px;
        color: #333333;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
        cursor: pointer;
        background-color: #f5f5f5;
        *background-color: #e6e6e6;
        background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
        background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        border: 1px solid #cccccc;
        *border: 0;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        border-color: #e6e6e6 #e6e6e6 #bfbfbf;
        border-bottom-color: #b3b3b3;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
        filter: progid:dximagetransform.microsoft.gradient(enabled=false);
        *zoom: 1;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .btn.btn-viewInvoice:hover {
        color: #333333;
        text-decoration: none;
        background-color: #e6e6e6;
        *background-color: #d9d9d9;
        /* Buttons in IE7 don't get borders, so darken on hover */

        background-position: 0 -15px;
        -webkit-transition: background-position 0.1s linear;
        -moz-transition: background-position 0.1s linear;
        -ms-transition: background-position 0.1s linear;
        -o-transition: background-position 0.1s linear;
        transition: background-position 0.1s linear;
    }

    .btn.btn-viewInvoice:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    .btn.btn-viewInvoice:active {
        background-color: #e6e6e6;
        background-color: #d9d9d9 \9;
        background-image: none;
        outline: 0;
        -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
    }
</style>

<script>
    (function ($) {

        $.fn.bootstrapNumber = function (options) {

            var settings = $.extend({
                upClass: 'default',
                downClass: 'default',
                upText: '+',
                downText: '-',
                center: true
            }, options);

            return this.each(function (e) {
                var self = $(this);
                var clone = self.clone(true, true);

                var min = self.attr('min');
                var max = self.attr('max');
                var step = parseInt(self.attr('step')) || 1;

                function setText(n) {
                    if (isNaN(n) || (min && n < min) || (max && n > max)) {
                        return false;
                    }

                    clone.focus().val(n);
                    clone.trigger('change');
                    return true;
                }

                var group = $("<div class='input-group'></div>");
                var down = $("<button type='button'>" + settings.downText + "</button>").attr('class', 'btn btn-' + settings.downClass).click(function () {
                    setText(parseInt(clone.val() || clone.attr('value')) - step);
                });
                var up = $("<button type='button'>" + settings.upText + "</button>").attr('class', 'btn btn-' + settings.upClass).click(function () {
                    setText(parseInt(clone.val() || clone.attr('value')) + step);
                });
                $("<span class='input-group-btn'></span>").append(down).appendTo(group);
                clone.appendTo(group);
                if (clone && settings.center) {
                    clone.css('text-align', 'center');
                }
                $("<span class='input-group-btn'></span>").append(up).appendTo(group);

                // remove spins from original
                clone.prop('type', 'text').keydown(function (e) {
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                        return;
                    }
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }

                    var c = String.fromCharCode(e.which);
                    var n = parseInt(clone.val() + c);

                    if ((min && n < min) || (max && n > max)) {
                        e.preventDefault();
                    }
                });

                self.replaceWith(group);
            });
        };
    }(jQuery));

    $(function () {
        $(".col-xs-12.main-content").children(".header-lined").remove();
        $('#AddBalanceSum').bootstrapNumber({
            upClass: 'BalanceSum',
            downClass: 'BalanceSum',
            downText: '&#045;',
            upText: '&#043;',
        });
    });
</script>

<div class="PublicInvoiceUrlView container">
    {if $ShowServiceInfo}
        <table class="PublicInvoiceUrlView table table-striped table-framed">
            <tbody>
            <tr>
                <td>
                    <strong>{$ProductName}</strong>
                    <br>
                    <a href="ts3server://{$Domain}">{$Domain}</a>
                </td>
                <td>{$LangModule::Translate( 'BillingCycle' )}<br>
                    {if $BillingCycle eq "Free Account"}
                        {$LANG.orderpaymenttermfree}
                    {elseif $BillingCycle eq "One Time"}
                        {$LANG.orderpaymenttermonetime}
                    {elseif $BillingCycle eq "Monthly"}
                        {$LANG.orderpaymenttermmonthly}
                    {elseif $BillingCycle eq "Quarterly"}
                        {$LANG.orderpaymenttermquarterly}
                    {elseif $BillingCycle eq "Semi-Annually"}
                        {$LANG.orderpaymenttermsemiannually}
                    {elseif $BillingCycle eq "Annually"}
                        {$LANG.orderpaymenttermannually}
                    {elseif $BillingCycle eq "Biennially"}
                        {$LANG.orderpaymenttermbiennially}
                    {elseif $BillingCycle eq "Triennially"}
                        {$LANG.orderpaymenttermtriennially}
                    {/if}
                </td>
                <td>{$LangModule::Translate( 'ProductExtendedAt' )}<br>{$ProductExtendedAt}</td>
                <td>
                <span class="PublicInvoiceUrlView label {$ProductStatusColor}">
                    {if $ProductStatusText eq "Pending"}
                        {$LANG.clientareapending}
                    {elseif $ProductStatusText eq "Fraud"}
                        {$LANG.clientareafraud}
                    {elseif $ProductStatusText eq "Cancelled"}
                        {$LANG.invoicescancelled}
                    {elseif $ProductStatusText eq "Terminated"}
                        {$LANG.clientareaterminated}
                    {elseif $ProductStatusText eq "Suspended"}
                        {$LANG.clientareasuspended}
                    {elseif $ProductStatusText eq "Completed"}
                        {$LANG.clientareacompleted}
                    {elseif $ProductStatusText eq "Active"}
                        {$LANG.clientareaactive}
                    {/if}

                </span>
                </td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-viewInvoice" href="{$ProductURL}" target="_blank">
                            <i class="icon-cog"></i> {$LangModule::Translate( 'ServerControlPanel' )}
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    {/if}
    <div class="PublicInvoiceUrlView ManageBills">
        <div class="PublicInvoiceUrlView LeftColumManageBills">
            {if $ShowBalanceUser}
                <div class="PublicInvoiceUrlView Balance">
                    <span class="PublicInvoiceUrlView BalanceDescription">{$LangModule::Translate('BalanceDescription')}</span>
                    <span class="PublicInvoiceUrlView BalanceSum">{$BalanceSum} &#8381;</span>
                </div>
            {/if}
            {if $ShowAddBalanceWidget}
                <div class="PublicInvoiceUrlView AddBalance">
                    <span class="PublicInvoiceUrlView AddBalanceDescription">{$LangModule::Translate('AddBalanceDescription')}</span>
                    <form action="{$systemurl}public/grouppay" method="get">
                        <input type="hidden" name="ClientID" value="{$ClientID}">
                        <div class="PublicInvoiceUrlView AddBalanceSumInputGroup">
                            <input id="AddBalanceSum" name="AddBalanceSum" class="form-control" type="number" step="100"
                                   value="{$DefaultAddBalanceSum}"
                                   min="0" max="{$MaxAddBalanceSum}"/>
                            <span class="help-block" style="font-size: xx-small;">
                            {$LangModule::Translate('Minimum')} {$MinAddBalanceSum}
                                , {$LangModule::Translate('Maximum')} {$MaxAddBalanceSum}
                        </span>
                        </div>
                        {if $UserBalanseStatus}
                            <button type="submit"
                                    class="btn btn-BalanceAdd">{$LangModule::Translate('AddBalance')}</button>
                        {else}
                            <button type="button" class="btn btn-BalanceAdd"
                                    disabled>{$LangModule::Translate('AddBalance')}</button>
                        {/if}
                    </form>
                </div>
            {/if}
        </div>
        <div class="PublicInvoiceUrlView InvoiceList">
            {if $ShowUserInvoiceList}
            <table class="PublicInvoiceUrlView InvoiceListTable">
                <thead class="PublicInvoiceUrlView InvoiceListTable">
                <tr>
                    <th class="PublicInvoiceUrlView InvoiceListTable">{$LangModule::Translate('InvoiceNumber')}</th>
                    <th class="PublicInvoiceUrlView InvoiceListTable">{$LangModule::Translate('DueDate')}</th>
                    <th class="PublicInvoiceUrlView InvoiceListTable">{$LangModule::Translate('ToPay')}</th>
                    <th class="PublicInvoiceUrlView InvoiceListTable">{$LangModule::Translate('Status')}</th>
                    <th class="PublicInvoiceUrlView InvoiceListTable">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                {if !empty($Invoices)}
                    {foreach from=$Invoices item=Invoice}
                        <tr class="PublicInvoiceUrlView InvoiceListTable">
                            <td class="PublicInvoiceUrlView InvoiceListTable">{$Invoice['id']}</td>
                            <td class="PublicInvoiceUrlView InvoiceListTable">{$Invoice['duedate']}</td>
                            <td class="PublicInvoiceUrlView InvoiceListTable">{$Invoice['subtotal']}</td>
                            <td class="PublicInvoiceUrlView InvoiceListTable">
                                <span class="PublicInvoiceUrlView label {$Invoice['status']}">
                                    {if $Invoice['status'] eq "Draft"}
                                        {$LANG.invoicesdraft}
                                    {elseif $Invoice['status'] eq "Unpaid"}
                                        {$LANG.invoicesunpaid}
                                    {elseif $Invoice['status'] eq "Paid"}
                                        {$LANG.invoicespaid}
                                    {elseif $Invoice['status'] eq "Refunded"}
                                        {$LANG.invoicesrefunded}
                                    {elseif $Invoice['status'] eq "Cancelled"}
                                        {$LANG.invoicescancelled}
                                    {elseif $Invoice['status'] eq "Collections"}
                                        {$LANG.invoicescollections}
                                    {elseif $Invoice['status'] eq "Payment Pending"}
                                        {$LANG.invoicesPaymentPending}
                                    {/if}
                                </span>
                            </td>
                            <td class="PublicInvoiceUrlView InvoiceListTable">
                                <a href="{$SystemURL}/public/invoice/{$Invoice['key']}"
                                   target="_blank" class="btn btn-viewInvoice">
                                    <i class="icon-eye-open"></i> {$LangModule::Translate('ViewingAndPayingInvoice')}
                                </a>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr class="PublicInvoiceUrlView InvoiceListTable">
                        <td colspan="6"
                            class="PublicInvoiceUrlView InvoiceListTable">{$LangModule::Translate('AllBillsPaid')}</td>
                    </tr>
                {/if}
                </tbody>
            </table>
            {/if}
        </div>
    </div>

</div>

