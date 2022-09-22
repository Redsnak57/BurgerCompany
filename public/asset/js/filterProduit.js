// init Isotope
var $grid = $('.filtre').isotope({
    itemSelector: '.element-item',
    layoutMode: 'masonry',
    percentPosition: true,
    masonry : {
        columnWidth : ".grid-sizer"
    },
    fitRows: {
      // set to the element
      columnWidth: 200
    },
    cellsByRow: {
        columnWidth: 220,
        rowHeight: 220
    }
});

// filter functions
var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
        var number = $(this).find('.number').text();
        return parseInt(number, 10) > 50;
    },
    // show if name ends with -ium
    ium: function() {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
    }
};

// bind filter button click
$('#filters').on('click', 'span', function() {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({
        filter: filterValue
    });
});