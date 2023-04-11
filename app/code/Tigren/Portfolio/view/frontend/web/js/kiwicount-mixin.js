/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
define(["jquery", "mage/kiwicount"], function ($, Kiwicount) {
    "use strict";

    return function (widget) {
        $.widget("mage.kiwicount", widget, {
            _create: function () {
                this._super();

                console.log("Mixin loaded!");
            },
        });

        return $.mage.kiwicount;
    };
});
