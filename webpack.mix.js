const mix = require("laravel-mix");

// mix.js("resources/js/app.js", "public/js")
//     .copyDirectory("resources/img", "public/img")
//     .options({
//         processCssUrls: false,
//     })
//     .sass("resources/sass/app.scss", "public/css");

mix.js("resources/js/app.js", "public/js").vue()
    .postCss("resources/css/app.css", "public/css/app.css", [
        require("tailwindcss"),
    ])
    .options({
        processCssUrls: false,
    })
;
