<br/>

{include file="$template/includes/alert.tpl" type="info" msg=$message textcenter=true}

<br/>

<div class="text-center">

    <img src="{$BASE_PATH_IMG}/loading.gif" alt="Loading" border="0"/>

    <br/><br/><br/>

    <div id="frmPayment" align="center">

        {$code}

        <form method="post" action="{if $invoiceid}viewinvoice.php?id={$invoiceid}{else}clientarea.php{/if}">
        </form>

    </div>

</div>

<br/><br/><br/>

<script language="javascript">
    for (var i = 0; i < document.getElementsByTagName("form")[0].getElementsByTagName('input').length; i++) {
        if (document.getElementsByTagName("form")[0].getElementsByTagName('input')[i].name === 'token') {
            var child = document.getElementsByTagName("form")[0].getElementsByTagName('input')[i];
        }
    }
    var parent = document.getElementsByTagName("form")[0];
    parent.removeChild(child);

    setTimeout("autoSubmitFormByContainer('frmPayment')", 5000);
</script>
