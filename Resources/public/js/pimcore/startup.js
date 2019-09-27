pimcore.registerNS("pimcore.plugin.TvornicaImporBundle");

pimcore.plugin.TvornicaImporBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.TvornicaImporBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("TvornicaImporBundle ready!");
    }
});

var TvornicaImporBundlePlugin = new pimcore.plugin.TvornicaImporBundle();
