/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
var config = {
    <!--Create a RequireJS config file (code challenge 1)-->
    map: {
        '*': {
            customscripts: 'Tigren_Portfolio/js/customscripts',
            'Magento_Sales/js/order/create/scripts':
                'Tigren_Portfolio/js/customscripts'
        }
    },
    <!--use data mage init (code challenge 2)-->
    map: {
        '*': {
            magescript: 'Tigren_Portfolio/js/magescripts'
        }
    },
    <!--Add global files (code challenge 1)-->
    deps: ['js/globalscripts.js'],
    <!--Set alias file call (code challeng 2)-->
    paths: {
        'alias script': 'Tigren_Portfolio/js/script'
    },

    map: {
        '*': {
            'mywidget': 'Tigren_Portfolio/js/mywidget'
        }
    },
    <!--jquery widget (code challenge 3)-->
    map: {
        '*': {
            'kiwicount': 'Tigren_Portfolio/js/kiwicount'
        }
    },
    <!--Declare a Mixins (code challenge 3)-->
    config: {
        map: {
            '*': {
                'mage/kiwicount': 'Tigren_Portfolio/js/kiwicount-mixin'
            }
        },
        mixins: {
            'mage/kiwicount': {
                'Tigren_Portfolio/js/kiwicount-mixin': true
            }
        }
    },
    <!--pass config data (code challenge 2)-->
    map: {
        '*': {
            passscript: 'Tigren_PortFolio/js/passscript'
        }
    }
};
