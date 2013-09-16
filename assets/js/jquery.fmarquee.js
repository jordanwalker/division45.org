(function ($) {
    $.fn.fMarquee = function (o) {
        o = $.extend({
            'height': 100,
            'width': 700,
            'showtime': 9000,
            'direction': 'left'
        }, o || {});
        this.each(function (ib) {
            var t = $(this);
            var msgs = [];
            var i = 0;
            t.css({
                'position': 'relative',
                'height': o.height + 'px',
                'width': o.width + 'px',
                'overflow': 'hidden',
		  });
            t.find('div.mchild').each(function (id) {
                var c = msgs[id] = $(this);
                c.css({
                    'position': 'absolute',
                    'opacity': '0',
                    'width': ((!c.css('width')) ? t.width() : c.css('width')) + 'px',
                    'left': t.width() + 'px',
					'display':'inline'
                });
                i++
            });
            startAnimation(0);

            function startAnimation(id) {
                var el = msgs[id];
                switch (o.direction) {
                case 'right':
                    var _1_start_x = (-1) * (t.width()) + 'px';
                    var _1_end_x = '0px';
                    var _2_end_x = (t.width() - el.width()) + 'px';
                    var _3_end_x = (t.width()) + 'px';
                    break;
                case 'left':
                default:
                    var _1_start_x = (t.width()) + 'px';
                    var _1_end_x = (t.width() - el.width()) + 'px';
                    var _2_end_x = ((t.width() / 8) * 1) + 'px';
                    var _3_end_x = (-1) * (t.width()) + 'px';
                    break
                }
                el.css({
                    'left': _1_start_x
                });
                el.animate({
                    'left': _1_end_x,
                    'opacity': 1
                }, 500, 'easeInQuad', function () {
                    el.animate({
                        'left': _2_end_x,
                        'opacity': 1
                    }, o.showtime, 'easeOutQuad', function () {
                        el.animate({
                            'left': _3_end_x,
                            'opacity': 0
                        }, 500, 'easeOutQuad', function () {
                            if (id == (i - 1)) {
                                startAnimation(0)
                            } else {
                                startAnimation(id + 1)
                            }
                        })
                    })
                })
            }
        })
    }
})(jQuery);