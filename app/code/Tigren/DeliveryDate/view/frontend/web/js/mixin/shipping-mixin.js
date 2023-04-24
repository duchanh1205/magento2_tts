/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
define(["jquery", "ko"], function ($, ko) {
    "use strict";
    return function (target) {
        return target.extend({
            setShippingInformation: function () {
                if (this.validateDeliveryDate()) {
                    this._super();
                }
            },
            validateDeliveryDate: function () {
                this.source.set("params.invalid", false);
                this.source.trigger("delivery_date.data.validate");

                if (this.source.get("params.invalid")) {
                    return false;
                }

                return true;
            },
        });
    };
});
