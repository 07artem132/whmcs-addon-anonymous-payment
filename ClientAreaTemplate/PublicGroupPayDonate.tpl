<style>
    .payment .form-row {
        line-height: 50px;
    }

    .payment label {
        cursor: pointer;
        margin: 0 30px 0 0;
    }

    .payment input[type="radio"] + i + span {
        color: #333333;
        font-size: 16px;
        font-weight: 400;
        border-bottom: 1px dotted #333333;
    }

    .payment input[type="radio"]:checked + i + span {
        color: #00a4e1;
        font-size: 16px;
        font-weight: 400;
        border-bottom: none;
    }

    .payment input[type="radio"] {
        /* display: none;*/
    }

    .payment .border {
        border-top: 1px solid #e9e9e9;
        border-bottom: 1px solid #e9e9e9;
        padding: 20px 0 0px 0;
        margin: 10px 0 0px 0;
    }

    .payment .errors {
        width: 300px;
        margin-left: 30px;
        float: left;
        color: red;
    }

    .payment input[type="text"] {
        border: solid 1px #cdcdcd;
        width: 333px;
        height: 60px;
        padding: 0 20px;
        margin-bottom: 20px;
    }

    .payment input[type="email"] {
        border: solid 1px #cdcdcd;
        width: 333px;
        height: 60px;
        padding: 0 20px;
        margin-bottom: 20px;
    }

    .payment input[type="number"] {
        border: solid 1px #cdcdcd;
        width: 333px;
        height: 60px;
        padding: 0 20px;
        margin-bottom: 20px;
    }

    input[type='number'] {
        -moz-appearance: textfield;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    .payment .pay {
        margin: 0 0 50px 0;
        color: #333333;
        font-size: 22px;
        font-weight: 300;
        line-height: 50px;
    }

    .payment .pay button:hover {
        color: #fff;
        background-color: #286090;
        border-color: #204d74;
    }

    .payment .pay button {
        width: 240px;
        height: 50px;
        font-size: 17px;
        font-weight: 700;
        border: none;
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }

    .payment .border-bottom {
        border-bottom: 1px solid #e9e9e9;
        padding: 0 0 20px 0;
        margin: 0 0 23px 0;
    }

    .payment .method label {
        line-height: 13px;
        margin: 0;
        white-space: nowrap;
    }

    .payment .method {
        width: 100%;
        padding-top: 15px;
    }

    .payment .method input[type="radio"] + i + span {
        border-bottom: none;
        color: #000;
        font-size: 13px;
        font-weight: 400;
    }

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .col.GatewayModule {
        padding-bottom: 15px;
    }

    .container.payment {
        max-width: 1000px;
    }

    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }

    [type="radio"]:checked + label,
    [type="radio"]:not(:checked) + label {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }

    [type="radio"]:checked + label:before,
    [type="radio"]:not(:checked) + label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        border-radius: 100%;
        background: #fff;
    }

    [type="radio"]:checked + label:after,
    [type="radio"]:not(:checked) + label:after {
        content: '';
        width: 10px;
        height: 10px;
        background: #00a4e1;
        position: absolute;
        top: 4px;
        left: 4px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    [type="radio"]:not(:checked) + label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    [type="radio"]:checked + label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
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
        float: left;
    }

    .payment input[type="email"]:read-only {
        background-color: rgb(235, 235, 228);
    }

    .payment input[type="number"]:read-only {
        background-color: rgb(235, 235, 228);
    }

    .payment input[type="text"]:read-only {
        background-color: rgb(235, 235, 228);
    }

    @media (min-width: 300px) and (max-width: 1000px) {
        section#footer {
            padding: 20px 0px;
        }

        .payment input[type="email"] {
            width: 100%;
        }

        .payment input[type="number"] {
            width: 100%;
        }

        .payment input[type="text"] {
            width: 100%;
        }

        input#form_ip {
            width: 60%;
            float: left;
        }

        .payment .description {
            font-size: 13px;
        }

        div#PaymentVar {
            width: 100%;
            display: block;
        }

        ul#PaymentVarList {
            display: block;
            list-style-type: none;
            padding-left: 0px;
            margin-left: 0px;
        }

        .payment .label-input {
            width: 100%;
        }

        .payment .input {
            width: 100%;
        }

        .payment .form-row input {
            float: none;
            display: block;
        }

        .payment .description {
            margin: 0px;
        }

        div#GoToPay {
            text-align: center;
            width: 100%;
        }

        .payment .pay button {
            float: unset;
        }

        div#GoToPayDescription {
            width: 100%;
            padding-bottom: 15px;
        }
    }

    @media (min-width: 771px) and (max-width: 1000px) {
        .container.payment {
            width: 720px;
        }
    }

    @media (min-width: 1000px) {
        .container.payment {
            width: 950px;
        }

        div#PaymentVar {
            width: auto;
        }

        input#form_ip {
            width: 239px;
            float: left;
        }

        ul#PaymentVarList {
            padding-left: 40px;
            display: flex;
            list-style-type: none;
        }

        .payment .description {
            color: #999;
            font-size: 14px;
            font-weight: 400;
            margin: 0 0 0 5px;
            display: block;
            float: left;
            line-height: 59px;
        }

        .payment .form-row input {
            float: left;
        }

        .payment .label-input {
            width: 240px;
            color: #000;
            font-size: 16px;
            font-weight: 400;
        }

        .payment .pay button {
            float: right;
        }

        div#GoToPay {
            width: 41.66666667%;
        }

        div#GoToPayDescription {
            width: 58.33333333%;
            font-size: 20px;
        }

        .payment .input {
            width: auto;
        }
    }

