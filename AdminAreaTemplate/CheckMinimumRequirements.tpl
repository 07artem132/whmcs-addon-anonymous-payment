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
    }

    .ModuleContainer div {
        width: 300px;
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
        min-width: 200px;
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

    #ResellerCheckOn, #ResellerCheckOff {
        height: 30px;
        line-height: 30px;
        font-size: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, .4);
        margin-top: 10px;
        margin-bottom: 10px;
        text-indent: 5px;
        box-sizing: unset;
    }

    .ModuleContainer #ResellerCheckOn img, #ResellerCheckOff img {
        display: inline-block;
        float: right;
        height: 30px;
    }

    #ResellerCheckOff img:hover {
        cursor: pointer;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        z-index: 1000000000;
    }

    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        width: 30%;
        position: relative;
        transition: all 5s ease-in-out;
    }

    .popup h2 {
        margin-top: 0;
        color: #006eac;
        font-family: 'Roboto', sans-serif;
    }

    .popup .close {
        position: absolute;
        top: 20px;
        right: 30px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }

    .popup .close:hover {
        color: #006eac;
    }

    .popup .content {
        max-height: 30%;
        overflow: auto;
        font-family: 'Roboto', sans-serif;
        color: #006eac;
    }

    @media screen and (max-width: 700px) {
        .box {
            width: 70%;
        }

        .popup {
            width: 70%;
        }
    }
</style>

