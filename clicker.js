(function ($) {
    $(document).ready(function () {
        $('button.clicker').on('click', clickHandler);
        function clickHandler(event) {
            verifyEmail();
        }

        $('#submitBtn').on('click', callSubmit);
        function callSubmit(event) {
            verifyToken();
        }

    });
    function verifyToken(){
        var token = $('#token').val();
        $.ajax({
            type: "POST",
            url: '/plugin/wp-content/plugins/assign3-plugin/email-confirmation.php',
            dataType: 'json',
            data: { functionname: 'send', arguments: [token] },

            success: function (obj, textstatus) {
                if (!('error' in obj)) {
                    alert("token is valid");
                }
                else {
                    console.log(obj.error);
                    alert("invalid token");
                }
            }
        });
    }
    function verifyEmail() {
        var email = $('.emailAdd').val();
        var isvalid = validateEmail(email);
        if (isvalid) {
            $.ajax({
                type: "POST",
                url: '/plugin/wp-content/plugins/assign3-plugin/email-confirmation.php',
                dataType: 'json',
                data: { functionname: 'check', arguments: [email, "Email Confirmation", "Mail verification", "From: admin <noreply@admin>"] },

                success: function (obj, textstatus) {
                    if (!('error' in obj)) {
                        shownewLayout();
                        alert(obj.toString());
                    }
                    else {
                        console.log(obj.error);
                        alert("mail not sent");
                    }
                }
            });
        } else {
            alert("invalid email")
        }


    };
    function validateEmail(inputText) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(inputText).toLowerCase());

    };
    function shownewLayout() {
        $('.mainDiv').html("");
        $('.mainDiv').append('<form id="submitToken"><label for="phone">Enter your token</label><br><br>input type="text" id="token" name="token" placeholder="token" required><br><br\><input id="submitBtn" type="submit"></form>');
    }

})(jQuery);