</style>
<script type="text/javascript">
    $(function () {
        if ($('input[type=radio][name=PaymentType]:checked').val() == '1') {
            $(".Client-ID-form-row").css('display', 'none');
            $(".host-ip-form-row").css('display', 'none');
            $(".border").find(".clearfix.form-row:eq(0)").css('display', 'block');
            $('input[type=email][name=ClientEmail]').prop('disabled', false);
        }
        else if ($('input[type=radio][name=PaymentType]:checked').val() == '2') {
            $(".Client-ID-form-row").css('display', 'none');
            $(".host-ip-form-row").css('display', 'block');
            $(".border").find(".clearfix.form-row:eq(0)").css('display', 'none');
            $('input[type=email][name=ClientEmail]').prop('disabled', true);

        } else if ($('input[type=radio][name=PaymentType]:checked').val() == '3') {
            $(".Client-ID-form-row").css('display', 'block');
            $(".host-ip-form-row").css('display', 'none');
            $(".border").find(".clearfix.form-row:eq(0)").css('display', 'none');
            $('input[type=email][name=ClientEmail]').prop('disabled', true);
        }

        $('input[type=radio][name=PaymentType]').change(function () {
            console.log(this.value);
            if (this.value == '1') {
                $(".Client-ID-form-row").css('display', 'none');
                $(".host-ip-form-row").css('display', 'none');
                $(".border").find(".clearfix.form-row:eq(0)").css('display', 'block');
                $('input[type=email][name=ClientEmail]').prop('disabled', false);
            }
            else if (this.value == '2') {
                $(".Client-ID-form-row").css('display', 'none');
                $(".host-ip-form-row").css('display', 'block');
                $(".border").find(".clearfix.form-row:eq(0)").css('display', 'none');
                $('input[type=email][name=ClientEmail]').prop('disabled', true);

            } else if (this.value == '3') {
                $(".Client-ID-form-row").css('display', 'block');
                $(".host-ip-form-row").css('display', 'none');
                $(".border").find(".clearfix.form-row:eq(0)").css('display', 'none');
                $('input[type=email][name=ClientEmail]').prop('disabled', true);
            }
        });
        $("input:radio[name=GatewayModuleName]:first").attr('checked', true);

        $('input[type=checkbox][name=MessageRecipientStatus]').change(function () {
            $(".clearfix.form-row.MessageRecipient-row").slideToggle();
        });

        $("#PaymentVarList li:first-child input").click()
    });
