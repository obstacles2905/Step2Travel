module.exports = {
    entry: [
        './script/array_events.js',
        './script/array_event.js',
        './script/array_events_categories.js',
        './script/main_page_script.js',
        './script/map.js',
        // './script/events.js', Nikita
        './script/post_component.js',
        './script/pagination.js',
        // './script/filter_component.js',
        './script/filter.js',
        './script/tours.js',
        './script/sightseeing.js',
        './script/sight.js',
        './script/tour.js',
        './script/cafe.js',
        './script/hotel.js',
        './script/tours_circles.js',
        './script/carousel.js'
    ],
    output: {
        filename: 'bundle.js'
    },
    module: {
        rules: [
            {
            test: /\.js$/,
            exclude: [/node_modules/],
            use: [{
                loader: 'babel-loader',
                options: { presets: ['react'] }
            }]
            }
        ]
    }
};
