    var Encore = require('@symfony/webpack-encore');

    Encore
        .setOutputPath('web/build/')
        .setPublicPath('/web')
        .addEntry('app', './assets/js/app.js')
    	.addStyleEntry('style', './assets/scss/main.scss')
    	.addStyleEntry('map', './assets/scss/map.scss')
        .cleanupOutputBeforeBuild()
        .enableBuildNotifications()
        .enableSassLoader();

    module.exports = Encore.getWebpackConfig();
