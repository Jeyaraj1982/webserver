window.Scrobbleme = {
    widthToScaleUp: 300,
    methods: ['overlay'],
    versions: {
        'ImageComparisonSlider': '1.12'
    }
};

Scrobbleme.ImageComparisonSlider = function (domNode, jQuery) {
    let slide, slider;

    if (jQuery === undefined) {
        jQuery = window.jQuery;
    }

    this.domNode = jQuery(domNode);
    this.domNode.originalWidth = this.domNode[0].style.width;
    this.domNode.find('.images .left').width(this.domNode.width() / 2);
    this.domNode.find('.images img').width(this.domNode.width());
    slide = this.slide_overlay;
    slider = domNode.querySelector('.slider');
    noUiSlider.create(slider, {
        start: 50,
        animate: false,
        range: {
            'min': 0,
            'max': 100
        }
    });
    slider.noUiSlider.on('slide', function (value) {
        domNode.dataset.icSliderValue = value[0];
        slide.bind(this)(null, {value: value[0]});
    }.bind(this));
    slide.bind(this)(null, {value: 50});
    this.resize_callback.bind(this)({data: {'slider': slider, 'slide': slide, 'element': this}});

    jQuery(window).resize({'slider': slider, 'slide': slide, 'element': this}, this.resize_callback);
    this.domNode.find('.images').click({'slider': slider, 'slide': slide}, this.clickable_callback.bind(this));

    /** Extras */
    if (this.domNode.hasClass('hover') && this.supports_hover()) {
        this.domNode.find('.images').mousemove({
            'slider': slider,
            'slide': slide
        }, this.throttle(this.clickable_callback.bind(this), 15));
    }
}
;

Scrobbleme.ImageComparisonSlider.prototype = {
    slide_overlay: function (event, ui) {
        this.domNode.find('.images .left').width(ui.value * this.domNode.width() / 100);
    },

    clickable_callback: function (event) {
        let newValue = (event.pageX - event.currentTarget.getBoundingClientRect().left) / event.currentTarget.clientWidth * 100;
        jQuery.proxy(event.data.slide, this)(null, {value: newValue});
        event.data.slider.noUiSlider.set(newValue);
    },

    resize_callback: function (options) {
        let data = options.data;
        let domNode = data.element.domNode;
        if (domNode.width() <= Scrobbleme.widthToScaleUp && !domNode.modeChanged) {
            domNode.modeChanged = true;
            domNode[0].style.width = '100%';
            domNode.upperSizeBound = domNode.width();
        } else if (domNode.modeChanged && domNode.width() > domNode.upperSizeBound) {
            domNode[0].style.width = domNode.originalWidth;
            domNode.modeChanged = false;
        }

        domNode.find('.images img').height('auto');
        if (domNode.hasClass('overlay')) {
            domNode.find('.images .left').width(domNode.width() / 2);
            domNode.find('.images img').width(domNode.width());
        }
        let currentValue = data.slider.noUiSlider.get();
        jQuery.proxy(data.slide, data.element)(null, {value: currentValue});
    },

    /**
     * Returns true, if the device supports "hover" in the plugins sense.
     */
    supports_hover: function () {
        return !navigator.userAgent.match(/(iPod|iPhone|iPad|Android|Windows\sPhone|BlackBerry)/i);
    },

    // Thanks: http://sampsonblog.com/749/simple-throttle-function
    throttle: function (callback, threshhold) {
        let wait = false;
        return function (event) {
            if (!wait) {
                callback(event);
                wait = true;
                setTimeout(function () {
                    wait = false;
                }, threshhold);
            }
        }
    }
};

jQuery(function (jQuery) {
    document.querySelectorAll('.image-comparator').forEach(
        element => new Scrobbleme.ImageComparisonSlider(element, jQuery)
    );
});