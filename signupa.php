<?php
    include 'header.php'
?>
        <style>
            .com {
                text-decoration: underline;
            }
        </style>
        <main>
            <div class="wrapper">
                <form name="acompform" class="formcomp" netlify>
                    <p class="NOP">
                    <label>Name of Participant<br><input type="text" name="name"/></label>
                    </p>
                    <p class="EOP">
                    <label>Email of Participant<br><input type="email" name="email"/></label>
                    </p>
                    <p class="EOPG">
                    <label>Email of Participant's Guardian<br><input type="email" name="email2"/></label>
                    </p>
                    <p class="signb">
                    <button type="submit" class="signb1">Send</button>
                    </p>
                </form>
            </div>
        </main>
<?php
    include 'footer.php'
?>