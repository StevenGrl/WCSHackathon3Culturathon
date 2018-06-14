    var Encore = require('@symfony/webpack-encore');

    Encore
        .setOutputPath('web/build/')
        .setPublicPath('/build')
        .addEntry('app', './assets/js/app.js')
        .addEntry('moveFinder', './assets/js/moveFinder.js')
    	.addStyleEntry('style', './assets/scss/main.scss')
    	.addStyleEntry('map', './assets/scss/map.scss')
        .cleanupOutputBeforeBuild()
        .enableBuildNotifications()
        .enableSassLoader();

    module.exports = Encore.getWebpackConfig();
