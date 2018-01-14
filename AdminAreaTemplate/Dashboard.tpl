<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    $('#contentarea >> h1').remove();
    $(".contentarea").css("padding", "0px");

    $(function () {
        {if   {$StatisticsPageViewWidgetConfig} !=0 ||
    {$StatisticsPageViewServiceDonate} !=0 ||
    {$StatisticsPageViewGroupPay} !=0 ||
    {$StatisticsPageViewPublicInvoice} !=0 ||
    {$StatisticsPageViewWidget} !=0}
        var ctx = document.getElementById('PageVievsStats').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',

            data: {
                labels: ["{$LangModule::Translate('WidgetConfiguration')}", "{$LangModule::Translate('DomainReplenishment')}", "{$LangModule::Translate('PublicDonate')}", "{$LangModule::Translate('PublicInvoices')}", "{$LangModule::Translate('Widget')}"],
                datasets: [{
                    borderColor: '#006eac',
                    borderWidth: 0,
                    backgroundColor: [
                        '#33c3ff',
                        '#ff9c00',
                        '#22b300',
                        '#b90b0b',
                        '#d4e703'

                    ],
                    data: [
                        {$StatisticsPageViewWidgetConfig},
                        {$StatisticsPageViewServiceDonate},
                        {$StatisticsPageViewGroupPay},
                        {$StatisticsPageViewPublicInvoice},
                        {$StatisticsPageViewWidget}
                    ]
                }]
            },
            options: {
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'rgb(255, 255, 255)'
                    }
                }, title: {
                    display: true,
                    text: '{$LangModule::Translate("StatisticsOfUsingTheFunctionalViewPages")}',
                    fontColor: 'rgb(255, 255, 255)',
                    fontSize: 20,
                    fontFamily: 'segoe ui',
                    fontStyle: 'normal',
                    position: 'top'
                }

            }
        });{/if}
    });
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
        width: 645px;
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
        float: left;
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

    .TabNav {
        margin: -10px auto;
    }

    .TabNav li {
        width: auto;
        border-bottom-right-radius: 7px;
        border-bottom-left-radius: 7px;
        font-size: 10px;
        text-align: center;
        height: 20px;
        margin-top: -10px;
        color: #006eac;
        font-weight: bold;
        line-height: 20px;
        background-color: rgb(102, 168, 205);
        display: inline-block;
        padding-left: 5px;
        padding-right: 5px;
        cursor: pointer;
    }

    .TabNav li:hover {
        background-color: rgba(255, 255, 255, 0.7);
    }

    .TabNav li:hover a {
        color: #006eac;
    }

    .TabNav li a {
        font-size: 11px;
        text-align: center;
        color: #ffffff;
        font-weight: bold;
        line-height: 20px;
        text-decoration: none;
        display: block;
    }

    li.active {
        background-color: rgba(255, 255, 255, 1);
    }

    li.active a {
        color: #006eac;
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

    .checkbox {
        padding-left: 20px;
    }

    .checkbox label {
        display: inline-block;
        position: relative;
        padding-left: 5px;
        font-weight: 700;
    }

    .checkbox label::before {
        content: "";
        display: inline-block;
        position: absolute;
        width: 17px;
        height: 17px;
        left: 0;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 3px;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
        -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
        transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    }

    .checkbox label::after {
        display: inline-block;
        position: absolute;
        width: 16px;
        height: 16px;
        left: 0;
        top: 0;
        margin-left: -20px;
        padding-left: 3px;
        padding-top: 1px;
        font-size: 11px;
        color: #555555;
    }

    .checkbox input[type="checkbox"] {
        opacity: 0;
    }

    .checkbox input[type="checkbox"]:focus + label::before {
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    .checkbox input[type="checkbox"]:checked + label::after {
        font-family: 'FontAwesome';
        content: "\f00c";
    }

    .checkbox input[type="checkbox"]:disabled + label {
        opacity: 0.65;
    }

    .checkbox input[type="checkbox"]:disabled + label::before {
        background-color: #eeeeee;
        cursor: not-allowed;
    }

    .checkbox.checkbox-circle label::before {
        border-radius: 50%;
    }

    .checkbox.checkbox-inline {
        margin-top: 0;
    }

    .checkbox-primary input[type="checkbox"]:checked + label::before {
        background-color: #00a4e1;
        border-color: #428bca;
    }

    .checkbox-primary input[type="checkbox"]:checked + label::after {
        color: #fff;
    }

    .checkbox.checkbox-primary {
        display: block;
    }

    .ModuleContainer textarea {
        width: 500px;
        height: 70px;
        border-radius: 5px;
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

    .ModuleContainer select {
        color: #006eac;
        width: 500px;
        border-radius: 5px;
        text-indent: 10px;
        font-family: 'Roboto', sans-serif;
        height: 30px;
    }

    div.contexthelp {
        position: absolute;
        width: 116px;
        right: 14px;
        top: 10px;
    }
</style>
<script type="text/javascript">
    window.PrimaryNavBarStructureUserNoLogin = {$PrimaryNavBarStructureUserNoLogin};
    window.PrimaryNavBarStructureUserLogin = {$PrimaryNavBarStructureUserLogin};
    {literal}
    $(function () {
        $('input[type=checkbox][id=isEnablePublicInvoiceURL]').change(function () {
            $("#SettingPublicInvoiceURL").slideToggle();
        });
        $('input[type=checkbox][id=isEnableGroupPayDonate]').change(function () {
            $("#SettingGroupPayDonate").slideToggle();
        });
        $('input[type=checkbox][id=GroupPayDonateByTeamSpeak3Server]').change(function () {
            $("#GroupPayDonateByTeamSpeak3ServerConfig").slideToggle();
        });
        $('input[type=checkbox][id=isEnableGroupPayDonateWidget]').change(function () {
            $("#SettingGroupPayDonateWidget").slideToggle();
        });
        $('input[type=checkbox][id=isEnableGroupPayDonateService]').change(function () {
            $("#GroupPayDonateServiceConfig").slideToggle();
        });
    });


    $(function () {
        $.each(window.PrimaryNavBarStructureUserNoLogin, function (key, value) {
            $('#GroupPayDonatePrimaryNavBarRoot')
                .append($('<option>', {value: key})
                    .text(value['translate']));
        });
        $.each(window.PrimaryNavBarStructureUserNoLogin, function (keySumItem, valueSumItem) {
            $('#GroupPayDonatePrimaryNavBarSubItem')
                .append($('<option>', {value: keySumItem})
                    .text(valueSumItem['translate']));

        });
        {/literal}
        $('#GroupPayDonatePrimaryNavBarSubItem')
            .find('option')
            .end()
            .append('<option value="last">{$LangModule::Translate("InTheEnd")}</option>');
        {literal}
        $("#GroupPayDonatePrimaryNavBarSubItem > option").each(function () {
            {/literal}
            if (this.value === '{$PublicGroupPayDonateNavSubItem}') {
                $(this).attr('selected', true);
            }
            {literal}
        });
        $("#GroupPayDonatePrimaryNavBarRoot > option").each(function () {
            {/literal}
            if (this.value === '{$PublicGroupPayDonateNavRootItem}') {
                $(this).attr('selected', true);
            }
            {literal}
        });

        $("#GroupPayDonatePrimaryNavBarRoot").change(function () {
            if (window.PrimaryNavBarStructureUserNoLogin.hasOwnProperty($("#GroupPayDonatePrimaryNavBarRoot").val())) {
                {/literal}
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">{$LangModule::Translate("BeforeTheFirstElement")}</option>');
                {literal}
                $.each(window.PrimaryNavBarStructureUserNoLogin[$("#GroupPayDonatePrimaryNavBarRoot").val()]['SumItem'], function (keySumItem, valueSumItem) {
                    $('#GroupPayDonatePrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                {/literal}
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">{$LangModule::Translate("InTheEnd")}</option>');
                {literal}
            }

            if ($("#GroupPayDonatePrimaryNavBarRoot").val() === 'first') {
                {/literal}
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">{$LangModule::Translate("BeforeTheFirstElement")}</option>');
                {literal}
                $.each(window.PrimaryNavBarStructureUserNoLogin, function (keySumItem, valueSumItem) {
                    $('#GroupPayDonatePrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                {/literal}
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">{$LangModule::Translate("InTheEnd")}</option>');
                {literal}
            }
        });

    });
    $(function () {
        $.each(window.PrimaryNavBarStructureUserLogin, function (key, value) {
            $('#GroupPayDonateWidgetPrimaryNavBarRoot')
                .append($('<option>', {value: key})
                    .text(value['translate']));
        });
        $.each(window.PrimaryNavBarStructureUserLogin, function (keySumItem, valueSumItem) {
            $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                .append($('<option>', {value: keySumItem})
                    .text(valueSumItem['translate']));

        });
        {/literal}
        $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
            .find('option')
            .end()
            .append('<option value="last">{$LangModule::Translate("InTheEnd")}</option>');
        {literal}
        $("#GroupPayDonateWidgetPrimaryNavBarRoot > option").each(function () {
            {/literal}
            if (this.value === '{$PublicDonateWidgetNavRootItem}') {
                $(this).attr('selected', true);
            }
            {literal}
        });
        $("#GroupPayDonateWidgetPrimaryNavBarSubItem > option").each(function () {
            {/literal}
            if (this.value === '{$PublicDonateWidgetNavSubItem}') {
                $(this).attr('selected', true);
            }
            {literal}
        });

        $("#GroupPayDonateWidgetPrimaryNavBarRoot").change(function () {
            if (window.PrimaryNavBarStructureUserLogin.hasOwnProperty($("#GroupPayDonateWidgetPrimaryNavBarRoot").val())) {
                {/literal}
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">{$LangModule::Translate("BeforeTheFirstElement")}</option>');
                {literal}
                $.each(window.PrimaryNavBarStructureUserLogin[$("#GroupPayDonateWidgetPrimaryNavBarRoot").val()]['SumItem'], function (keySumItem, valueSumItem) {
                    $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                {/literal}
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">{$LangModule::Translate("InTheEnd")}</option>');
                {literal}
            }

            if ($("#GroupPayDonateWidgetPrimaryNavBarRoot").val() === 'first') {
                {/literal}
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">{$LangModule::Translate("BeforeTheFirstElement")}</option>');
                {literal}
                $.each(window.PrimaryNavBarStructureUserLogin, function (keySumItem, valueSumItem) {
                    $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                {/literal}
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">{$LangModule::Translate("InTheEnd")}</option>');
                {literal}
            }
        });

    });

    {/literal}
</script>
<div class="ModuleContainer">
    <div style="margin-top: 25px; margin-bottom: 30px;">
        <form role="form" action="{$ModuleLink}&page=dashboard" method="post">
            <div id="welcome">{$LangModule::Translate("Summary")}</div>
            <div id="Line" style="margin-bottom: 0px"></div>
            <div>
                <div>
                    <ul class="TabNav">
                        <li class="active">
                            <a href="#tab1default" data-toggle="tab">
                                {$LangModule::Translate("Summary")}
                            </a>
                        </li>
                        <li>
                            <a href="#tab2default" data-toggle="tab">
                                {$LangModule::Translate("PublicInvoices")}
                            </a>
                        </li>
                        <li>
                            <a href="#tab3default" data-toggle="tab">
                                {$LangModule::Translate("PublicDonate")}
                            </a>
                        </li>
                        <li>
                            <a href="#tab4default" data-toggle="tab">
                                {$LangModule::Translate("WidgetForSite")}
                            </a>
                        </li>
                        <li>
                            <a href="#tab5default" data-toggle="tab">
                                {$LangModule::Translate("DomainReplenishment")}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <div class="chart-container"
                                 style="margin-bottom: 15px;margin-top: 15px;
                                 {if   {$StatisticsPageViewWidgetConfig} !=0 ||
                                 {$StatisticsPageViewServiceDonate} !=0 ||
                                 {$StatisticsPageViewGroupPay} !=0 ||
                                 {$StatisticsPageViewPublicInvoice} !=0 ||
                                 {$StatisticsPageViewWidget} !=0}
                                         height: 600px;width: 600px;
                                 {else}
                                         line-height: 60px;text-align: center;height: 60px;
                                 {/if}">
                                {if   {$StatisticsPageViewWidgetConfig} !=0 ||
                                {$StatisticsPageViewServiceDonate} !=0 ||
                                {$StatisticsPageViewGroupPay} !=0 ||
                                {$StatisticsPageViewPublicInvoice} !=0 ||
                                {$StatisticsPageViewWidget} !=0}
                                    <canvas id="PageVievsStats"></canvas>
                                {else}
                                    {$LangModule::Translate("ThereIsNotEnoughDataToBuildABeautifulGraph")}
                                {/if}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div class="checkbox checkbox-primary">
                                <input id="isEnablePublicInvoiceURL" type="checkbox" name="PublicInvoiceURL[Enable]"
                                       {if $PublicInvoiceStatus}checked{/if}>
                                <label for="isEnablePublicInvoiceURL">
                                    {$LangModule::Translate("EnablePublicBillingByReference")}
                                </label>
                            </div>
                            <div id="SettingPublicInvoiceURL" {if !$PublicInvoiceStatus}style="display: none;"{/if}>
                                <div class="label-input pull-left">
                                    <label for="ButtonMessage">
                                        {$LangModule::Translate("ButtonText")}
                                    </label>
                                </div>
                                <div class="input pull-left">
                                    <input id="ButtonMessage" type="text" name="PublicInvoiceURL[Button][Message]"
                                           placeholder="{$LangModule::Translate("CopyTheLinkForPublicPaymentOfThisAccountToTheClipboard")}"
                                           value="{$PublicInvoiceButtonMessage}">
                                </div>
                                <div class="label-input pull-left">
                                    <label for="AlertSuccess">
                                        {$LangModule::Translate("TheTextOfTheMessageAfterTheSuccessfulCopyingOfTheLinkToTheClipboard")}
                                    </label>
                                </div>
                                <div class="input pull-left">
                                    <input id="AlertSuccess" type="text" name="PublicInvoiceURL[Alert][Message]"
                                           placeholder="Следующий текст успешно скопирован в буфер обмена:"
                                           value="{$PublicInvoiceCopySuccessNoticeMessage}">
                                </div>
                                <div class="label-input pull-left">
                                    <label for="ButtonStyle">
                                        {$LangModule::Translate("CSSStyleButtons")}
                                    </label>
                                </div>
                                <div class="input pull-left">
                                    <textarea
                                            name="PublicInvoiceURL[Button][Style]">{$PublicInvoiceButtonStyle}</textarea>
                                </div>
                                <div class="label-input pull-left">
                                    <label for="ScriptButtonInvoiceUrlInsert">
                                        {$LangModule::Translate("ScriptToAddAPublicPaymentButton")}
                                    </label>
                                </div>
                                <div class="input pull-left">
                                    <textarea
                                            name="PublicInvoiceURL[Button][InsertScript]">{$PublicInvoiceButtonInsertScript} </textarea>
                                </div>
                                <div class="label-input pull-left">
                                    <label for="ScriptInvoiceUrlCopySuccessInsertAlert">{$LangModule::Translate("ScriptToAddANotificationOfSuccessfulCopyingOfTheLinkToPublicBillPayment")}</label>
                                </div>
                                <div class="input pull-left">
                                    <textarea
                                            name="PublicInvoiceURL[Alert][InsertScript]">{$PublicInvoiceCopySuccessNoticeInsertScript}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            <div class="checkbox checkbox-primary">
                                <input id="isEnableGroupPayDonate" type="checkbox" name="GroupPayDonate[Enable]"
                                       {if $PublicGroupPayDonateStatus}checked{/if}>
                                <label for="isEnableGroupPayDonate">
                                    {$LangModule::Translate("EnableAnonymousReplenishmentOption")}
                                </label>
                            </div>
                            <div id="SettingGroupPayDonate"
                                 {if !$PublicGroupPayDonateStatus}style="display: none;"{/if}>
                                <div class="checkbox checkbox-primary">
                                    <input id="isEnableGroupPayDonateByClientEmail" type="checkbox"
                                           name="GroupPayDonate[DonateByClientEmail][Enable]"
                                           {if $PublicGroupPayDonateDonateClientEmailStatus}checked{/if}>
                                    <label for="isEnableGroupPayDonateByClientEmail">
                                        {$LangModule::Translate("ByEmailClientInTheSystem")}
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="isEnableGroupPayDonateByClientID" type="checkbox"
                                           name="GroupPayDonate[DonateByClientID][Enable]"
                                           {if $PublicGroupPayDonateDonateClientIDStatus}checked{/if}>
                                    <label for="isEnableGroupPayDonateByClientID">
                                        {$LangModule::Translate("ByClientIDInTheSystem")}
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="GroupPayDonateByTeamSpeak3Server" type="checkbox"
                                           name="GroupPayDonate[DonateByTeamSpeak3Server][Enable]"
                                           {if $PublicGroupPayDonateDonateHostStatus}checked{/if}>
                                    <label for="GroupPayDonateByTeamSpeak3Server">
                                        {$LangModule::Translate("ToTheAddressoFTeamSpeak3Servers")}
                                    </label>
                                </div>
                                <div id="GroupPayDonateByTeamSpeak3ServerConfig"
                                     {if !$PublicGroupPayDonateDonateHostStatus}style="display: none;"{/if}>
                                    <div style="display: inline-block;">
                                        <div class="label-input pull-left">
                                            <label for="GroupPayDonateByTeamSpeak3ServerCustomFieldContainsPort">
                                                {$LangModule::Translate("TheNameOfTheCustomProductFieldThatContainsThePortOfTheServer")}
                                            </label>
                                        </div>
                                        <div class="input pull-left">
                                            <select size="1"
                                                    id="GroupPayDonateByTeamSpeak3ServerCustomFieldContainsPort"
                                                    name="GroupPayDonate[DonateByTeamSpeak3Server][CustomFieldContainsPort]">
                                                {foreach from=$CustomFieldsAllProduct item=Name}
                                                    <option value="{$Name}"
                                                            {if $PublicGroupPayDonateDonateHostCustomFieldsPort === $Name}selected{/if}>{$Name}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div style="display: inline-block;">
                                        <div class="label-input pull-left">
                                            <label for="GroupPayDonateByTeamSpeak3ServerAllow">
                                                {$LangModule::Translate("ListIPAddressesOfServersForWhichThisTypeOfReplenishmentIsAllowed")}
                                            </label>
                                        </div>
                                        <div class="input pull-left">
                                <textarea id="GroupPayDonateByTeamSpeak3ServerAllow"
                                          name="GroupPayDonate[DonateByTeamSpeak3Server][ServerAllowList]">{$PublicGroupPayDonateDonateHostAllowServerIP}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="GroupPayDonateAddMessageRecipient" type="checkbox"
                                           name="GroupPayDonate[AddMessageRecipient]"
                                           {if $PublicGroupPayDonateAddMessageRecipient}checked{/if}>
                                    <label for="GroupPayDonateAddMessageRecipient">
                                        {$LangModule::Translate("AbilityToLeaveAMessageToTheRecipient")}
                                    </label>
                                </div>
                                <div style="display: inline-block;">
                                    <div class="label-input pull-left">
                                        <label for="GroupPayDonatePrimaryNavBarRoot">
                                            {$LangModule::Translate("SelectTheRootElementOfTheMenuInWhichToPlaceALinkToAnAnonymousRechargeBalance")}</label>
                                    </div>
                                    <div class="input pull-left">
                                        <select size="1" id="GroupPayDonatePrimaryNavBarRoot"
                                                name="GroupPayDonate[PrimaryNavBarRoot]">
                                            <option value="first">{$LangModule::Translate("AtTheRootOfTheMenu")}</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display: inline-block;">
                                    <div class="label-input pull-left">
                                        <label for="GroupPayDonatePrimaryNavBarSubItem">{$LangModule::Translate("SelectMenuItemBelowWhichToPlaceALinkToAnAnonymousRechargeBalance")}</label>
                                    </div>
                                    <div class="input pull-left">
                                        <select size="1" id="GroupPayDonatePrimaryNavBarSubItem"
                                                name="GroupPayDonate[PrimaryNavBarSubItem]">
                                            <option value="first">{$LangModule::Translate("BeforeTheFirstElement")}</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display: inline-block;">
                                    <div class="label-input pull-left">
                                        <label for="GroupPayDonatePrimaryNavBarDisplayName">
                                            {$LangModule::Translate("EnterTheDisplayNameOfTheMenuItem")}
                                        </label>
                                    </div>
                                    <div class="input pull-left">
                                        <input type="text" id="GroupPayDonatePrimaryNavBarDisplayName"
                                               name="GroupPayDonate[PrimaryNavBarDisplayName]"
                                               value="{$PublicGroupPayDonateNavDisplayName}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab4default">
                            <div class="checkbox checkbox-primary">
                                <input id="isEnableGroupPayDonateWidget" type="checkbox"
                                       name="GroupPayDonateWidget[Enable]" {if $PublicDonateWidgetStatus }checked{/if}>
                                <label for="isEnableGroupPayDonateWidget">
                                    {$LangModule::Translate("EnableWidgetForAnonymousRecharge")}
                                </label>
                            </div>
                            <div id="SettingGroupPayDonateWidget"
                                 {if !$PublicDonateWidgetStatus }style="display: none;"{/if}>
                                <div style="display: inline-block;">
                                    <div class="label-input pull-left">
                                        <label for="GroupPayDonateWidgetPrimaryNavBarRoot">{$LangModule::Translate("SelectTheRootMenuItemInWhichToPlaceALinkToTheSettingOfTheAnonymousReplenishmentWidget")}</label>
                                    </div>
                                    <div class="input pull-left">
                                        <select size="1" id="GroupPayDonateWidgetPrimaryNavBarRoot"
                                                name="GroupPayDonateWidget[PrimaryNavBarRoot]">
                                            <option value="first">{$LangModule::Translate("AtTheRootOfTheMenu")}</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display: inline-block;">
                                    <div class="label-input pull-left">
                                        <label for="GroupPayDonateWidgetPrimaryNavBarSubItem">{$LangModule::Translate("SelectMenuItemBelowWhichToPlaceLinkToTheSettingOfTheAnonymousReplenishmentWidget")}</label>
                                    </div>
                                    <div class="input pull-left">
                                        <select size="1" id="GroupPayDonateWidgetPrimaryNavBarSubItem"
                                                name="GroupPayDonateWidget[PrimaryNavBarSubItem]">
                                            <option value="first">{$LangModule::Translate("AtTheRootOfTheMenu")}</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display: inline-block;">
                                    <div class="label-input pull-left">
                                        <label for="GroupPayDonateWidgetPrimaryNavBarDisplayName">{$LangModule::Translate("EnterTheDisplayNameOfTheMenuItem")}</label>
                                    </div>
                                    <div class="input pull-left">
                                        <input type="text" id="GroupPayDonateWidgetPrimaryNavBarDisplayName"
                                               name="GroupPayDonateWidget[PrimaryNavBarDisplayName]"
                                               value="{$PublicDonateWidgetNavDisplayName}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab5default">
                            <div class="checkbox checkbox-primary">
                                <input id="isEnableGroupPayDonateService" type="checkbox"
                                       name="GroupPayDonateService[Enable]" {if $PublicServiceDonateStatus}checked{/if}>
                                <label for="isEnableGroupPayDonateService">
                                    {$LangModule::Translate("EnablePublicDomainPayment")}
                                </label>
                            </div>
                            <div id="GroupPayDonateServiceConfig"
                                 {if !$PublicServiceDonateStatus}style="display: none;"{/if}>
                                <div class="checkbox checkbox-primary">
                                    <input id="GroupPayDonateServiceShowServiceInfo" type="checkbox"
                                           name="GroupPayDonateService[ShowServiceInfo]"
                                           {if $PublicServiceDonateShowServiceInfo}checked{/if}>
                                    <label for="GroupPayDonateServiceShowServiceInfo">
                                        {$LangModule::Translate("DisplayInformationAboutTheService")}
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="GroupPayDonateServiceShowBalanceUser" type="checkbox"
                                           name="GroupPayDonateService[ShowBalanceUser]"
                                           {if $PublicServiceDonateShowBalanceUser}checked{/if}>
                                    <label for="GroupPayDonateServiceShowBalanceUser">
                                        {$LangModule::Translate("DisplayUserBalance")}
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="GroupPayDonateServiceShowUserInvoiceList" type="checkbox"
                                           name="GroupPayDonateService[ShowUserInvoiceList]"
                                           {if $PublicServiceDonateShowUserInvoiceList}checked{/if}>
                                    <label for="GroupPayDonateServiceShowUserInvoiceList">
                                        {$LangModule::Translate("DisplayInvoiceList")}
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="GroupPayDonateServiceShowAddBalanceWidget" type="checkbox"
                                           name="GroupPayDonateService[ShowAddBalanceWidget]"
                                           {if $PublicServiceDonateShowAddBalanceWidget}checked{/if}>
                                    <label for="GroupPayDonateServiceShowAddBalanceWidget">
                                        {$LangModule::Translate("ShowRechargeWidget")}
                                    </label>
                                </div>
                                <div style="display: inline-block;">
                                    <div class="label-input pull-left">
                                        <label for="GroupPayDonateByTeamSpeak3ServerAllow">
                                            {$LangModule::Translate("ListIPAddressesOfServersForWhichThisTypeOfReplenishmentIsAllowed")}
                                        </label>
                                    </div>
                                    <div class="input pull-left">
                                <textarea id="GroupPayDonateByTeamSpeak3ServerAllow"
                                          name="GroupPayDonateService[ServerAllow]">{$PublicServiceDonateDonateHostAllowServerIP}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Line"></div>
            <button> {$LangModule::Translate("SaveChanges")}</button>
            <a href="{$ModuleLink}&page=cleardata" class="btn btn-danger">
                {$LangModule::Translate("DeleteModuleData")}
            </a>
        </form>
    </div>
</div>

