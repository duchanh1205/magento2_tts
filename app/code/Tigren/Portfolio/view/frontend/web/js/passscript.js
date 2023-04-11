/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
define(["jquery"], function ($) {
    "use strict";

    return function (config, element) {
        var myCustomData =
            $(element).data("mage-init")["#my-element"].myCustomData;
        console.log(myCustomData.foo); // outputs "bar"
        console.log(myCustomData.baz); // outputs 123
    };
});