</script>
<div class="container payment">
    <form method="post" action="/public/grouppay/">
        <div class="clearfix form-row payment__form-row payment__form-row_single-row">
            <div class="label-input pull-left" id="PaymentVar">
                Варианты пополнения
            </div>
            <ul id="PaymentVarList">
                {if $DonateClientEmail }
                    <li>
                        <label for="ClientEmail">
                            <input type="radio" id="ClientEmail" value="1" name="PaymentType"
                                   {if $ClientEmailError === 1}checked="checked"{/if}
                                    {if !empty($smarty.get.ClientEmail)}checked="checked"{/if}
                            >
                            <i></i>
                            <span>По email клиента в системе</span>
                        </label>
                    </li>
                {/if}
                {if $DonateClientID  }
                    <li>
                        <label for="ClientID">
                            <input type="radio" id="ClientID" value="3" name="PaymentType"
                                   {if $ClientIDError === 1}checked="checked"{/if}
                                    {if !empty($smarty.get.ClientID)}checked="checked"{/if}
                            >
                            <i></i>
                            <span>По ID клиента в системе</span>
                        </label>
                    </li>
                {/if}
                {if $DonateHost  }
                    <li>
                        <label for="TeamSpeak3Host">
                            <input type="radio" id="TeamSpeak3Host" value="2" name="PaymentType"
                                   {if $ServerAddressError === 1}checked="checked"{/if}
                                    {if !empty($smarty.get.ServerIP)}checked="checked"{/if}
                            >
                            <i></i>
                            <span>По адресу сервера</span>
                        </label>
                    </li>
                {/if}
            </ul>
        </div>
        <div class="border">
            <div class="clearfix form-row" style="display: none;">
                <div class="label-input pull-left">
                    <label for="form_customer">Email клиента в системе</label>
                </div>
                <div class="input pull-left">
                    <input type="email" id="form_customer" name="ClientEmail" placeholder="example@example.com"
                            {if !empty($smarty.get.ClientEmail)}
                                value="{$smarty.get.ClientEmail}" readonly
                            {/if}
                           required>
                </div>
                {if $ClientEmailError === 1}
                    <span class="errors">Клиент с таким email не найден</span>
                {else}
                    <span class="description">Введите только цифры без пробелов и тире.</span>
                {/if}
            </div>
            <div class="clearfix form-row Client-ID-form-row" style="display: none;">
                <div class="label-input pull-left">
                    <label for="ClientID">ID клиента</label>
                </div>
                <div class="input pull-left">
                    <input type="number" id="ClientID" name="ClientID" placeholder="3524"
                            {if !empty($smarty.get.ClientID)}
                                value="{$smarty.get.ClientID}" readonly
                            {/if}
                    >
                </div>
                {if $ClientIDError === 1}
                    <span class="errors">Клиент с таким ID не найден</span>
                {else}
                    <span class="description">Введите только цифры без пробелов и тире.</span>
                {/if}
            </div>
            <div class="clearfix form-row host-ip-form-row" style="display: none;">
                <div class="label-input pull-left">
                    <label for="form_ip">Адрес сервера</label>
                </div>
                <div class="input pull-left">
                    <input type="text" id="form_ip" name="ServerIP"
                           placeholder="ts1.teamspeak.com"
                            {if !empty($smarty.get.ServerIP)}
                                value="{$smarty.get.ServerIP}" readonly
                            {/if}
                    >
                    <span class="pull-left" style="font-size: 45px;">:</span>
                    <input type="text" id="form_port" name="ServerPort" style="float: left; width: 90px;"
                           placeholder="9987"
                            {if !empty($smarty.get.ServerPort)}
                                value="{$smarty.get.ServerPort}" readonly
                            {/if}
                    >
                </div>

                <span class="description">
                В первую часть поля введите ip, во вторую порт.
            </span>
            </div>

            <div class="clearfix form-row amount-row">
                <div class="label-input pull-left">
                    <label for="form_amount" class="required">Сумма платежа</label>
                </div>
                <input type="number" id="form_amount" name="Amount" class="currency" placeholder="0,00"
                        {if !empty($smarty.get.AddBalanceSum)}
                            value="{$smarty.get.AddBalanceSum}"
                        {else}
                            value="0"
                        {/if}
                       required>
                {if $AmountError === 1}
                    <span class="errors">Введите целое число от {$MinAddBalanseNoFormat}
                        до {$MaxAddBalanseNoFormat}</span>
                {else}
                    <span class="description">Минимальный платёж:
                <span class="money-to-change change-with-currency"
                      data-money-change-marker="minCharge">{$MinAddBalanse}</span>
            </span>
                {/if}
            </div>

            <div class="clearfix" style="padding-bottom: 14px;">
                <div class="label-input pull-left">
                    <label for="form_amount" class="required">&nbsp;</label>
                </div>
                <div class="checkbox checkbox-primary">
                    <input id="MessageRecipientStatus" type="checkbox" name="MessageRecipientStatus">
                    <label for="MessageRecipientStatus">
                        Добавить сообщение получателю
                    </label>
                </div>
            </div>

            <div class="clearfix form-row MessageRecipient-row" style="display: none;">
                <div class="label-input pull-left">
                    <label for="MessageRecipient" class="required">Cообщение получателю</label>
                </div>
                <input type="text" id="MessageRecipient" name="MessageRecipient"
                       placeholder="Донат на тс от Васи" autocomplete="off">
                <span class="description">Это сообщение увидит получатель.

            </span>
            </div>


        </div>
        <div class="clearfix form-row border-bottom">
            <div class="label-input pull-left">
                Способ платежа
            </div>
            <div class="row pull-left method">
                {foreach from=$GatewaysList key=ModuleName item=ModuleDisplayName}
                    <div class="col GatewayModule">
                        <input type="radio" id="{$ModuleName}" name="GatewayModuleName" value="{$ModuleName}">
                        <label for="{$ModuleName}">{$ModuleDisplayName}</label>
                    </div>
                {/foreach}
            </div>
        </div>
        <div class="row pay">
            <div id="GoToPayDescription" class="col-xs-7">
                Проверьте указанные данные и нажмите на кнопку
            </div>
            <div id="GoToPay" class="col-xs-5">
                <button type="submit">Оплатить</button>
            </div>
        </div>
    </form>
</div>