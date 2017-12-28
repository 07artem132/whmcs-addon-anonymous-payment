<script>
    $('#contentarea >> h1').remove();
    $(".contentarea").css("padding", "0px");
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
        position: relative;
    }

    .ModuleContainer div {
        width: 540px;
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

    .checkbox {
        padding-left: 20px;
    }

    .checkbox label {
        display: inline-block;
        position: relative;
        padding-left: 5px;
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
        outline: thin dotted;
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

    function ToStepInstallTwo() {
        //Завершить настройку модуля             <a href="{$basheURL}&page=firstconfig"></a>
        $("#StepInstallOne").slideToggle();
        $("button").attr("onclick", "ToStepInstallThree()");
        setTimeout(function () {
            $("#welcome").text("[2/4] Анонимное пополнения баланса");
            $("#StepInstallTwo").slideToggle();
        }, 400);
    }

    function ToStepInstallThree() {
        $("#StepInstallTwo").slideToggle();
        $("button").attr("onclick", "ToStepInstallFour()");
        setTimeout(function () {
            $("#welcome").text("[3/4] Виджет анонимного пополнения баланса");
            $("#ToStepInstallThree").slideToggle();
        }, 400);
    }

    function ToStepInstallFour() {
        $("#ToStepInstallThree").slideToggle();
        $("button").attr("onclick", "ToStepInstallFinall()");
        $("button").text("Завершить настройку модуля");
        setTimeout(function () {
            $("#welcome").text("[4/4] Публичная оплата по домену услуги");
            $("#ToStepInstallFour").slideToggle();
        }, 400);
    }

    function ToStepInstallFinall() {
        var this_master = $("#InstallForm");

        this_master.find('input[type="checkbox"]').each(function () {
            var checkbox_this = $(this);


            if (checkbox_this.is(":checked") == true) {
                checkbox_this.attr('value', '1');
            } else {
                checkbox_this.prop('checked', true);
                //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
                checkbox_this.attr('value', '0');
            }
        });

        $( "#InstallForm" ).submit();
    }

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
        $('#GroupPayDonatePrimaryNavBarSubItem')
            .find('option')
            .end()
            .append('<option value="last">В самом конце</option>');

        $("#GroupPayDonatePrimaryNavBarRoot").change(function () {
            if (window.PrimaryNavBarStructureUserNoLogin.hasOwnProperty($("#GroupPayDonatePrimaryNavBarRoot").val())) {
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">До первого элемента</option>');

                $.each(window.PrimaryNavBarStructureUserNoLogin[$("#GroupPayDonatePrimaryNavBarRoot").val()]['SumItem'], function (keySumItem, valueSumItem) {
                    $('#GroupPayDonatePrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">В самом конце</option>');
            }

            if ($("#GroupPayDonatePrimaryNavBarRoot").val() === 'first') {
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">До первого элемента</option>');

                $.each(window.PrimaryNavBarStructureUserNoLogin, function (keySumItem, valueSumItem) {
                    $('#GroupPayDonatePrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                $('#GroupPayDonatePrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">В самом конце</option>');
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
        $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
            .find('option')
            .end()
            .append('<option value="last">В самом конце</option>');

        $("#GroupPayDonateWidgetPrimaryNavBarRoot").change(function () {
            if (window.PrimaryNavBarStructureUserLogin.hasOwnProperty($("#GroupPayDonateWidgetPrimaryNavBarRoot").val())) {
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">До первого элемента</option>');

                $.each(window.PrimaryNavBarStructureUserLogin[$("#GroupPayDonateWidgetPrimaryNavBarRoot").val()]['SumItem'], function (keySumItem, valueSumItem) {
                    $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">В самом конце</option>');
            }

            if ($("#GroupPayDonateWidgetPrimaryNavBarRoot").val() === 'first') {
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="first">До первого элемента</option>');

                $.each(window.PrimaryNavBarStructureUserLogin, function (keySumItem, valueSumItem) {
                    $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                        .append($('<option>', {value: keySumItem})
                            .text(valueSumItem['translate']));

                });
                $('#GroupPayDonateWidgetPrimaryNavBarSubItem')
                    .find('option')
                    .end()
                    .append('<option value="last">В самом конце</option>');
            }
        });

    });

    {/literal}
</script>
<div class="ModuleContainer">
    <div class="contexthelp" style="display: none;">
        <a href="http://docs.whmcs.com/Support_Departments" target="_blank">
            <img src="images/icons/help.png" border="0" align="absmiddle">
            Помощь
        </a>
    </div>
    <div style="margin-top: 25px; margin-bottom: 30px;">
        <form role="form" id="InstallForm" action="{$ModuleLink}&page=firstconfig" method="post">
            <div id="welcome">[1/4] Публичная оплата счета</div>
            <div id="Line"></div>
            <div id="StepInstallOne">
                <div class="checkbox checkbox-primary">
                    <input id="isEnablePublicInvoiceURL" type="checkbox" name="PublicInvoiceURL[Enable]">
                    <label for="isEnablePublicInvoiceURL">
                        Включить публичную оплату счетов по ссылке
                    </label>
                </div>
                <div id="SettingPublicInvoiceURL" style="display: none;">
                    <div class="label-input pull-left">
                        <label for="ButtonMessage">
                            Текст кнопки
                        </label>
                    </div>
                    <div class="input pull-left">
                        <input id="ButtonMessage" type="text" name="PublicInvoiceURL[Button][Message]"
                               placeholder="Скопировать ссылку для публичной оплаты этого счёта в буфер обмена"
                               value="Скопировать ссылку для публичной оплаты этого счёта в буфер обмена">
                    </div>
                    <div class="label-input pull-left">
                        <label for="AlertSuccess">
                            Текст сообщения после успешного скопирования ссылки в буфер обмена
                        </label>
                    </div>
                    <div class="input pull-left">
                        <input id="AlertSuccess" type="text" name="PublicInvoiceURL[Alert][Message]"
                               placeholder="Следующий текст успешно скопирован в буфер обмена:"
                               value="Следующий текст успешно скопирован в буфер обмена:">
                    </div>
                    <div class="label-input pull-left">
                        <label for="ButtonStyle">
                            CSS стиль кнопки
                        </label>
                    </div>
                    <div class="input pull-left">
                        <textarea name="PublicInvoiceURL[Button][Style]"></textarea>
                    </div>
                    <div class="label-input pull-left">
                        <label for="ScriptButtonInvoiceUrlInsert">
                            Скрипт добавления кнопки публичной оплаты счета
                        </label>
                    </div>
                    <div class="input pull-left">
                        <textarea name="PublicInvoiceURL[Button][InsertScript]">{literal}document.addEventListener("DOMContentLoaded",function(){ window.clipboard = new Clipboard(".btn");var b=document.createElement("div");b.innerHTML='<div style=\"margin-bottom: 20px;\"><button %s>%s</button></div>';for(var a=0;a<document.getElementsByClassName("invoice-container")[0].children.length;a++)"panel panel-default"===document.getElementsByClassName("invoice-container")[0].children[a].className&&(parentDiv=document.getElementsByClassName("invoice-container")[0].children[a].parentNode,parentDiv.insertBefore(b,document.getElementsByClassName("invoice-container")[0].children[a]))});{/literal}</textarea>
                    </div>
                    <div class="label-input pull-left">
                        <label for="ScriptInvoiceUrlCopySuccessInsertAlert">
                            Скрипт добавления уведомления об успешном копировании ссылки на публичную оплату счета
                        </label>
                    </div>
                    <div class="input pull-left">
                        <textarea name="PublicInvoiceURL[Alert][InsertScript]">{literal}document.addEventListener("DOMContentLoaded",function(){window.clipboard.on("success",function(b){var c=document.createElement("div");c.innerHTML='<div class=\"alert alert-success fade in\" style=\"word-break: break-all;\"><strong>\u0421\u043b\u0435\u0434\u0443\u044e\u0449\u0438\u0439 \u0442\u0435\u043a\u0441\u0442 \u0443\u0441\u043f\u0435\u0448\u043d\u043e \u0441\u043a\u043e\u043f\u0438\u0440\u043e\u0432\u0430\u043d \u0432 \u0431\u0443\u0444\u0435\u0440 \u043e\u0431\u043c\u0435\u043d\u0430:  </strong>'+b.text+"</div>";for(b=0;b<document.getElementsByClassName("invoice-container")[0].children.length;b++)"panel panel-default"===document.getElementsByClassName("invoice-container")[0].children[b].className&&(parentDiv=document.getElementsByClassName("invoice-container")[0].children[b].parentNode,parentDiv.replaceChild(c,document.getElementsByClassName("invoice-container")[0].children[b-1]))})});{/literal}</textarea>
                    </div>
                </div>
            </div>
            <div id="StepInstallTwo" style="display: none">
                <div class="checkbox checkbox-primary">
                    <input id="isEnableGroupPayDonate" type="checkbox" name="GroupPayDonate[Enable]">
                    <label for="isEnableGroupPayDonate">
                        Включить возможность анонимного пополнения баланса
                    </label>
                </div>
                <div id="SettingGroupPayDonate" style="display: none;">
                    <div class="checkbox checkbox-primary">
                        <input id="isEnableGroupPayDonateByClientEmail" type="checkbox"
                               name="GroupPayDonate[DonateByClientEmail][Enable]">
                        <label for="isEnableGroupPayDonateByClientEmail">
                            По email клиента в системе
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="isEnableGroupPayDonateByClientID" type="checkbox"
                               name="GroupPayDonate[DonateByClientID][Enable]">
                        <label for="isEnableGroupPayDonateByClientID">
                            По ID клиента в системе
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="GroupPayDonateByTeamSpeak3Server" type="checkbox"
                               name="GroupPayDonate[DonateByTeamSpeak3Server][Enable]">
                        <label for="GroupPayDonateByTeamSpeak3Server">
                            По адресу TeamSpeak 3 сервера
                        </label>
                    </div>
                    <div id="GroupPayDonateByTeamSpeak3ServerConfig" style="display: none;">
                        <div style="display: inline-block;">
                            <div class="label-input pull-left">
                                <label for="GroupPayDonateByTeamSpeak3ServerCustomFieldContainsPort">
                                    Название настраиваемого поля продукта которое содержит "порт" сервера
                                </label>
                            </div>
                            <div class="input pull-left">
                                <select size="1" id="GroupPayDonateByTeamSpeak3ServerCustomFieldContainsPort"
                                        name="GroupPayDonate[DonateByTeamSpeak3Server][CustomFieldContainsPort]">
                                    {foreach from=$CustomFieldsAllProduct item=Name}
                                        <option value="{$Name}">{$Name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                        <div style="display: inline-block;">
                            <div class="label-input pull-left">
                                <label for="GroupPayDonateByTeamSpeak3ServerAllow">
                                    Список IP адресов серверов для которых разрешен данный вид пополнения
                                </label>
                            </div>
                            <div class="input pull-left">
                                <textarea id="GroupPayDonateByTeamSpeak3ServerAllow"
                                          name="GroupPayDonate[DonateByTeamSpeak3Server][ServerAllowList]"
                                          disabled>{$AllowIP}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="GroupPayDonateAddMessageRecipient" type="checkbox"
                               name="GroupPayDonate[AddMessageRecipient]">
                        <label for="GroupPayDonateAddMessageRecipient">
                            Возможность оставить сообщение получателю
                        </label>
                    </div>
                    <div style="display: inline-block;">
                        <div class="label-input pull-left">
                            <label for="GroupPayDonatePrimaryNavBarRoot">
                                Выберите корневой элемент меню в котором расположить ссылку на анонимное пополнение
                                баланса
                            </label>
                        </div>
                        <div class="input pull-left">
                            <select size="1" id="GroupPayDonatePrimaryNavBarRoot"
                                    name="GroupPayDonate[PrimaryNavBarRoot]">
                                <option value="first">В корне меню</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div class="label-input pull-left">
                            <label for="GroupPayDonatePrimaryNavBarSubItem">
                                Выберите под элемент меню после которого расположить ссылку на анонимное пополнение
                                баланса
                            </label>
                        </div>
                        <div class="input pull-left">
                            <select size="1" id="GroupPayDonatePrimaryNavBarSubItem"
                                    name="GroupPayDonate[PrimaryNavBarSubItem]">
                                <option value="first">До первого элемента</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div class="label-input pull-left">
                            <label for="GroupPayDonatePrimaryNavBarDisplayName">
                                Введите отображаемое имя пункта меню
                            </label>
                        </div>
                        <div class="input pull-left">
                            <input type="text" id="GroupPayDonatePrimaryNavBarDisplayName"
                                   name="GroupPayDonate[PrimaryNavBarDisplayName]" value="Групповая оплата">
                        </div>
                    </div>
                </div>
            </div>
            <div id="ToStepInstallThree" style="display: none">
                <div class="checkbox checkbox-primary">
                    <input id="isEnableGroupPayDonateWidget" type="checkbox" name="GroupPayDonateWidget[Enable]">
                    <label for="isEnableGroupPayDonateWidget">
                        Включить виджет для анонимного пополнения баланса
                    </label>
                </div>
                <div id="SettingGroupPayDonateWidget" style="display: none;">
                    <div style="display: inline-block;">
                        <div class="label-input pull-left">
                            <label for="GroupPayDonateWidgetPrimaryNavBarRoot">
                                Выберите корневой элемент меню в котором расположить ссылку на настройку виджета
                                анонимного пополнения
                                баланса
                            </label>
                        </div>
                        <div class="input pull-left">
                            <select size="1" id="GroupPayDonateWidgetPrimaryNavBarRoot"
                                    name="GroupPayDonateWidget[PrimaryNavBarRoot]">
                                <option value="first">В корне меню</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div class="label-input pull-left">
                            <label for="GroupPayDonateWidgetPrimaryNavBarSubItem">
                                Выберите под элемент меню после которого расположить ссылку на настройку виджета
                                анонимного пополнения
                                баланса
                            </label>
                        </div>
                        <div class="input pull-left">
                            <select size="1" id="GroupPayDonateWidgetPrimaryNavBarSubItem"
                                    name="GroupPayDonateWidget[PrimaryNavBarSubItem]">
                                <option value="first">До первого элемента</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div class="label-input pull-left">
                            <label for="GroupPayDonateWidgetPrimaryNavBarDisplayName">
                                Введите отображаемое имя пункта меню
                            </label>
                        </div>
                        <div class="input pull-left">
                            <input type="text" id="GroupPayDonateWidgetPrimaryNavBarDisplayName"
                                   name="GroupPayDonateWidget[PrimaryNavBarDisplayName]" value="Публичное пополнение">
                        </div>
                    </div>
                </div>
            </div>
            <div id="ToStepInstallFour" style="display: none">
                <div class="checkbox checkbox-primary">
                    <input id="isEnableGroupPayDonateService" type="checkbox" name="GroupPayDonateService[Enable]">
                    <label for="isEnableGroupPayDonateService">
                        Включить возможность публичной оплаты услуги по домену
                    </label>
                </div>
                <div id="GroupPayDonateServiceConfig" style="display: none;">
                    <div class="checkbox checkbox-primary">
                        <input id="GroupPayDonateServiceShowServiceInfo" type="checkbox"
                               name="GroupPayDonateService[ShowServiceInfo]">
                        <label for="GroupPayDonateServiceShowServiceInfo">
                            Отображать сведения об услуге
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="GroupPayDonateServiceShowBalanceUser" type="checkbox"
                               name="GroupPayDonateService[ShowBalanceUser]">
                        <label for="GroupPayDonateServiceShowBalanceUser">
                            Отображать баланс пользователя
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="GroupPayDonateServiceShowUserInvoiceList" type="checkbox"
                               name="GroupPayDonateService[ShowUserInvoiceList]">
                        <label for="GroupPayDonateServiceShowUserInvoiceList">
                            Отображать список счетов
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="GroupPayDonateServiceShowAddBalanceWidget" type="checkbox"
                               name="GroupPayDonateService[ShowAddBalanceWidget]">
                        <label for="GroupPayDonateServiceShowAddBalanceWidget">
                            Показывать виджет пополнения баланса
                        </label>
                    </div>
                    <div style="display: inline-block;">
                        <div class="label-input pull-left">
                            <label for="GroupPayDonateByTeamSpeak3ServerAllow">
                                Список IP адресов серверов для которых разрешен данный вид пополнения
                            </label>
                        </div>
                        <div class="input pull-left">
                                <textarea id="GroupPayDonateByTeamSpeak3ServerAllow"
                                          name="GroupPayDonateService[ServerAllow]" disabled>{$AllowIP}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div id="Line"></div>
            <button onclick="ToStepInstallTwo()" type="button">Продолжить</button>
        </form>
    </div>
</div>

