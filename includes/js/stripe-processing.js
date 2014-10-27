
function stripeResponseHandler(status, response) {
    if (response.error) {
        // show errors returned by Stripe
        jQuery(".payment-errors").html(response.error.message);
        // re-enable the submit button
        jQuery('#stripe-submit').attr("disabled", false);
    } else {
        var form$ = jQuery("#payment-form");
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        // and submit
        form$.get(0).submit();
    }
}
jQuery(document).ready(function($) {
    Stripe.setPublishableKey(stripe_vars.publishable_key);
    $('#payment-form').submit(function(event) {
        var $form = $(this);

        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);

        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from submitting with the default action
        return false;
    });
});
