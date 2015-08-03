/**
 * Created by andresburden on 11/23/14.
 */
function edit_account_Information() {
    var field_1 = document.getElementById("01");
    field_1.disabled = false;
    var field_2 = document.getElementById("02");
    field_2.disabled = false;
    var field_3 = document.getElementById("03");
    field_3.disabled = false;
    var field_4 = document.getElementById("04");
    field_4.disabled = false;
    var submit = document.getElementById("account_information_submit")
    var removeClass = " hidden"
    submit.className = submit.className.replace(removeClass,"");
    var a = document.getElementById("information_edit_link");
    a.className = a.className + " hidden";
}

function edit_account_settings() {
    var field_14 = document.getElementById("14");
    field_14.disabled = false;
    var field_15 = document.getElementById("15");
    field_15.disabled = false;
    var submit = document.getElementById("account_settings_div_01")
    var removeClass = " hidden"
    submit.className = submit.className.replace(removeClass,"");
    var submit = document.getElementById("account_settings_div_02")
    var removeClass = " hidden"
    submit.className = submit.className.replace(removeClass,"");
    var submit = document.getElementById("account_settings_div_03")
    var removeClass = " hidden"
    submit.className = submit.className.replace(removeClass,"");
    var a = document.getElementById("account_settings_edit_link");
    a.className = a.className + " hidden";
}