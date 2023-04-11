/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
define(["jquery"], function ($, _) {
    "use strict";

    $.widget("mage.kiwicount", {
        _create: function () {
            this._case = $(this.element);
            let maxlen = this.options.maxlen;
            let messagebox = this.options.messagebox;
            $(this._case).keyup(function () {
                let len = this.value.length;
                if (len >= maxlen) {
                    $("#" + messagebox).text(" you have reached the limit");
                } else {
                    var char = maxlen - len;
                    $("#" + messagebox).text(char + " characters left");
                }
            });
        },
    });

    return $.mage.kiwicount;
});
