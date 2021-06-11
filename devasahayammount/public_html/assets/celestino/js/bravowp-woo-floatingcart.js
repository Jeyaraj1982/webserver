

jQuery( function( $ ) {

        //Called when woocommerce finishes the adding to cart process and produce fragments with the new data
        $( document.body ).on( "added_to_cart", function( event, fragments )
        {

                //the fragments object shall contain our property
                if ( fragments.bw_wwo_floatingcartdata != null)
                {

                        //remove the previous id in case
                        $("#bravowp-woo-floatingcart").remove();

                        //appends the new cart content
                        $("body").append(fragments.bw_wwo_floatingcartdata);

                }
                else
                {
                        //the custom data in the fragments was not found
                }

        });

        //Called when woocommerce finishes the adding to cart process and produce fragments with the new data
        $( document.body ).on( "adding_to_cart", function( event, data )
        {

                //showing loading gif in the cart
                bravowp_woo_floatingcart_displayloadingimage();

        });




});


//opening or collapsing the cart
function bravowp_woo_floatingcart_togglecart()
{

        if ( jQuery( "#bravowp-woo-floatingcart-bodypane" ).css("height") != "0px" )
        {

                bravowp_woo_floatingcart_heightstyle = jQuery( "#bravowp-woo-floatingcart-bodypane" ).css("height");

                jQuery( "#bravowp-woo-floatingcart-bodypane" ).animate({
                        height:"0px",opacity:"0"
                }, 150, function() {

                });
                jQuery( "#bravowp-woo-floatingcart-footerpane" ).animate({
                        height:"4px"
                }, 150 );
                jQuery("#bravowp-woo-floatingcart-titlepane-downicon").fadeOut();
                jQuery("#bravowp-woo-floatingcart-titlepane-upicon").fadeIn();

        }
        else
        {

                jQuery( "#bravowp-woo-floatingcart-bodypane" ).animate({
                        height:"100%",opacity:"1"
                }, 400, function() {

                });
                jQuery( "#bravowp-woo-floatingcart-footerpane" ).animate({
                        height:"10px"
                }, 400 );
                jQuery("#bravowp-woo-floatingcart-titlepane-downicon").fadeIn();
                jQuery("#bravowp-woo-floatingcart-titlepane-upicon").fadeOut();

        }

}



//display loading image
function bravowp_woo_floatingcart_displayloadingimage()
{
        jQuery("#bravowp-woo-floatingcart-loader").show();
}
