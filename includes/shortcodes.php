<?php
function spire_stripe_payment_form() {
    if(isset($_GET['payment']) && $_GET['payment'] == 'paid') {
        echo '<form action="" method="POST" id="payment-form"><p class="success">' . __('Thank you for your donation.', 'spire_stripe') . '</p></form>';
    } else { ?>

        <form action="" method="POST" id="payment-form">
            <legend><?php _e('Donation Form', 'spire_stripe'); ?></legend>
            <div class="payment-errors"></div>
            <div class="form-row">
                <label><?php _e('Name', 'spire_stripe'); ?></label>
                <input type="text" autocomplete="off" class="name" data-stripe="name" required/>
            </div>
            <div class="form-row">
                <label><?php _e('Email', 'spire_stripe'); ?></label>
                <input type="text" autocomplete="off" class="email" name="email" required/>
            </div>
            <div class="form-row">
                <label><?php _e('Donation Amount', 'spire_stripe'); ?></label>
                <input type="text" size="10" autocomplete="off" class="amount" name="amount" required/>
            </div>
            <div class="form-row">
                <label><?php _e('Card Number', 'spire_stripe'); ?></label>
                <input type="text" size="20" autocomplete="off" class="card-number"  data-stripe="number" required/>
            </div>
            <div class="form-row">
                <label><?php _e('CVC', 'spire_stripe'); ?></label>
                <input type="text" size="4" autocomplete="off" class="card-cvc" data-stripe="cvc" required/>
            </div>
            <div class="form-row">
                <label><?php _e('Expiration (MM/YYYY)', 'spire_stripe'); ?></label>
                <input type="text" size="2" class="card-expiry-month" data-stripe="exp-month"  required/>
                <span> / </span>
                <input type="text" size="4" class="card-expiry-year" data-stripe="exp-year" required />
            </div>
            <input type="hidden" name="action" value="stripe"/>
            <input type="hidden" name="redirect" value="<?php echo get_permalink(); ?>"/>
            <input type="hidden" name="stripe_nonce" value="<?php echo wp_create_nonce('stripe-nonce'); ?>"/>
            <button type="submit" id="stripe-submit"><?php _e('Submit', 'spire_stripe'); ?></button>
        </form>

    <?php
    }
}
add_shortcode('payment_form', 'spire_stripe_payment_form');