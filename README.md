# LookingGlassKoren.com

* This repo holds the modifications needed to get LGK working with woocommerce. 
* Note - the code is SUPER hacky.  (I don't know WP well at all and learned only enough to hack it together.)

## Files
* plugins/ross_mod.php - not actually used. May delete
* Themes/twentyten-child - Need to make changes to a child theme (currently using twentyten) so that when you upgrade the theme you don't lose changes
    * functions.php - currently just removes the related products feature
    * style.css - Defines the child theme - mod this for new theme
    * woocommerce - anything in this dir will override template functionality in woocommerce
        * myaccount
            * A bunch of hacks to get the my-account page to work better with woocommerce swiss knife extra features


## Plugins

* woocommerce - main plugin
* woocommerce poor guys swiss knife - free - gives extra billing fields, which is how we hack the account info
* woocommerce product add-ons - allows you to add a field to each product - the student you are registering
* woothemes helper - free - manages licenses
* regenerate thumbnails - WP->tools->Regenerate - to create the thumbnail sizes set on the woo->product page. Note - don't make too small - the CSS is set separately from the thumbnail size
* UpdraftPlus - backups
* RossModifications - currently unused. May delete. 