<div class="ModuleContainer">
    <!-- Любой код -->
    <div>
        <div>
            <div id="welcome">{$LangModule::Translate('InstallationRequirements')}</div>
            <div id="Line"></div>

            {$InstallAllow = true}

            {foreach from=$Check item=Item}
                <div {if $Item['Status']}
                    id="ResellerCheckOn"
                {else}
                    id="ResellerCheckOff"
                {/if}
                >{$Item['name']}
                    {if $Item['Status']}
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAABG3AAARtwGaY1MrAAABNmlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjarY6xSsNQFEDPi6LiUCsEcXB4kygotupgxqQtRRCs1SHJ1qShSmkSXl7VfoSjWwcXd7/AyVFwUPwC/0Bx6uAQIYODCJ7p3MPlcsGo2HWnYZRhEGvVbjrS9Xw5+8QMUwDQCbPUbrUOAOIkjvjB5ysC4HnTrjsN/sZ8mCoNTIDtbpSFICpA/0KnGsQYMIN+qkHcAaY6addAPAClXu4vQCnI/Q0oKdfzQXwAZs/1fDDmADPIfQUwdXSpAWpJOlJnvVMtq5ZlSbubBJE8HmU6GmRyPw4TlSaqo6MukP8HwGK+2G46cq1qWXvr/DOu58vc3o8QgFh6LFpBOFTn3yqMnd/n4sZ4GQ5vYXpStN0ruNmAheuirVahvAX34y/Axk/96FpPYgAAACBjSFJNAAB6JQAAgIMAAPn/AACA6AAAUggAARVYAAA6lwAAF2/XWh+QAAAB9ElEQVR42uzWyWsUQRTH8c+IwZsSRUW9BY3bXRExoIJrEKMgXlxOOStCRFEiJBo31Iv+E2JcMWOciSsK6jlK0LuGXIKCmBDGywsMzSTTPYPmkh80Tb/q6m+96l/Vq1ypVDITmmOGNAv+b5pbKdjc1zDVIHehDeuwNOLDGMRDPMVEsuPQ7vF04ArahstYjje4i88oYQ024g5+4Cz6a8o4oQ704Cau43uifRKyBCcj6wvorgfcgU60oq/Ku8M4gyJ6kUNXLeCtuII9KaDlKmB/3D8in8XVDbiFGxmhkxoo+z3zsoB3YFl0TqtV2FD2fBULY8ZSg9ti1CMpoavxCnvLYqMxzQezgNfjfUpocxiqHxcTba9juaUGL451Wq61WFEh0wG8wHGMJdq/YUG9W+YhvENTGbQY4CNT9CnFlRo8Eh+WMMsHPMPOuA/g6DSDbcLPLOBBbErEfuMwPoVpilWg0IKhLOD72I7GRHwCx8L17VWg86Oo3MsCzsd0n67QNoYHlapQQqfwC4+zbJnjOBFLpBBXFm3BeezDn6yufh6de2Pa06olavMlPKn1BNKNa+HgLiya5t3GqGQF3Ma5eutxV1SZnnDxS7zF11ijK7E5qtkoDkyXadYTSD4yaY0Pt8eOlAvYlzDTo/BHVeVmD/Sz4H+lvwMAlC5z0yTnX7UAAAAASUVORK5CYII=">
                    {else}
                        <a href="#{$Item['NameLinkDoc']}">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAABG3AAARtwGaY1MrAAABNmlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjarY6xSsNQFEDPi6LiUCsEcXB4kygotupgxqQtRRCs1SHJ1qShSmkSXl7VfoSjWwcXd7/AyVFwUPwC/0Bx6uAQIYODCJ7p3MPlcsGo2HWnYZRhEGvVbjrS9Xw5+8QMUwDQCbPUbrUOAOIkjvjB5ysC4HnTrjsN/sZ8mCoNTIDtbpSFICpA/0KnGsQYMIN+qkHcAaY6addAPAClXu4vQCnI/Q0oKdfzQXwAZs/1fDDmADPIfQUwdXSpAWpJOlJnvVMtq5ZlSbubBJE8HmU6GmRyPw4TlSaqo6MukP8HwGK+2G46cq1qWXvr/DOu58vc3o8QgFh6LFpBOFTn3yqMnd/n4sZ4GQ5vYXpStN0ruNmAheuirVahvAX34y/Axk/96FpPYgAAACBjSFJNAAB6JQAAgIMAAPn/AACA6AAAUggAARVYAAA6lwAAF2/XWh+QAAAC8UlEQVR42uyWTWhcVRTHf+caUGohBBdmkRBMLQhdiLgNDqW3JStd9MNJDFLcqEGwbqQqLc0i0PYtEqF1Y0IprbbRhUVDpNxB0SwTFDfFxSD4Uck0Slo7ExgI93ThHXkd3n3zgkPdeODyZs753/O7c9+55w6qSpeGUdUxVf1cVW/p33YrfB8L8X/03YIOq+qq5ttq0HUNPKyqNS1mtRa8G9u7otuzFVU1/xY83p61Xq9ruVzWJEnUWqtJkmTBxwtDnMijTmTCiVxzIr86kcYf169vZWW11qqqarVaVUCr1Wq75EtDAasYcwT4EbgI9AHzwGt9pdJmlt45B0C9Xgegv7+/XfJ0kV8640TUiVxwIrvb4lFbW1tTa60uLS1lhZtFoRMRzXoMnCSJLi8vx8K/m5ztPQgcAyas95cjstW8VzQyMhIL/WAi0B3AeeCy9f6j4OupGDPUJr2UNb/RaABQq9Vi4EuxLR4PWzyU8j3pRBpO5Finc9yq5sj7jZ9jJ/KFE/m2zfeQE3kvLOjNlv+70dGTzVrRxqU1Vd0V7VxO5KYTORGJHQ/w153IK05EV0ul9wv26l25vdqJbDqRl3Kq/a0AVyfydsbtdFNVm1uNxsb64uJW6HD33U49OUWpObG/Up/vhqcHroQBwNc7d74IXLDef9yeIAa+DTwRqfjJUPHHgSbwQcWYh633sxnywdTCCoG/B/YD0ymgAJPAOeCU9f5M8D8CzFSMMcCs9d6n8uwFbmQBYg3kKvBcxZiBlG8YmA3QqZbTen8aeAc4CzyVWujjwIGQqzD4M+BPYCrl+w14Ng1tgz8D/JRynwrbvJBdQfHKLYeqPbTde9qJPB/mHo1pOiU4HxIc3gb0hTBnLk/X0+EqfiM8P6kY8yEwbb3/OVLtA+FdTwJzwKt5iUVVi/wReBk4DTwGfAV8A/wSzvogUAL2AXeAd633851yFgIHeC9wJIw9QG+qmdwAPgUWrPcbRfIVBnfbDP+R/Q9+YHZvAOK7fIN3uF7FAAAAAElFTkSuQmCC">
                        </a>
                    {/if}
                </div>
                {if !$Item['Status']}{$InstallAllow = false}{/if}
            {/foreach}

            {if {$InstallAllow}}
                <a href="{$ModuleLink}&page=firstconfig">
                    <button>{$LangModule::Translate('Install')}</button>
                </a>
            {else}
                <a href="{$ModuleLink}&page=checkminimumrequirements">
                    <button>{$LangModule::Translate('CheckAgain')}</button>
                </a>
            {/if}
        </div>

    </div>
</div>

{foreach from=$Check item=Item}
    <div id="{$Item['NameLinkDoc']}" class="overlay">
        <div class="popup">
            <h2>{$Item['name']}</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                {$Item['ErrorDescription']}
            </div>
        </div>
    </div>
{/foreach}
