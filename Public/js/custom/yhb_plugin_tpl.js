;(function ( $, window, document, undefined ) {

    var pluginName = 'yhb_utility',
        plugin,
        defaults = {
            gridSize: 10,
            callback: function(str) {}
        },
        $this;

    // The actual plugin constructor
    function Plugin( element, options ) {
        plugin = this;
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype.init = function () {
        
    };



    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, pluginName)) {
                $.data(this, pluginName, 
                new Plugin( this, options ));
            }
        });
    }

})( jQuery, window, document );