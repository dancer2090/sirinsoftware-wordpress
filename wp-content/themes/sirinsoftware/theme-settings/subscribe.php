

<?php

$emails = get_option('sirin-subscribe-emails-theme') ? get_option('sirin-subscribe-emails-theme') : [];

?>

<form method="POST">
    <input type="hidden" name="sirin-download-emails-theme" value="true">
    <table class="form-table">
        <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php
            if($emails) {
                foreach ($emails as $email) {
                    ?>

                        <tr>

                            <td><?php echo $email['EMAIL'] ?></td>
                            <td><?php echo $email['FNAME'] ?></td>
                            <td><?php echo $email['LNAME'] ?></td>

                        </tr>

                    <?php
                }
            }
        ?>

        <!-- Main phone number -->


        <!-- Submit form -->
        <tr>
            <th scope="row"><input type="submit" value="<?php echo __('Download', 'sirinsoftware')?>" class="button button-primary button-large"></th>
            <td align="right"></td>
        </tr>
    </table>
</form>