# Inline Form Key Updater
## Magento 2 Module by MageMontreal
The Inline Form Key Updater by MageMontreal ensures that form keys are updated on frontend pages as soon as the form_key input field is loaded in order to prevent delays resulting in the "Invalid Form Key. Please refresh the page" error.

________________________________________________

### Fix for Magento 2 Issue #13746:

https://github.com/magento/magento2/issues/13746

**Error:** Invalid Form Key. Please refresh the page

**Trigger:** Form submission occuring before the page has loaded entirely. (Add to Cart, Add to Wishlist, etc.)
________________________________________________

### Functional Requirement:

Form key input fields must be integrated to the form through the Magento\Framework\View\Element\FormKey block which is best practice, in order to benefit from this fix/improvement. A script tag with a unique ID is being added and executed inline directly after each form_key input ensuring its value is updated as soon as possible.

________________________________________________

###  Alternative:

Alternatively, a script is executed inline before the page body end updating all form_key inputs on the page including those that were not added through the Magento\Framework\View\Element\FormKey block. Although it is executed sooner than Magento's built-in functions as it doesn't rely on RequireJS or have to wait for other dependencies to load, this approach may still result in a perceptible delay on long pages as the script will solely be executed once the browser has loaded the entire body section.

________________________________________________

***Note:*** *Uses pure JavaScript to ensure that the scripts are executed without having to wait for RequireJS or any dependencies.*
