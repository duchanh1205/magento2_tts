/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
var config = {
    map: {
        "*": {
            "Magento_Checkout/js/model/shipping-save-processor/default":
                "Tigren_DeliveryDate/js/model/shipping-save-processor/default",
        },
    },
    config: {
        mixins: {
            "Magento_Checkout/js/view/shipping": {
                "Tigren_DeliveryDate/js/mixin/shipping-mixin": true,
            },
            "Amazon_Payment/js/view/shipping": {
                "Tigren_DeliveryDate/js/mixin/shipping-mixin": true,
            },
        },
    },
};
