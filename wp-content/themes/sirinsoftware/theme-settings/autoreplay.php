<form method="POST">
    <table class="form-table">
        <!-- Main phone number -->
        <tr>
            <th><h2>Customer request</h2></th>
            <td></td>
        </tr>
        <tr>
            <th scope="row" align="right"><label for="sirin-request-autoreplay-theme"><?php echo __('Request Autoreplay Theme', 'sirinsoftware')?>:</label></th>
            <td>
                <input type="text" id="sirin-request-autoreplay-theme" class="regular-text" name="sirin-request-autoreplay-theme" value="<?php echo (get_option('sirin-request-autoreplay-theme'))? get_option('sirin-request-autoreplay-theme') : '';?>">
            </td>
        </tr>
        <tr>
            <th scope="row" align="right"><label for="sirin-request-autoreplay"><?php echo __('Request Autoreplay', 'sirinsoftware')?>:</label></th>
            <td>
                <?php
                wp_editor(get_option('sirin-request-autoreplay'), 'sirin-request-autoreplay', array(
                    'wpautop'       => 1,
                    'media_buttons' => 1,
                    'textarea_name' => 'sirin-request-autoreplay', //нужно указывать!
                    'textarea_rows' => 20,
                    'tabindex'      => null,
                    'editor_css'    => '',
                    'editor_class'  => '',
                    'teeny'         => 0,
                    'dfw'           => 0,
                    'tinymce'       => 1,
                    'quicktags'     => 1,
                    'drag_drop_upload' => false
                ) );
                ?>
            </td>
        </tr>
        <tr>
            <th><h2>Summary request</h2></th>
            <td></td>
        </tr>
        <tr>
            <th scope="row" align="right"><label for="sirin-summary-autoreplay-theme"><?php echo __('Summary Autoreplay Theme', 'sirinsoftware')?>:</label></th>
            <td>
                <input type="text" id="sirin-summary-autoreplay-theme" class="regular-text" name="sirin-summary-autoreplay-theme" value="<?php echo (get_option('sirin-summary-autoreplay-theme'))? get_option('sirin-summary-autoreplay-theme') : '';?>">
            </td>
        </tr>
        <tr>
            <th scope="row" align="right"><label for="sirin-summary-autoreplay"><?php echo __('Summary Autoreplay', 'sirinsoftware')?>:</label></th>
            <td>
                <?php
                wp_editor(get_option('sirin-summary-autoreplay'), 'sirin-summary-autoreplay', array(
                    'wpautop'       => 1,
                    'media_buttons' => 1,
                    'textarea_name' => 'sirin-summary-autoreplay', //нужно указывать!
                    'textarea_rows' => 20,
                    'tabindex'      => null,
                    'editor_css'    => '',
                    'editor_class'  => '',
                    'teeny'         => 0,
                    'dfw'           => 0,
                    'tinymce'       => 1,
                    'quicktags'     => 1,
                    'drag_drop_upload' => false
                ) );
                ?>
            </td>
        </tr>


        <tr>
            <th><h2>Subscribe request</h2></th>
            <td></td>
        </tr>
        <tr>
            <th scope="row" align="right"><label for="sirin-subscribe-autoreplay-theme"><?php echo __('Subscribe Autoreplay Theme', 'sirinsoftware')?>:</label></th>
            <td>
                <input type="text" id="sirin-subscribe-autoreplay-theme" class="regular-text" name="sirin-subscribe-autoreplay-theme" value="<?php echo (get_option('sirin-subscribe-autoreplay-theme'))? get_option('sirin-subscribe-autoreplay-theme') : '';?>">
            </td>
        </tr>
        <tr>
            <th scope="row" align="right"><label for="sirin-subscribe-autoreplay"><?php echo __('Subscribe Autoreplay', 'sirinsoftware')?>:</label></th>
            <td>
                <?php
                wp_editor(get_option('sirin-subscribe-autoreplay'), 'sirin-subscribe-autoreplay', array(
                    'wpautop'       => 1,
                    'media_buttons' => 1,
                    'textarea_name' => 'sirin-subscribe-autoreplay', //нужно указывать!
                    'textarea_rows' => 20,
                    'tabindex'      => null,
                    'editor_css'    => '',
                    'editor_class'  => '',
                    'teeny'         => 0,
                    'dfw'           => 0,
                    'tinymce'       => 1,
                    'quicktags'     => 1,
                    'drag_drop_upload' => false
                ) );
                ?>
            </td>
        </tr>

        <!-- Submit form -->
        <tr>
            <th scope="row"><input type="submit" value="<?php echo __('Save', 'sirinsoftware')?>" class="button button-primary button-large"></th>
            <td align="right"></td>
        </tr>
    </table>
</form>